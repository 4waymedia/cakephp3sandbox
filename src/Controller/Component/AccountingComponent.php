<?php // src/Controller/Component/AccountingComponent.php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class AccountingComponent extends Component
{
    public $components = array('Auth');

    public function generatePayPeriodStats($id){

        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');
        $this->Jobs = TableRegistry::getTableLocator()->get('Jobs');
        $this->Payments = TableRegistry::getTableLocator()->get('Payments');

        $payPeriod = $this->PayPeriods->get($id, [
            'contain' => []
        ]);

        // Get all Jobs within Pay Period Dates
        $jobs = $this->Jobs->find('all')
            ->where(['appointment_date >='=>$payPeriod->start_date->format('Y-m-d')])
            ->where(['appointment_date <='=>$payPeriod->end_date->format('Y-m-d')])
            ->contain(['Payments','AccountPayments'])->toArray();

        // Generate counts
        $counts = array(
            'contractors_used'=> 0,
            'jobs_completed'=> 0,
            'jobs_cancelled'=> 0,
            'jobs_pending'=> 0,
            'job_payments'=> 0
        );

        foreach($jobs as $job){
            $contractors[$job->technician] = $job->technician;

            $status = strtolower($job->job_status);

            $counts['job_payments'] += $this->Payments->find('all')->where([
                'order_id'=>$job->service_order_id
            ])->count();

            switch($job->job_status){
                case 'COMPLETED':
                    $counts['jobs_completed']++;
                    break;
                case 'CANCELLED':
                    $counts['jobs_cancelled']++;
                    break;
                case 'NOT_SERVICED':
                    $counts['jobs_pending']++;
                    break;
            }
        }

        $counts['contractors_used'] = isset($contractors) ? count($contractors) : 0;
        $counts['calculated'] = true;
        return $counts;

    }

    public function getBusinessDefaultAccount(){

    }

    /** Takes PayPeriod ID and prepares payment data for bulk / Auto Payments to Contractors
     * @param $id
     * @return array
     */
    public function payPeriodPayments($id){
        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');
        $this->Jobs = TableRegistry::getTableLocator()->get('Jobs');
        $this->Businesses = TableRegistry::getTableLocator()->get('Businesses');

        $payPeriod = $this->PayPeriods->get($id, [
            'contain' => []
        ]);

        // Get Business
        $business = $this->Businesses->get($payPeriod->business_id);

        // Setup array to be passed
        $pay_period = [
            'id'=>$payPeriod->id,
            'business_id'=>$business->id,
            'account_id'=> $business->default_account_id,

        ];

        // Get all Jobs within Pay Period Dates
        // Filter all Jobs with payments made
        $jobs = $this->Jobs->find('all')
            ->where(['appointment_date >='=>$payPeriod->start_date->format('Y-m-d')])
            ->where(['appointment_date <='=>$payPeriod->end_date->format('Y-m-d')])
            ->contain(['Payments','AccountPayments'])->toArray();

        // separate jobs out
        foreach($jobs as $job){
            $pay_period['contractors'][$job->technician] = $job->technician;

            $status = strtolower($job->job_status);

            switch($job->job_status){
                case 'COMPLETED':
                    $pay_period['completed'][] = $job->id;
                    break;
                case 'CANCELLED':
                    $pay_period['cancelled'][] = $job->id;
                    break;
                case 'NOT_SERVICED':
                    $pay_period['pending'][] = $job->id;
                    break;
            }
        }

        // Create all payments
        if(isset($pay_period['completed'])){
            $pay_results = $this->makePayments($pay_period);
        } else {
            $pay_results = [];
        }

        return $pay_results;
    }

    public function getCurrentPayPeriod(){

        return $this->PayPeriods->find('all')
            ->order(['start_date' => 'DESC'])
            ->where(['business_id' => $this->Auth->user('business_id')])
            ->first()->toArray();

    }

    // Get the Pay Period from the Job ID
    // Use the Completed Date and Time... If After 5pm, use next pay period
    public function getPayPeriodByJobId($id){
        $this->Jobs = TableRegistry::getTableLocator()->get('Jobs');
        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');

        $job = $this->Jobs->get($id);

        $appointment_date = $job->appointment_date->format('Y-m-d');

        $result = $this->PayPeriods->find('all')
            ->where(['start_date <='=>$appointment_date])
            ->where(['end_date >='=>$appointment_date])
            ->first();

        if($result){
            return $result->toArray();
        }

        return false;

    }

    public function makePayments($payPeriod){
        $payments = 0;
        $jobs = $payPeriod['completed'];
        $this->Payments = TableRegistry::getTableLocator()->get('Payments');
        $this->AccountPayments = TableRegistry::getTableLocator()->get('AccountPayments');
        $this->Jobs = TableRegistry::getTableLocator()->get('Jobs');
        $this->Contractors = TableRegistry::getTableLocator()->get('Contractors');

        if(!count($jobs)){
            return false;
        }

        $new_payments = array();
        $new_payments['profit_total'] = 0;
        $todays_date = date("Y/m/d");
        // foreach completed job
        foreach($jobs as $key => $job_id){
            // Load Job Entity
            $job = $this->Jobs->get($job_id);

            // Load Amazon Payment Entity
            $AS = $this->Payments->find('all')->where(['order_id'=>$job->service_order_id])->first();

            // Payment from Amazon exists... Now Pay Contractor
            if($AS){
                // Check if a AccountPayment was already made for this job_id
                $skip = $this->AccountPayments->find('all')
                    ->where(['order_id' => $job->service_order_id])->count();

                $technicians = $this->getTechniciansFromBusinessId($payPeriod['business_id']);
                $split = explode(" ", $job->technician);

                $tech_label = $split[1];

                // Get Contractor_id
                $contractor = $this->Contractors->find('all')
                    ->where(['technician_id'=> $split[1]])->first()->toArray();


                // Determine payout amount and FLOOR IT - round down to nearest dollar
                // TOTAL - ( TOTAL * PERCENT FOR CONTRACTOR )

                $number = $AS->total * ( (100 - $technicians[$tech_label]['percentage']) / 100 );
                $payout_amount = number_format($number, 2, '.', ',');

                if(!$skip){
                    // Generate Payment
                    $newPayment = $this->AccountPayments->newEntity();

                    $newPayment->date           = $todays_date;
                    $newPayment->job_id         = $job->id;
                    $newPayment->pay_period_id  = $payPeriod['id'];
                    $newPayment->order_id       = $job->service_order_id;
                    $newPayment->account_id     = $payPeriod['account_id'];
                    $newPayment->contractor_id  = $contractor['id'];
                    $newPayment->technician_id  = $job->technician;
                    $newPayment->business_id    = $payPeriod['business_id'];
                    $newPayment->total          = $AS->total;
                    $newPayment->amount         = $payout_amount;

                    if($this->AccountPayments->save($newPayment)){
                        // Set job to array for display
                        $new_payments['jobs'][] = $newPayment;
                        if(!isset($new_payments['technicians_total'][$job->technician])){
                            $new_payments['technicians_total'][$job->technician] = $payout_amount;
                            $new_payments['technicians_total'][$job->technician] = $payout_amount;
                        } else {
                            $new_payments['technicians_total'][$job->technician] += $payout_amount;
                        }

                        $new_payments['profit_total'] += $AS->total - $payout_amount;
                    }

                }

            } else {
                $new_payments['no_payment'][] = $job->id;
            }
        }

        return $new_payments;
    }

    public function getTechniciansFromBusinessId($business_id){
        $this->Contractors = TableRegistry::getTableLocator()->get('Contractors');
        $technicians = [];
        $results = $this->Contractors->find('all')->where(['business_id'=>$business_id])->toArray();

        foreach($results as $entity){
            $technicians[$entity->technician_id] = [
                'id'=>$entity->id,
                'name'=> $entity->first_name . ' ' . $entity->last_name,
                'technician_id' => $entity->technician_id,
                'percentage' => $entity->deduction_percent
            ];
        }
        return $technicians;
    }

    public function getJobsForPayPeriod($id){

    }

}
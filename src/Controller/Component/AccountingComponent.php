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
            'jobs_pending'=> 0
        );



        foreach($jobs as $job){
            $contractors[$job->technician] = $job->technician;

            $status = strtolower($job->job_status);

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

    public function getCurrentPayPeriod(){



        $this->PayPeriods->find('all')
            ->order(['start_date' => 'DESC'])
            ->where(['business_id' => $this->Auth->user('business_id')])
            ->first();
    }

}
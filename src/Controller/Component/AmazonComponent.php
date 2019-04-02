<?php // src/Controller/Component/AmazonComponent.php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use App\Model\Entity\PayPeriod;

class AmazonComponent extends Component
{
    // Generate all pay periods from date

    /** Generates from the start date passed in
     * @param $start_date
     * @return array
     */
    public function generateBusinessPayPeriods($business_id, $start_date, $create = false){
        $periods = array();
        $timezone = new \DateTimeZone('America/Los_Angeles');

        // check if date is a Monday

        // First Monday October 1, 2018 at 5pm
        $first_pay_start_date = new \DateTime($start_date, $timezone);

        $today = new \DateTime('now', $timezone);
        $datecheck = clone $first_pay_start_date;

        while($datecheck < $today)
        {
            // generate mid date
            $first_pay_end_date = clone $first_pay_start_date;

            $first_pay_end_date->modify('+14 days');

            // create end date
            $month_end_date = clone($first_pay_end_date);
            $month_end_date->modify('+14 days');

            $status = $first_pay_end_date < $today ? 'closed' : 'active';

            // CREATE FIRST PAY PERIOD FOR MONTH
            $periods[] = array(
                'business_id'=>$business_id,
                'start_date'=>$first_pay_start_date->format('Y-m-d'),
                'end_date'=>$first_pay_end_date->format('Y-m-d'),
                'status' => $status);

            $next_status = $month_end_date < $today ? 'closed' : 'active';

            // CREATE SECOND PAY PERIOD FOR MONTH
            $periods[] = array(
                'business_id'=>$business_id,
                'start_date'=>$first_pay_end_date->format('Y-m-d'),
                'end_date'=>$month_end_date->format('Y-m-d'),
                'status'=> $next_status);

            // update for loop
            $first_pay_start_date = clone $month_end_date;
            $datecheck = clone $month_end_date;
        }

        if($create){
            $this->createPayPeriods($business_id, $periods);
        }

        return $periods;

    }

    public function generateNextPayPeriod($business_id){
        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');
        $last_period = $this->PayPeriods->find('all')
            ->order(['start_date' => 'DESC'])
            ->where(['business_id' => $this->Auth->user('business_id')])
            ->first();
        // get last pay period dates.
//        $start_date = last date of last pay period

        // Create from last date
//        $this->generateBusinessPayPeriods($business_id, $start_date,true);
    }

    public function createPayPeriods($business_id, $periods){
        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');

        // Delete all prior periods and stats
        $this->PayPeriods->deleteAll(['business_id' => $business_id]);

        // Create NEW Pay Periods
        foreach($periods as $time_period => $entity){
            $period = new PayPeriod($entity);

            $this->PayPeriods->save($period);
        }

        // Generate stats for periods


    }

    public function getCurrentPayPeriod($business_id){
        $timezone = new \DateTimeZone('America/Los_Angeles');
        $today = new \DateTime('now', $timezone);


        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');

        $periods = $this->PayPeriods->find()
            ->order(['PayPeriods.start_date' => 'DESC'])
            ->where(['PayPeriods.status' => 'active']);

        return $periods->toList();
    }

    public function getUserIdForBusinessId($business_id){
        $this->BusinessesUsers = TableRegistry::getTableLocator()->get('BusinessesUsers');

        $entity = $this->BusinessesUsers->get($business_id);

        return $entity->user_id;
    }

}
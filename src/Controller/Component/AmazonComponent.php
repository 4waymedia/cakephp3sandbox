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
    public function generateUserPayPeriods($user_id, $start_date, $create = false){
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

            $periods[] = array(
                'start_date'=>$first_pay_start_date->format('Y-m-d'),
                'end_date'=>$first_pay_end_date->format('Y-m-d'),
                'status' => $status);

            $next_status = $month_end_date < $today ? 'closed' : 'active';

            $periods[] = array(
                'start_date'=>$first_pay_end_date->format('Y-m-d'),
                'end_date'=>$month_end_date->format('Y-m-d'),
                'status'=> $next_status);

            // update for loop
            $first_pay_start_date = clone $month_end_date;
            $datecheck = clone $month_end_date;
        }

        if($create){
            $this->createPayPeriods($user_id, $periods);
        }

        return $periods;

    }

    public function createPayPeriods($user_id, $periods){
        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');

        // Delete all prior periods and stats
        $this->PayPeriods->deleteAll(['user_id' => $user_id]);

        // Create NEW Pay Periods
        foreach($periods as $time_period => $entity){
            $period = new PayPeriod($entity);
            $period->user_id = $user_id;
            $this->PayPeriods->save($period);
        }

        // Generate stats for periods


    }

    public function getCurrentPayPeriod($business_id = 2){
        $timezone = new \DateTimeZone('America/Los_Angeles');
        $today = new \DateTime('now', $timezone);

        $bus_user_id = $this->getUserIdForBusinessId($business_id);

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
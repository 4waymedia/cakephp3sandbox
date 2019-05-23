<?php // src/Controller/Component/AmazonComponent.php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use App\Model\Entity\PayPeriod;

class AmazonComponent extends Component
{

    public $components = array('Auth');

    /** Generates from the start date passed in
     * @param $start_date
     * @return array
     */
    public function generateBusinessPayPeriods($business_id, $start_date, $create = false){
        $periods = array();
        $timezone = new \DateTimeZone('America/Los_Angeles');
        $today = new \DateTime('now', $timezone);

        $business_id = $this->Auth->user('business_id');

        // check if date is a Monday
        // First Monday
        $start_date = new \DateTime($start_date, $timezone);

        $datecheck = clone $start_date;

        while($datecheck <= $today)
        {
            // generate mid date
            $end_date = clone $start_date;

            $end_date->modify('+14 days');

            $status = $end_date < $today ? 'closed' : 'active';

            // CREATE FIRST PAY PERIOD FOR MONTH
            $periods[] = array(
                'business_id'=>$business_id,
                'start_date'=>$start_date->format('Y-m-d'),
                'end_date'=>$end_date->format('Y-m-d'),
                'status' => $status);

            // update for loop
            $start_date = clone $end_date;
            $datecheck = clone $end_date;
        }

        if($create){
            $this->createPayPeriods($business_id, $periods);
        }

        return $periods;

    }

    public function generateNextPayPeriod($business_id){
        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');
        // get last pay period dates.
        $last_period = $this->PayPeriods->find('all')
            ->order(['start_date' => 'DESC'])
            ->where(['business_id' => $business_id])
            ->first();

        if(!$last_period){
            return false;
        };

        $start_date = $last_period['end_date'];

        // Create from last date
       return $this->generateBusinessPayPeriods($business_id, $start_date,true);
    }

    public function createPayPeriods($business_id, $periods){
        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');

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
            ->where(['PayPeriods.start_date <' => $today])
            ->where(['PayPeriods.end_date >=' => $today])
            ->where(['business_id'=> $business_id]);

        if(empty($periods->toList())){
            $this->generateNextPayPeriod($business_id);
            return $this->getCurrentPayPeriod($business_id);
        }

        return $periods->toList();
    }

    public function createPayPeriodsToDate($business_id){
        // Get last period
        $last_period = $this->PayPeriods->find()
            ->order(['PayPeriods.start_date' => 'DESC'])
            ->where(['business_id'=> $business_id])
        ->first();


        // if no period exists return false

        // create periods until updated

    }

    public function getUserIdForBusinessId($business_id){
        $this->BusinessesUsers = TableRegistry::getTableLocator()->get('BusinessesUsers');

        $entity = $this->BusinessesUsers->get($business_id);

        return $entity->user_id;
    }

    /** List of US States by Abbreviation
     * @return array
     */
    public function listStates(){
        return array(
            'AL'=>'Alabama',
            'AK'=>'Alaska',
            'AZ'=>'Arizona',
            'AR'=>'Arkansas',
            'CA'=>'California',
            'CO'=>'Colorado',
            'CT'=>'Connecticut',
            'DE'=>'Delaware',
            'DC'=>'District of Columbia',
            'FL'=>'Florida',
            'GA'=>'Georgia',
            'HI'=>'Hawaii',
            'ID'=>'Idaho',
            'IL'=>'Illinois',
            'IN'=>'Indiana',
            'IA'=>'Iowa',
            'KS'=>'Kansas',
            'KY'=>'Kentucky',
            'LA'=>'Louisiana',
            'ME'=>'Maine',
            'MD'=>'Maryland',
            'MA'=>'Massachusetts',
            'MI'=>'Michigan',
            'MN'=>'Minnesota',
            'MS'=>'Mississippi',
            'MO'=>'Missouri',
            'MT'=>'Montana',
            'NE'=>'Nebraska',
            'NV'=>'Nevada',
            'NH'=>'New Hampshire',
            'NJ'=>'New Jersey',
            'NM'=>'New Mexico',
            'NY'=>'New York',
            'NC'=>'North Carolina',
            'ND'=>'North Dakota',
            'OH'=>'Ohio',
            'OK'=>'Oklahoma',
            'OR'=>'Oregon',
            'PA'=>'Pennsylvania',
            'RI'=>'Rhode Island',
            'SC'=>'South Carolina',
            'SD'=>'South Dakota',
            'TN'=>'Tennessee',
            'TX'=>'Texas',
            'UT'=>'Utah',
            'VT'=>'Vermont',
            'VA'=>'Virginia',
            'WA'=>'Washington',
            'WV'=>'West Virginia',
            'WI'=>'Wisconsin',
            'WY'=>'Wyoming',
        );
    }
}
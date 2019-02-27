<?php // src/Controller/Component/MyAuthComponent.php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class ContentComponent extends Component
{
    var $downloadData = [
        'Jobs' => array(
            'fields'=>['*'],
            'query'=>'findByServiceOrderId',
            'key'=>'service_order_id',
            'header_row'=>4
        ),
        'Payments' => array(
            'fields'=>['*'],
            'query'=>'findByOrderId',
            'key'=>'order_id',
            'header_row'=>4
        )
    ];

    public function importContent($model, $file){
        // return error if Model is not allowed
        if(!isset($this->downloadData[$model])){
            // Model is not allowed
            return array('error'=>'Model not allowed');
        }
        // Load table
        $theTable = TableRegistry::getTableLocator()->get($model);

        // Get Valid fields for checking header line
        $valid_fields = $theTable->getSchema()->columns();

        $obj_model = $this->downloadData[$model];
        $row_counter = 0;

        $delimiter = $this->getDelimiterForFile($file['type']);

        // open the file
        $handle = fopen($file['tmp_name'], "r");

        // move up to the header row
        while ($row_counter < $obj_model['header_row']) {
            $row = fgetcsv($handle, 0, $delimiter);

            $pass = false;

            foreach($row as $pointer => $label){
                $test_name = $this->getFieldFromHeaderString($label);
                if(in_array($test_name, $valid_fields)){
                    $pass = true;
                }
            }

            if($pass){

                // set header for parsing
                $header = $row;

                // EXIT while
                $row_counter = $obj_model['header_row'];
            }

        }

        // Get fields from Header
        if($model){
            $fields = array();
            foreach ($header as $k => $head) {
                // check if period is in header
                $fields[] = $this->getFieldFromHeaderString($head);
            }
        }

        // read each data row in the file
        while (($row = fgetcsv($handle, 0, $delimiter)) !== FALSE) {
            $row_counter++;

            $data = array();
            // rebuild CakePHP model object
            foreach ($fields as $k => $head) {
                // get the data field from Model.field
                if (strpos($head,'.')!==false) {
                    $h = explode('.',$head);
                    $data[$h[1]]=(isset($row[$k])) ? $row[$k] : '';
                }else {
                    // get the data field from field
                    $data[$head]=(isset($row[$k])) ? $row[$k] : '';
                }
            }

            // see if we have an id
            $id = isset($data[$model]['id']) ? $data[$model]['id'] : false;

            if($model == 'Payments'){
                // Adjust amounts based on Payment Type
                $data = $this->sanitizePaymentData($data);
            } elseif ($model == 'Jobs'){
                $data = $this->sanitizeJobData($data);
            }

            // Save Refunds to table
            if(isset($data['refunds'])){

                unset($data['refunds']);
            }

            if( $id && $theTable->exists(['id' => $id]) ){

                $entity = $theTable->get($id);
                $entity->set($data[$model],['guard' => false]);
                $result = $theTable->save($entity);

            } elseif(isset($data[$obj_model['key']]) && $theTable->exists([$obj_model['key'] => $data[$obj_model['key']]])) {

                $entity = $theTable->{$obj_model['query']}( $data[$obj_model['key']])->first();
                $entity->set($data,['guard' => false]);
                $result = $theTable->save($entity);
            } else {
                $entity = $theTable->newEntity();
                $entity->set($data,['guard' => false]);
                $result = $theTable->save($entity);
            }
            

            if(isset($data['technician'])){
                $technicians[$data['technician']] = $data['technician'];
            }

            $results[] = $result;
        }

        if(isset($technicians)){
            $this->validateTechnicians($technicians);
        }

        // close the file
        fclose($handle);

        // return the messages
        return $results;
    }

    public function getFieldFromHeaderString($string)
    {
        $string = strtolower($string);

        // Check if string has period for Model
        if ( strpos($string, '.') ){
           return explode('.', $string)[1];
        }

        return str_replace(" ", "_", $string);

    }

    public function validateTechnicians($technicians)
    {
        $ContractorsTable = TableRegistry::getTableLocator()->get('Contractors');

        foreach($technicians as $technician){

            // handle empty technician
            if($technician == '--'){
                continue;
            }

            $split = explode(" ", $technician);

            // Check if contractor exists

            if(isset($split[1]) && !$ContractorsTable->exists(['technician_id' => $split[1]])){
                // Create NEW contractor
                $contractor = $ContractorsTable->newEntity();
                $contractor->first_name = $split[0];
                $contractor->last_name = explode("-", $split[1])[0];;

                $contractor->technician_id = $split[1];
                $contractor->role_id = 1;

                $ContractorsTable->save($contractor);
            }
        }

    }

    public function sanitizePaymentData($data)
    {

        // Handle Refund Data
        if(isset($data['transaction_type']) && $data['transaction_type'] == 'Refund'){
            // Check Admin Fee
            if($data['payment_detail'] == 'Referral Fee on Item Price'){
                $refund_field = 'refund_referral_fee';
            }

            // Check Product Charge
            if($data['payment_type'] == 'Product charges'){
                $refund_field = 'refund_product_charge';
            }
            // Check Referral Fee
            if($data['payment_detail'] == 'Refund Administration Fee'){
                $refund_field = 'refund_admin_fee';
            }

            $data[$refund_field] = $data['amount'];
            unset($data['amount']);
        } else {

            if(isset($data['payment_type']) && $data['payment_type'] == 'Amazon fees'){
                $data['amazon_fees'] = $data['amount'];
                unset($data['amount']);
            }

            if(isset($data['payment_type']) && $data['payment_type'] == 'Product charges'){
                $data['total_product_charges'] = $data['amount'];
                unset($data['amount']);
            }
        }

        // Handle Date
        $date = \DateTime::createFromFormat('M d, Y', $data['date']);
        $data['date'] = $date->format('Y-m-d');

        return $data;
    }

    public function sanitizeJobData($data)
    {

        // Order Created Date
        if(isset($data['order_created_time']) && $data['order_created_time'] != '--'){
            $date = \DateTime::createFromFormat('m-d-Y H:i:s', $data['order_created_time']);
            $data['order_created_time'] = $date->format('Y-m-d H:i:s');
        }


        // Appointment Date
        if(isset($data['appointment_date']) && $data['appointment_date'] != '--'){
            $date = \DateTime::createFromFormat('m-d-Y', $data['appointment_date']);
            $data['appointment_date'] = $date->format('Y-m-d');
        }
        return $data;
    }

    public function getDelimiterForFile($type)
    {

        switch ($type){
            case 'text/plain':
                $delimiter = "\t";
                break;
            case 'text/csv':
                $delimiter = ",";
                break;
            default:
                $delimiter = ",";
                break;
        }

        return $delimiter;
    }

}
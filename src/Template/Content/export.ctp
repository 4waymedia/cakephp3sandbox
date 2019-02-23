<?php

// verify model
if(isset($model)){
    //loop fields and set
    if(isset($fields)){

        // Set the headers to match Model.field
        foreach($fields as $key => $field){
            $header[$key] = $model . '.' . $field;
        }

        echo implode(',', $header) . "\n";
    }

    // loop records

    foreach ($data as $row):
        $record = $row->toarray();
        //unset($row->generated_html);
        // loop fields for record as a cell


        foreach ($record as $key => &$cell):

            $string = preg_replace('/,/','',$cell);

            if(!in_array($key, $fields)){
                unset($record[$key]);
                continue;
            }
            if($key == 'appointment_start_time' || $key == 'appointment_end_time' || $key == 'date'){
                //$string = $string->format('H:i:s');
            }
            if($key == 'appointment_date' || $key == 'order_created_time'){
                //$string = $string->format('Y-m-d');
            }

            // Escape double quotation marks
            $cell = '"' . preg_replace('/"/','""',$string) . '"';
        endforeach;
        
        echo implode(',', $record) . "\n";

    endforeach;

}
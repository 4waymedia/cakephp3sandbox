<?php

echo 'test';
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

        // loop fields for record as a cell
        foreach ($row[$model] as $key => &$cell):
            if(!in_array($key, $fields)){
                unset($row[$model][$key]);
            }

            // Escape double quotation marks
            $cell = '"' . preg_replace('/"/','""',$cell) . '"';
        endforeach;

        echo implode(',', $row[$model]) . "\n";
    endforeach;

}
<?php

/* Payments import results Table */

// Create table to display each list, with stats
echo $this->Html->tag('table', null, array('class'=>'hover table'));
echo $this->Html->tableHeaders(
    array('id','Transaction Type','Order ID','Product Details','Errors','Actions'),
    array(),
    array('class'=>''));

foreach($import_results as $entity){

    echo $this->Html->tableCells([
        $entity->id,
        $entity->transaction_type,
        $entity->order_id,
        $entity->product_details,
        $entity->errors,
        ''
    ]);

}

echo $this->Html->tag('/table');
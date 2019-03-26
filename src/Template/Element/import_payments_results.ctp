<?php

/* Payments import results Table */

// Create table to display each list, with stats
echo $this->Html->tag('table', null, array('class'=>'hover table'));
echo $this->Html->tableHeaders(
    array('Transaction Type','Order ID','SKU','Payment Type','Amount','Payment Detail','Product Title','Errors','Actions'),
    array(),
    array('class'=>''));

foreach($import_results as $entity){

    echo $this->Html->tableCells([
        $entity->transaction_type,
        $entity->order_id,
        $entity->sku,
        $entity->payment_type,
        $entity->amount,
        $entity->payment_details,
        $entity->product_title,
        $entity->errors,
        ''
    ]);

}

echo $this->Html->tag('/table');
<?php

/* Jobs import results Table */

// Create table to display each list, with stats
echo $this->Html->tag('table', null, array('class'=>'hover table'));
echo $this->Html->tableHeaders(
    array('service_order_id','Job Name','Status','appointment_date','technician','Actions'),
    array(),
    array('class'=>''));

foreach($import_results as $entity){

    echo $this->Html->tableCells([
        $entity->service_order_id,
        $entity->job_name,
        $entity->job_status,
        $entity->appointment_date,
        $entity->technician,
        $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $entity->id],['target' => '_blank'])
    ]);

}

echo $this->Html->tag('/table');
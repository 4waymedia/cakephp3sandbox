<?php

/* Jobs import results Table */
$stats = array('files'=>0, 'records'=>0,'errors'=>0, 'updated'=>0);
$table_data = '';

// Generate Table OUTPUT for File Import
foreach($import_results as $file){
    $stats['files']++;

    $records = count($file);

    $table_data .= $this->Html->tableHeaders(
        array('NEW FILE - ' . $records . ' records' ),
        array(),
        array('colspan'=>7,'class'=>''));
    foreach($file as $entity) {

       // STATS
        // Files uploaded
        // Records per file
        //
        //$stats['records'];

        if ($entity == 'error') {
            $stats['errors']++;
            echo $this->Html->tableCells([
                'Error',
                $entity,
                '',
                '',
                '',
                '',
                ''
            ]);
        } else {
            $stats['records']++;
            if($entity->import_status != 'created'){
                $stats['updated']++;
            }
            $table_data .= $this->Html->tableCells([
                $entity->import_status,
                $entity->service_order_id,
                $entity->job_name,
                $entity->job_status,
                $entity->appointment_date,
                $entity->technician,
                $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $entity->id],['target' => '_blank'])
            ]);
        }
    }

}

echo $this->Html->tag('table', null, array('class'=>'hover table'));

echo $this->Html->tableHeaders(
    array('File(s)','Records', 'Updated', 'Created', 'Errors'),
    array(),
    array('class'=>''));

echo $this->Html->tableCells([
    $stats['files'],
    $stats['records'],
    $stats['updated'],
    ($stats['records'] - $stats['updated']),
    $stats['errors'],
]);

echo $this->Html->tag('/table');


// Create table to display each list, with stats
echo $this->Html->tag('table', null, array('class'=>'hover table'));

echo $this->Html->tableHeaders(
    array('import_status','service_order_id','Job Name','Status','appointment_date','technician','Actions'),
    array(),
    array('class'=>''));

echo $table_data;

echo $this->Html->tag('/table');
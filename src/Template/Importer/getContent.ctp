<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

// create form based on $content_models

// form defaults
$defaults = array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'form-group'),
        'class' => 'form-control',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    ));
?>
<style>
    .tab-pane{
        padding-top:20px;
    }
</style>
<h1><?php echo __('Download CSV file for bulk editing:');?></h1>
<p>Select the Model for desired download. This will trigger a download of CSV file will available fields from the database.</p>

<div class='container-fluid'>
    <div class='row-fluid'>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#info" aria-controls="home" role="tab" data-toggle="tab">Info</a></li>
            <li role="presentation"><a href="#export" aria-controls="profile" role="tab" data-toggle="tab">Export</a></li>
            <li role="presentation"><a href="#import" aria-controls="profile" role="tab" data-toggle="tab">Import</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="info">
                <?php
                if(isset($import_results)){ ?>
                    <label>Results from File upload</label>
                    <?php
                    foreach($import_results as $type => $messages){

                        // Create table to display each list, with stats
                        echo $this->Html->tag('table', null, array('class'=>'table-striped table'));
                        echo $this->Html->tableHeaders(
                            array($type),
                            array(),
                            array('class'=>''));

                        foreach($messages as $message){
                            $cells[] = explode(',', $message);
                        }

                        echo $this->Html->tableCells($cells);
                        echo $this->Html->tag('/table');
                    }
                } else{ ?>
                    <p>For ADMIN use ONLY. Importing a CSV will overwrite the database!!!</p>
                <?php } ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="export">
                <h4>Select your desired model to export a CSV file of data</h4>
                <?php

                // Prepare options for select
                foreach($content_models as $model=>$fields){
                    $options[$model] = $model;
                }

                echo $this->Form->create('Export', $defaults);

                echo $this->Form->input('Model', array(
                    'options'=>$options,

                ));

                echo $this->Form->submit('Download CSV', array('class'=>'btn btn-primary'));
                echo $this->Form->end();

                ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="import">
                <h4>Filename MUST be in the format: MODEL-string.csv</h4>
                <p>The data will be inserted into the MODEL in the name of the file.</p>
                <label>Accepted MODELS: <br><?php echo implode('<br>', (array_keys($options)));?></label>
                <?php
                $defaults['type'] = 'file';
                echo $this->Form->create('Import', $defaults);
                unset($defaults['type']);

                echo $this->Form->input('csv_file', array('type'=>'file', 'accept'=>'.csv'));

                echo $this->Form->submit('Upload CSV', array('class'=>'btn btn-primary'));

                echo $this->Form->end();
                ?>
            </div>
        </div>



    </div>
</div>


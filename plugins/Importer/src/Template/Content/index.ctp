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
// Prepare options for select
foreach($content_models as $model=>$fields){
    $options[$model] = $model;
}
?>
<style>
    .tab-pane{
        padding-top:20px;
    }
</style>
<h1><?php echo __('Download CSV file for bulk editing:');?></h1>
<p>Select the Model for desired download. This will trigger a download of CSV file will available fields from the database.</p>




<ul class="tabs" data-tabs id="example-tabs">
    <li class="tabs-title is-active"><a href="#info-panel" aria-selected="true">Info</a></li>
    <li class="tabs-title"><a href="#panel2">Import</a></li>
    <li class="tabs-title"><a href="#export-panel">Export</a></li>
</ul>

<div class="tabs-content" data-tabs-content="example-tabs">
    <div class="tabs-panel is-active" id="info-panel">
    <!-- data loaded from results -->
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
    <div class="tabs-panel" id="panel2">
        <h4>Filename MUST be in the format: MODEL-string.csv</h4>
        <p>The data will be inserted into the MODEL in the name of the file.</p>
        <label>Accepted MODELS:<?php echo implode(',', (array_keys($options)));?></label>
        <?php
        $defaults['type'] = 'file';
        echo $this->Form->create('Import', $defaults);
        unset($defaults['type']);

        echo $this->Form->control('Import.Model', array(
        'options'=>$options,
        ));

        echo $this->Form->control('Import.csv_file', array('type'=>'file', 'accept'=>'.csv'));

        echo $this->Form->submit('Upload CSV', array('class'=>'btn btn-primary'));

        echo $this->Form->end();
        ?>
    </div>
    <div class="tabs-panel" id="export-panel">
        <h4>Select your desired model to export a CSV file of data</h4>

        <div class="grid-x grid-padding-x">
            <fieldset class="large-5 cell">
            <?php  echo $this->Form->create('Export');

            echo $this->Form->control('Export.Model', array(
                'options'=>$options,
            ));

            echo $this->Form->submit('Download CSV', array('class'=>'btn btn-primary'));
            echo $this->Form->end();

            ?>
            </fieldset>
        </div>
    </div>
</div>

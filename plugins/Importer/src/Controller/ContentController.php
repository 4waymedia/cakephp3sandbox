<?php
// src/Controller/ContentController.php

//namespace App\Controller;

// plugins/Importer/src/Controller/ContentController.php
namespace Importer\Controller;

use Importer\Controller\AppController;


class ContentController extends AppController
{

    var $downloadData = [
        'Jobs' => array(
            'fields'=>['*']
        ),
        'Payments' => array(
            'fields'=>['*']
        )
    ];


    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        //$this->Auth->allow(['tags']);
    }

    /**
     *	Allow for Export/Import of CSV files to easily update/modify current records in database. Allowed Models are set in this controller as $downloadData = array()
     *
     * Export = checks submitted form for Export array and calls exportContent()
     *          we are using the Model to allow export and to set fields
     *
     * Import = uses the
     *
     */

    public function index(){
        $content_models = $this->downloadData;

        // Prepare for Model for download
        if ($this->request->is('post')) {

            // check for Export form submission
            if($model = $this->request->getData('Export.Model')){
                // check that model is allowed
                if(isset($content_models[$model])){
                    // send data to be exported
                    $this->exportContent($model);
                } else{
                    $this->Session->setFlash("Model not allowed", "flash_error");
                }
            }

            // check for Import form submission
            if($file = $this->request->getData('Import.csv_file')){
                // set model
                // get model from filename
                $model = explode('-', $file['name'])[0];



                if(isset($content_models[$model])){
                    // process file upload
                    $results = $this->importContent($model, $file);
                    $this->set('import_results', $results);
                } else {
                    $this->Session->setFlash("Error with Model name: ". $model, "flash_error");
                }
            }
        }

        // Set models for view
        $this->set('content_models', $content_models);

    }


    /** Exports DB Model table into a csv with allowed fields.
     *
     * NOTES : https://github.com/FriendsOfCake/cakephp-csvview
     *
     * creates CSV file using the ModelName-date as filename format.
     *
     * @param $model
     */
    public function exportContent($model){

        $this->loadModel($model);


        $filename = $model .'-'. date('y-m-d');

        $fields = $this->downloadData[$model]['fields'];

        // if Fields is *, get all fields from Model Schema
        if($fields[0] == '*'){
            $columns = $this->{$model}->getSchema()->columns();
            $fields = $columns;
        }

        $data = $this->{$model}->find('all', array(
            'fields' => $fields
        ))->toArray();

        $this->response->withDownload('export.csv');


        //$this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('data', '_serialize'));
        return;






        /* ORIGINAL

         _serialize = 'data';
        $this->set(compact('data', '_serialize'));

        $this->set(compact(array('data', 'model', 'fields')));

        $this->response->withDownload($filename . ".csv");

        $this->viewBuilder()->setLayout('ajax');

        $this->render('export');

        return;
        */
    }

    public function importContent($model, $file){

        // lazy load model
        $this->loadModel($model);

        // open the file
        $handle = fopen($file['tmp_name'], "r");

        // read the 1st row as headings
        $header = fgetcsv($handle);

        // return messages and errors for view display
        $return = array(
            'messages' => array(),
            'errors' => array(),
        );

        $i = 0;
        $error = false;

        // read each data row in the file
        while (($row = fgetcsv($handle)) !== FALSE) {
            $i++;
            $data = array();

            // rebuild CakePHP model object
            foreach ($header as $k => $head) {
                // get the data field from Model.field
                if (strpos($head,'.')!==false) {
                    $h = explode('.',$head);
                    $data[$h[0]][$h[1]]=(isset($row[$k])) ? $row[$k] : '';
                }else {
                    // get the data field from field
                    $data[$model][$head]=(isset($row[$k])) ? $row[$k] : '';
                }
            }

            // see if we have an id
            $id = isset($data[$model]['id']) ? $data[$model]['id'] : false;

            // we have an id, so we update
            if ($id) {
                // set the model id
                $this->{$model}->id = $id;
            } else {
                // @TODO perhaps we want to create NEW records?
                $this->{$model}->create();
            }

            // validate the row
            $this->{$model}->set($data);

            if (!$this->{$model}->validates()) {

                $results['errors'][] = __(sprintf('Data for Row %d failed to validate.',$i), true);
            }

            // save the row
            if (!$error && !$this->{$model}->save($data, array('callbacks' => false))) {
                $results['errors'][] = __(sprintf('Data for Row %d failed to save.',$i), true);
            }

            // success message!
            if (!$error) {
                $results['messages'][] = __(sprintf('Data for Row %d was saved.',$i), true);
            }
        }

        // close the file
        fclose($handle);

        // return the messages
        return $results;
    }





}
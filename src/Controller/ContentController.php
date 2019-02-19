<?php
namespace App\Controller;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class ContentController extends AppController
{

    var $downloadData = [
        'Jobs' => array(
            'fields'=>['*'],
            'header_row'=>1
        ),
        'Payments' => array(
            'fields'=>['*'],
            'header_row'=>4
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

        $this->loadComponent('Content');

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
                    $this->Flash->set('Error with Model name:', [
                        'element' => 'error'
                    ]);
                }
            }

            // check for Import form submission
            if($file = $this->request->getData('Import.csv_file')){
                $model = $this->request->getData('Import.Model');
                $results = $this->Content->importContent($model, $file);
                $this->set('import_results', $results);
                if(isset($results['error'])){
                    $this->Flash->set('Error with Model name:', [
                        'element' => 'error'
                    ]);
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

        $this->setResponse($this->getResponse()->withDownload($filename . '.csv'));

        $this->set(compact('data', 'fields', 'model'));

        $this->viewBuilder()->setLayout('ajax');

        $this->viewBuilder()->setTemplate('export');
    }



}
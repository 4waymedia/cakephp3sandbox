<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TlhtJobs Controller
 *
 * @property \App\Model\Table\TlhtJobsTable $TlhtJobs
 *
 * @method \App\Model\Entity\TlhtJob[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TlhtController extends AppController
{
    public $paginate = [
        'limit' => 50,
        'order' => [
            'Jobs.appointment_date' => 'DESC'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->Auth->allow(['tags']);
    }




    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Jobs');

        $jobs = $this->Paginator->paginate($this->Jobs->find()->contain(['Payments','AccountPayments']), $this->paginate);
        $this->set(compact('jobs'));

    }

    public function reports()
    {

    }

}
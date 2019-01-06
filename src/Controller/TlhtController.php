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



    }

}

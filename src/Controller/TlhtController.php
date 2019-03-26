<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

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
            'appointment_date' => 'DESC'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Amazon');
        $this->Auth->allow(['tags']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();

        if (isset($user['role']) && $user['role'] === 'Admin') {
            $this->Auth->allow(['*']);
        }
        if (isset($user['role']) && $user['role'] === 'Manager') {
            $this->Auth->allow(['setup']);
        }
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Jobs');

        if($this->request->getParam('pass'))
        {
            $this->paginate['condition'] = [

            ];
        }

        $payPeriods = $this->Amazon->getCurrentPayPeriod();

        //$passedArgs = $this->request->getParam('pass');

        $jobs = $this->Paginator->paginate($this->Jobs->find()->contain(['Payments','AccountPayments']), $this->paginate);
        $this->set(compact('jobs', 'payPeriods'));

    }

    public function reports()
    {
// Check Jobs
        $this->loadModel('Jobs');
        $first_job = $this->Jobs->find('all', [
            'conditions' => ['Jobs.appointment_date IS NOT NULL'],
            'order' => ['Jobs.id' => 'ASC']
        ])->first();
        $jobs['first'] = $first_job->toArray();

        $last_job = $this->Jobs->find('all', [
            'conditions' => ['Jobs.appointment_date IS NOT NULL'],
            'order' => ['Jobs.id' => 'DESC']
        ])->first();
        $jobs['last'] = $last_job->toArray();
        $jobs['count'] = $this->Jobs->find('all')->count();

        $this->set(compact('jobs'));

        // Check Payments
        $this->loadModel('Payments');
        $first_payment = $this->Payments->find('all', [
            'order' => ['Payments.id' => 'ASC']
        ])->first();
        $payments['first'] = $first_payment->toArray();

        $last_payment = $this->Payments->find('all', [
            'order' => ['Payments.id' => 'DESC']
        ])->first();
        $payments['last'] = $last_payment->toArray();
        $payments['count'] = $this->Payments->find('all')->count();

        $this->set(compact('payments'));
    }

    public function setup(){
        $user_id = $user = $this->Auth->user('id');

        $this->UserBusinesses = TableRegistry::getTableLocator()->get('BusinessesUsers');
        $userBusiness = $this->UserBusinesses->find('all', [
            'conditions' => ['user_id'=>$user_id]
        ])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $userBusiness = $this->UserBusinesses->patchEntity($userBusiness, $this->request->getData());
            if ($this->UserBusinesses->save($userBusiness)) {

                if(isset($userBusiness->first_pay_period_date)){
                    $start_date = $userBusiness->first_pay_period_date;
                    $this->Amazon->generateUserPayPeriods($user_id, $start_date, true);
                }
                $this->Flash->success(__('The user business has been saved.'));

            }else{
                $this->Flash->error(__('The user business could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('userBusiness', 'users'));
    }

}
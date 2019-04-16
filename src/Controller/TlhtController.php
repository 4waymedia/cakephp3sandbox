<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

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
        if (isset($user['role']) && in_array($user['role'], array('Manager', 'Admin'))) {
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

        $business_id = $this->Auth->user('business_id');

        $payPeriods = $this->Amazon->getCurrentPayPeriod($business_id);

        if(!$payPeriods){
            $this->Flash->notice(__('You must setup your business Pay Periods before using the Dashboard.'));
            $this->redirect(['controller'=>'tlht', 'action'=>'setup']);
        }

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
            'order' => ['Jobs.appointment_date' => 'ASC']
        ])->first();
        $jobs['first'] = $first_job->toArray();

        $last_job = $this->Jobs->find('all', [
            'conditions' => ['Jobs.appointment_date IS NOT NULL'],
            'order' => ['Jobs.appointment_date' => 'DESC']
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

        $this->set(compact('payments', 'jobs'));
    }

    public function setup(){
        $user_id = $user = $this->Auth->user('id');

        $this->UserBusinesses = TableRegistry::getTableLocator()->get('BusinessesUsers');
        $this->Businesses = TableRegistry::getTableLocator()->get('Businesses');

        $businesses = $this->Businesses->find('all', [
            'conditions' => ['user_id'=>$user_id]
        ])->first();

        if(!$businesses){
            $businesses = $this->Businesses->newEntity();
            $businesses->user_id = $user_id;
            if($this->Businesses->save($businesses)){
                $this->request->getSession()->write('Auth.User.business_id', $businesses->id);
            }
        }

        $userBusiness = $this->UserBusinesses->find('all', [
            'conditions' => ['user_id'=>$user_id]
        ])->first();

        if(!$userBusiness){
            $userBusiness = $this->UserBusinesses->newEntity();
            $userBusiness->user_id = $user_id;
            $userBusiness->business_id = $businesses->id;
            $this->UserBusinesses->save($userBusiness);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {

            $businesses = $this->Businesses->patchEntity($businesses, $this->request->getData());

            $userBusiness = $this->UserBusinesses->patchEntity($userBusiness, $this->request->getData());

            if ($this->Businesses->save($businesses)) {

                $this->request->getSession()->write('Auth.User.business_id', $businesses->id);

                if(isset($userBusiness->first_pay_period_date) && $userBusiness->isDirty('first_pay_period_date')){
                    // Convert to datetime
                    $start_date = \Cake\Database\Type::build('date')->marshal($userBusiness->first_pay_period_date);

                    $this->Amazon->generateBusinessPayPeriods($userBusiness->business_id, $start_date, true);
                }
                $this->Flash->success(__('The have created your Business'));
                $this->redirect(['controller'=>'businesses', 'action'=>'index']);

            }else{
                $this->Flash->error(__('The user business could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('businesses','userBusiness'));
    }

}
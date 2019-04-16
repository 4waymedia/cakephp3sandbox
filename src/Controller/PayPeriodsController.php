<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * PayPeriods Controller
 *
 * @property \App\Model\Table\PayPeriodsTable $PayPeriods
 *
 * @method \App\Model\Entity\PayPeriod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayPeriodsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('PayPeriods'); //<----- HERE
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $query = $this->PayPeriods->find('all')->order(['start_date' => 'DESC'])->where(['business_id' => $this->Auth->user('business_id')]);
        $payPeriods = $this->paginate($query);

        $this->set(compact('payPeriods'));
    }

    /**
     * View method
     *
     * @param string|null $id Pay Period id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payPeriod = $this->PayPeriods->get($id, [
            'contain' => []
        ]);

        $business_id = $this->Auth->user('business_id');

        $period_start = \Cake\Database\Type::build('date')->marshal($payPeriod->start_date)->format('Y-m-d');
        $period_end = \Cake\Database\Type::build('date')->marshal($payPeriod->end_date)->format('Y-m-d');

        // Get Jobs from date range
        $this->Jobs = TableRegistry::getTableLocator()->get('Jobs');


        $query = [
            'limit' => 50,
            'order' => [
                'appointment_date' => 'DESC'
            ]
        ];

        $jobs = $this->Jobs->find('all')
            ->where(['business_id'=>$business_id])
            ->Where([
                'AND' => [['appointment_date >=' => $period_start], ['appointment_date <=' => $period_end]]
            ])
            ->contain(['Payments','AccountPayments'])
            ->toArray();

        $this->set(compact('payPeriod', 'jobs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payPeriod = $this->PayPeriods->newEntity();
        if ($this->request->is('post')) {
            $payPeriod = $this->PayPeriods->patchEntity($payPeriod, $this->request->getData());
            if ($this->PayPeriods->save($payPeriod)) {
                $this->Flash->success(__('The pay period has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay period could not be saved. Please, try again.'));
        }
        $this->set(compact('payPeriod'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Period id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payPeriod = $this->PayPeriods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payPeriod = $this->PayPeriods->patchEntity($payPeriod, $this->request->getData());
            if ($this->PayPeriods->save($payPeriod)) {
                $this->Flash->success(__('The pay period has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay period could not be saved. Please, try again.'));
        }
        $this->set(compact('payPeriod'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Period id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payPeriod = $this->PayPeriods->get($id);
        if ($this->PayPeriods->delete($payPeriod)) {
            $this->Flash->success(__('The pay period has been deleted.'));
        } else {
            $this->Flash->error(__('The pay period could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function generate(){

        // if post, generate PayPeriods

    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AccountPayments Controller
 *
 * @property \App\Model\Table\AccountPaymentsTable $AccountPayments
 *
 * @method \App\Model\Entity\AccountPayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountPaymentsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['display', 'view', 'index']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accounts', 'Contractors', 'Jobs']
        ];

        $accountPayments = $this->paginate($this->AccountPayments);

        $this->set(compact('accountPayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Account Payment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountPayment = $this->AccountPayments->get($id, [
            'contain' => ['Accounts', 'Contractors', 'Jobs']
        ]);

        $this->set('accountPayment', $accountPayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id= null)
    {
        if($id == null){
            $this->Flash->set(__('You must add a Payment from a Job.'));
            return $this->redirect(['action'=>'index']);
        }

        $accounts = $this->AccountPayments->Accounts->find('list', ['limit' => 200])
            ->where(['business_id'=>$this->Auth->user('business_id')])
            ->toArray();

        if(empty($accounts)){
            $this->Flash->error(__('You must create a Payment Account before logging payments.'));

            return $this->redirect(['controller'=>'accounts', 'action' => 'add']);
        }

        $accountPayment = $this->AccountPayments->newEntity();
        $job = $this->AccountPayments->Jobs->get($id, [
            'contain' => [
                'Payments',
                'Technicians'=>['fields'=>['id','technician_id']]
            ]
        ])->toArray();

        if ($this->request->is('post')) {

            $accountPayment = $this->AccountPayments->patchEntity($accountPayment, $this->request->getData());
            $accountPayment->order_id = $job['service_order_id'];


            if ($this->AccountPayments->save($accountPayment)) {
                $this->Flash->success(__('The account payment has been saved.'));

                return $this->redirect(['controller'=>'tlht', 'action' => 'index']);
            }
            $this->Flash->error(__('The account payment could not be saved. Please, try again.'));
        }

        $paymentsMade = $this->AccountPayments->find('all', [
            'conditions' => ['job_id'=>$id]
            ])->toArray();

        $contractors = $this->AccountPayments->Contractors->find('list', ['limit' => 200, 'keyField' => 'id',
            'valueField' => 'technician_id'])->toArray();

        $this->set(compact('accountPayment', 'accounts', 'contractors', 'job','paymentsMade'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Account Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountPayment = $this->AccountPayments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountPayment = $this->AccountPayments->patchEntity($accountPayment, $this->request->getData());
            if ($this->AccountPayments->save($accountPayment)) {
                $this->Flash->success(__('The account payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account payment could not be saved. Please, try again.'));
        }
        $accounts = $this->AccountPayments->Accounts->find('list', ['limit' => 200]);
        $contractors = $this->AccountPayments->Contractors->find('list', ['limit' => 200]);
        //$jobs = $this->AccountPayments->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('accountPayment', 'accounts', 'contractors', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Account Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountPayment = $this->AccountPayments->get($id);
        if ($this->AccountPayments->delete($accountPayment)) {
            $this->Flash->success(__('The account payment has been deleted.'));
        } else {
            $this->Flash->error(__('The account payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

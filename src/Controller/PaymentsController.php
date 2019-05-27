<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 *
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Accounting');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $payments = $this->paginate($this->Payments);

        $this->set(compact('payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => []
        ]);

        $this->set('payment', $payment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payment = $this->Payments->newEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }

        $this->set(compact('payment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $this->set(compact('payment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function generate(){
        $records = $this->Payments->find('all')->contain('Payments', function (Query $q) {
            return $q
                ->select(['body', 'author_id'])
                ->where(['Comments.approved' => true]);
        });

        $this->set(compact('records'));
    }


    /** AUTO complete all payments for Pay Period ID
     *
     * @param $id
     */
    public function auto($id){

        $this->PayPeriods = TableRegistry::getTableLocator()->get('PayPeriods');

        // Get payPeriod by ID
        $pay_period = $this->PayPeriods->get($id, [
            'contain' => []
        ]);

        // Calculate PayPeriod Stats
        $stats = $this->Accounting->generatePayPeriodStats($id);

        $updatedPayPeriod = $this->PayPeriods->patchEntity($pay_period, $stats);
        // Save stats
        $this->PayPeriods->save($updatedPayPeriod);

        // Set all Pay Period Stats to session for auto/bulk payments
        $preparedPay = $this->Accounting->payPeriodPayments($id);

        // Get all AccountPayments

        if(!isset($preparedPay['completed'])){
            $this->Flash->error(__('No Payments made'));
        }

        return $this->redirect(['controller'=>'pay_periods', 'action'=>'review', $id]);

    }

}

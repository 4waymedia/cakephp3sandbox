<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        // Handle filters by Job Status
        $job_status = $this->request->getQuery('job_status', 'all');;
        if($job_status && $job_status != 'all'){
            $this->paginate['conditions']['job_status'] = $job_status;
        }

        // Handle filters by Product Order Status
        $product_status = $this->request->getQuery('product_status', 'all');;
        if($product_status && $product_status != 'all'){
            $this->paginate['conditions']['product_order_status'] = $product_status;
        }

        // Handle filters by Product Order Status
        $technician = $this->request->getQuery('technician', 'all');;
        if($technician && $technician != 'all'){
            $this->paginate['conditions']['technician'] = $technician;
        }
        
        $status_query = $this->Jobs->find();

        $job_statuses = $status_query->select(['job_status'])->distinct(['job_status']);

        $product_order_statuses = $this->Jobs->find('list', [
            'keyField'=>'product_order_status',
            'valueField'=>'product_order_status'
        ])->distinct();

        $technicians = $this->Jobs->find('list', [
            'keyField' => 'technician',
            'valueField' => 'technician'
        ])->distinct();

        $job_statuses = $job_statuses->toArray();
        $product_order_statuses = $product_order_statuses->toArray();

        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs', 'job_statuses', 'product_order_statuses', 'technicians'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Technicians']
        ]);

        $this->set('job', $job);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
       /* $serviceOrders = $this->Jobs->ServiceOrders->find('list', ['limit' => 200]);
        $productOrders = $this->Jobs->ProductOrders->find('list', ['limit' => 200]);
        $buyers = $this->Jobs->Buyers->find('list', ['limit' => 200]);
       */
       $this->set(compact('job'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        /*
        $serviceOrders = $this->Jobs->ServiceOrders->find('list', ['limit' => 200]);
        $productOrders = $this->Jobs->ProductOrders->find('list', ['limit' => 200]);
        $buyers = $this->Jobs->Buyers->find('list', ['limit' => 200]);
        */
        $this->set(compact('job'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

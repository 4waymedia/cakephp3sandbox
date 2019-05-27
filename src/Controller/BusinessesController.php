<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Businesses Controller
 *
 * @property \App\Model\Table\BusinessesTable $Businesses
 *
 * @method \App\Model\Entity\Business[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessesController extends AppController
{

    public $uses = ['Role'];
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
        $this->Auth->allow(['logout', 'register', 'login', 'join']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       
        $query = $this->Businesses->find('all')->where(['user_id' => $this->Auth->user('id')])->contain(['PayPeriods', 'Contractors']);
        $businesses = $this->paginate($query);

        $this->Roles = TableRegistry::getTableLocator()->get('Roles');
        $roles = $this->Roles->find('list')->toArray();

        $this->set(compact('businesses', 'roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => ['Users', 'PayPeriods']
        ]);

        $this->set('business', $business);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $business = $this->Businesses->newEntity();
        if ($this->request->is('post')) {
            $business = $this->Businesses->patchEntity($business, $this->request->getData());
            if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The business has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business could not be saved. Please, try again.'));
        }
        $users = $this->Businesses->Users->find('list', ['limit' => 200]);
        $this->set(compact('business', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $business = $this->Businesses->patchEntity($business, $this->request->getData());
            if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The business has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business could not be saved. Please, try again.'));
        }

        $this->set(compact('business'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $business = $this->Businesses->get($id);
        if ($this->Businesses->delete($business)) {

            $this->deleteAssociated($id);

            $this->Flash->success(__('The business has been deleted.'));
        } else {
            $this->Flash->error(__('The business could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteAssociated($id){

        // Delete Pay Periods
        $this->loadModel('PayPeriods');
        $this->PayPeriods->deleteAll(['business_id' => $id]);

    }

}

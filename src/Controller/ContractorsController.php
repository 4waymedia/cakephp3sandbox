<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contractors Controller
 *
 * @property \App\Model\Table\ContractorsTable $Contractors
 *
 * @method \App\Model\Entity\Contractor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContractorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $this->loadComponent('Paginator');
        $contractors = $this->Paginator->paginate($this->Contractors->find());
        $roles = $this->Contractors->Roles->find('list', ['limit' => 200])->toArray();
        $this->set(compact('contractors', 'roles'));

    }

    /**
     * View method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractor = $this->Contractors->get($id, [
                'contain' => [
                    'Roles' => ['fields'=> ['name']],
                    'AccountPayments'
                    ]
            ]
        );

        $this->set(compact('contractor', 'roles'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractor = $this->Contractors->newEntity();
        if ($this->request->is('post')) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());

            // Use the Business ID based from Auth.... This Allows a Admin to Ghost as a business to assist
            $contractor['business_id'] = $this->Auth->user('business_id');

            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
        }

        $roles = $this->Contractors->Roles->find('list', ['limit' => 200]);
        $this->set(compact('roles', 'contractor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractor = $this->Contractors->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());

            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
        }

        $roles = $this->Contractors->Roles->find('list', ['limit' => 200]);
        $this->set(compact('contractor', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contractor = $this->Contractors->get($id);
        if ($this->Contractors->delete($contractor)) {
            $this->Flash->success(__('The contractor has been deleted.'));
        } else {
            $this->Flash->error(__('The contractor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

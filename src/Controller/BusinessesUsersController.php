<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BusinessesUsers Controller
 *
 * @property \App\Model\Table\BusinessesUsersTable $BusinessesUsers
 *
 * @method \App\Model\Entity\BusinessesUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Businesses', 'Users']
        ];
        $businessesUsers = $this->paginate($this->BusinessesUsers);

        $this->set(compact('businessesUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Businesses User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessesUser = $this->BusinessesUsers->get($id, [
            'contain' => ['Businesses', 'Users']
        ]);

        $this->set('businessesUser', $businessesUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $businessesUser = $this->BusinessesUsers->newEntity();
        if ($this->request->is('post')) {
            $businessesUser = $this->BusinessesUsers->patchEntity($businessesUser, $this->request->getData());
            if ($this->BusinessesUsers->save($businessesUser)) {
                $this->Flash->success(__('The businesses user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The businesses user could not be saved. Please, try again.'));
        }
        $businesses = $this->BusinessesUsers->Businesses->find('list', ['limit' => 200]);
        $users = $this->BusinessesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('businessesUser', 'businesses', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Businesses User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessesUser = $this->BusinessesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessesUser = $this->BusinessesUsers->patchEntity($businessesUser, $this->request->getData());
            if ($this->BusinessesUsers->save($businessesUser)) {
                $this->Flash->success(__('The businesses user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The businesses user could not be saved. Please, try again.'));
        }
        $businesses = $this->BusinessesUsers->Businesses->find('list', ['limit' => 200]);
        $users = $this->BusinessesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('businessesUser', 'businesses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Businesses User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $businessesUser = $this->BusinessesUsers->get($id);
        if ($this->BusinessesUsers->delete($businessesUser)) {
            $this->Flash->success(__('The businesses user has been deleted.'));
        } else {
            $this->Flash->error(__('The businesses user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * User Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
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
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $users = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $users = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('public');
        if ($this->request->is('post')) {
            $this->Auth->logout();
            $user = $this->Auth->identify();

            // get role name
            $user['role'] = $this->Users->Roles->get($user['role_id'])->name;

            if ($user) {
                switch($user['role']){
                    case 'SysAdmin':
                    case 'Admin':
                        $BusinessesUsers = TableRegistry::get('BusinessesUsers');
                        $business = $BusinessesUsers->find()->where(['user_id'=> $user['id']])->first();

                        if($business){
                           $user['business_id'] = $business->business_id;
                        }

                        break;
                    case 'Technician':
                        $this->Auth->setUser($user);
                        return $this->redirect(['controller' => 'Contractors', 'action' => 'dashboard']);
                        break;
                }

                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }


    public function register(){
        $this->viewBuilder()->setLayout('public');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            // Set Role to Admin for business owner
            $user['role_id'] = 3;
            $users = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                // Save Business
                $business = $this->request->getData('Business');
                $business['user_id'] = $user->id;
                // Now Save Business info

                $this->Businesses = TableRegistry::get('Businesses');
                $business_entity = $this->Businesses->newEntity();
                $new_business = $this->Businesses->patchEntity($business_entity, $business);

                $this->Businesses->save($new_business);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller'=>'users', 'action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function verify_setup(){
        // check if the users account is setup

        // check for current pay period

            // check if first_pay_period_date is set

        // redirect

    }
}

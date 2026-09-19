<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }



    public function login()
    {
        $this->viewBuilder()->setLayout('admin');
        $this->set('isLoginPage', true);
        $this->request->allowMethod(['get', 'post', 'head']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->rehashPasswordIfNeeded();

            return $this->redirect($this->loginRedirectUrl());
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Usuario o contraseña inválidos.');
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
        }

        return $this->redirect(Router::url('/admin/login'));
    }

    private function loginRedirectUrl(): string|array
    {
        $redirect = $this->request->getQuery('redirect');
        if (!is_string($redirect) || $redirect === '' || preg_match('#^(https?:)?//#i', $redirect)) {
            return ['controller' => 'Admin', 'action' => 'index'];
        }

        return Router::url($redirect);
    }

    private function rehashPasswordIfNeeded(): void
    {
        $identity = $this->Authentication->getIdentity();
        $password = (string)$this->request->getData('password');
        if (!$identity || $password === '') {
            return;
        }

        $user = $this->Users->get($identity->getIdentifier());
        $hasher = new \Authentication\PasswordHasher\DefaultPasswordHasher();
        if ($hasher->needsRehash((string)$user->get('password'))) {
            $user->password = $password;
            $this->Users->save($user);
        }
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find()
            ->contain(['Roles']);
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: ['Roles']);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->userFormData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->userFormData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
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
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function userFormData(): array
    {
        $data = $this->request->getData();
        if (empty($data['password'])) {
            unset($data['password']);
        }

        return $data;
    }
}

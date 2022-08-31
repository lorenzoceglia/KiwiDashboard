<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Cache\Cache;
use Cake\Http\Client;

/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->_setUserVariables();
        $this->loadComponent('Paginator');
        $this->loadComponent('Maps');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function index($id = null)
    {
        $this->set('users', $this->paginate($this->Users));
        //$this->set('dog_link', $this->Maps->request()->message);
    }

    public function profile()
    {
        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            $logged_user = $this->request->getAttribute('identity');

            $user = $this->users_table->get($logged_user->id);
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->email = $data['email'];
            if($data['password'] === $data['confirm_password']){
                $user->password = $data['password'];
            }
            if($this->users_table->save($user))
            {
                $this->Flash->success('Saved changes');
            }
            else {
                $this->Flash->error('Something gone wrong!');
            }


            $this->redirect(['controller' => 'users', 'action' => 'profile']);
        }
        else {
            $logged_user = $this->request->getAttribute('identity');
            $current_user = $user = $this->users_table->get($logged_user->id);
            $this->set('logged_user', $current_user);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {

            $user = $this->Users->newEmptyEntity();
            $user->firstname = $this->request->getData('firstname');
            $user->lastname = $this->request->getData('lastname');
            $user->username = $this->request->getData('username');
            $user->password = $this->request->getData('password');
            $user->email = $this->request->getData('email');
            $user->token = base64_encode($user->firstname . $user->lastname . $user->username);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            else $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
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
        $user = $this->Users->get($id, [
            'contain' => [],
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
     * @return \Cake\Http\Response|null|void Redirects to index.
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

    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        $this->request->allowMethod(['get', 'post']);

        $result = $this->Authentication->getResult();


        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {

            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'users',
                'action' => 'dashboard',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error( t('Username or password not valid'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function dashboard()
    {
        $init_stats = $this->analytics_table->get(1);

        $this->set('stats',$init_stats->toArray());
        $this->set('auth_n', count($this->clients_table->getAllUnAuthenticated()));
        $this->set('registered_users', count($this->clients_table->getAll()));
        $this->set('n_auth_n', count($this->clients_table->getAllAuthenticated()));
    }

    private function _setUserVariables()
    {
        $this->set('login_message', t('Hey You!'));
        $this->set('email_input', t('Insert an Email address...'));
        $this->set('password_input', t("And don't forget the password!"));
        $this->set('remember_me', t('Remember Me'));
        $this->set('forgot_password', t('Forgot the password?'));

        $this->set('registered_users_text', t('Registered Users'));
        $this->set('earnings_a', t('Messages Sent'));
        $this->set('tasks', t('Goals'));
        $this->set('pending', t('Im a placeholder'));

        $this->set('users_graph', t('Users Chart'));

        $this->set('online', t('Autenticati'));
        $this->set('offline', t('Non Autenticati'));
    }
}

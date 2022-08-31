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
class ClientsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function manage($id = null)
    {
        $this->set('clients', $this->paginate($this->Clients));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function send()
    {
        $this->set('clients', $this->clients_table->getAllAuthenticated());
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        if ($this->request->is(['post'])) {
            $data = $this->request->getData();
            $id = $data['usr-id'];
            $user = $this->clients_table->get($id);

            $user = $this->clients_table->patchEntity($user, $this->request->getData());
            if ($this->clients_table->save($user)) {
                $this->Flash->success(__('The user has been modified.'));

                $this->redirect(['controller' => 'clients', 'action' => 'manage']);
            }
            $this->Flash->error(__('The user could not be modified. Please, try again.'));
        }
        //$this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        if ($this->request->is(['post'])) {
            $data = $this->request->getData();
            $id = $data['usr-id'];
            $user = $this->clients_table->get($id);
            if ($this->clients_table->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }

        }
        $this->redirect(['controller' => 'clients', 'action' => 'manage']);
        //return $this->redirect(['action' => 'index']);
    }
}

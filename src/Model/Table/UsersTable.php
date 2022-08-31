<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{

    public $model = 'Users';

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function getAll($conditions = [], $order = null, $fields = [], $obj = false)
    {
        $options = [
            'conditions' => $conditions,
            'order' => (is_null($order) ? 'Users.lastname ASC' : $order),
            'fields' => $fields
        ];
        $results = $this->find('all', $options);

        if (!$obj) $results = $results->toArray();
        return $results;
    }

    public function getById($user_id = null)
    {
        $results = [];
        if (!is_null($user_id)) {
            $conditions = ['Users.id' => $user_id];
            $results = $this->find('all', ['conditions' => $conditions, 'contain' => $this->contain]);
            if (!empty(array($results))) {
                $results = $results->first();
            }
        }
        return $results;
    }

    public function getTokenById($id = null)
    {
        $result = null;
        if (!is_null($id)) {
            $options = [
                'conditions' => [$this->model . '.id' => $id]
            ];

            $results = $this->find('all', $options)->first();
            if (!empty($results)) {
                $results->toArray();
                $result = $results['token'];
            }
        }
        return $result;
    }

    public function getEmailById($id = null)
    {
        $result = null;
        if (!is_null($id)) {
            $conditions = [$this->model . '.id' => $id];
            $results = $this->find('all', ['conditions' => $conditions, 'contain' => $this->contain])->first();
            if (!empty($results)) {
                $results->toArray();
                $result = $results['user_info']['email'];
            }
        }
        return $result;
    }

    public function getByUsername($username = null)
    {
        if (!is_null($username)) {
            $conditions = ['Users.username' => $username];
            $results = $this->find('all', ['conditions' => $conditions, 'contain' => $this->contain])->first();
            if (!empty($results)) return $results->toArray();
            else return [];
        } else return [];
    }

    public function getByToken($token = null)
    {
        if (!is_null($token)) {
            $conditions = ['Users.token' => $token];
            $results = $this->find('all', ['conditions' => $conditions, 'contain' => $this->contain])->first();
            if (!empty($results)) return $results->toArray();
            else return [];
        } else return [];
    }

    public function deleteByToken($token= null)
    {
        $results = false;
        if (!is_null($token)) {
            $entity = $this->get($token);
            if ($this->delete($entity)) {
                $results = true;
            }
        }
        return $results;
    }

}

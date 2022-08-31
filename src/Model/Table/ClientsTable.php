<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ClientsTable extends Table
{

    public $model = 'Clients';

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function getByAuthToken($a_code = null)
    {
        $result = null;
        if (!is_null($a_code)) {
            $options = [
                'conditions' => [$this->model . '.auth_code' => $a_code]
            ];

            $results = $this->find('all', $options)->first();
        }
        return $results;
    }

    public function getAllUnAuthenticated($conditions = [], $order = null, $fields = [], $obj = false)
    {
        $conditions = [ $this->model . '.auth_code' => 'NULL'];

        $options = [
            'conditions' => $conditions,
            'order' => (is_null($order) ? 'Clients.name ASC' : $order),
            'fields' => $fields
        ];
        $results = $this->find('all', $options);

        if (!$obj) $results = $results->toArray();
        return $results;
    }

    public function getAllAuthenticated($conditions = [], $order = null, $fields = [], $obj = false)
    {
        $conditions = ['not' => array($this->model . '.auth_code' => 'NULL')];

        $options = [
            'conditions' => $conditions,
            'order' => (is_null($order) ? 'Clients.name ASC' : $order),
            'fields' => $fields
        ];
        $results = $this->find('all', $options);

        if (!$obj) $results = $results->toArray();
        return $results;
    }



    public function getAll($conditions = [], $order = null, $fields = [], $obj = false)
    {
        $options = [
            'conditions' => $conditions,
            'order' => (is_null($order) ? 'Clients.name ASC' : $order),
            'fields' => $fields
        ];
        $results = $this->find('all', $options);

        if (!$obj) $results = $results->toArray();
        return $results;
    }

}

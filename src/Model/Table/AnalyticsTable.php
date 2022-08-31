<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class AnalyticsTable extends Table
{

    public $model = 'Analytics';

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
            'fields' => $fields
        ];
        $results = $this->find('all', $options);

        if (!$obj) $results = $results->toArray();
        return $results;
    }

}

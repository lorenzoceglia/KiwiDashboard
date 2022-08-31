<?php
declare(strict_types=1);

namespace App\Controller;

use Alexa\Request\IntentRequest;
use Alexa\Request\LaunchRequest;
use Alexa\Request\Request;
use Alexa\Request\User;
use Alexa\Response\Card;
use Alexa\Response\OutputSpeech;
use Alexa\Response\Response;
use Cake\Cache\Cache;
use Cake\Event\EventInterface;
use Cake\Http\Client;

/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->Authentication->addUnauthenticatedActions(['request']);
    }

    public function request(){
        $this->autoRender = false;
        $response_data = [];
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if (!empty($data['auth_code'])) {
                if(empty($this->users_table->getByToken($data['auth_code'])))
                {
                    if (!empty($data['method'])) {
                        try {
                            $result = $this->{'_' . $data['method']}($data);
                            $response_data = (isset($result['response_data'])) ? $result['response_data'] : [];
                        } catch (Error $e) {
                            $response_data['msg'] = 'unknown_method';
                            $response_data['type'] = 'warning';
                        }
                    } else {
                        $response_data['msg'] = 'method_cant_be_null!';
                        $response_data['type'] = 'warning';
                    }
                }
                else {
                    $response_data['msg'] = 'auth_code_not_valid!';
                    $response_data['type'] = 'warning';
                }
            } else {
                $response_data['msg'] = 'auth_code_cant_be_null!';
                $response_data['type'] = 'warning';
            }
        }
        else $this->getError404();

        $response = $this->response;
        $response = $response
            ->withStatus(200)
            ->withType('application/json');
        $response = $response->withStringBody(json_encode($response_data, JSON_FORCE_OBJECT));

        return $response;
    }

    private function _getStats($data)
    {
        $return_array = [];
        $stats_row = $this->analytics_table->get(1);

        $stats_row = $stats_row->toArray();
        unset($stats_row['id']);

        $return_array['response_data'] = [
            'msg' =>  $stats_row,
            'type' => 'success'
        ];

        return $return_array;
    }

    private function _resetStats($data){
        $stats_row = $this->analytics_table->get(1);

        $stats_row->messages_sent = 0;
        $stats_row->visits =  0;

        if($stats_row = $this->analytics_table->save($stats_row))
        {
            $return_array['response_data'] = [
                'msg' =>  'ok_stats_resetted',
                'type' => 'success'
            ];
        }
        else {
            $return_array['response_data'] = [
                'msg' =>  'error_saving',
                'type' => 'danger'
            ];
        }
        return $return_array;
    }

    private function _updateStats($data)
    {
        $return_array = [];

        if (!empty($data['analytics'])) {
            $stats_row = $this->analytics_table->get(1);

            switch ($data['analytics'])
            {
                case "messages_sent":
                    $stats_row->messages_sent = $stats_row->messages_sent+1;
                break;
                case "visits":
                    $stats_row->visits = $stats_row->visits+1;
                break;
            }

            if($this->analytics_table->save($stats_row)) {
                $return_array['response_data'] = [
                    'msg' =>  'ok_success',
                    'type' => 'success'
                ];
            }
            else {
                $return_array['response_data'] = [
                    'msg' =>  'stats_save_error!',
                    'type' => 'success'
                ];
            }
        }
        else {
            $return_array['response_data'] = [
                'msg' =>  'error!',
                'type' => 'danger'
            ];
        }

        return $return_array;
    }

    private function _addUser($data)
    {
        $return_array['response_data'] = [
            'msg' =>  'user_cannot_be_created!',
            'type' => 'danger'
        ];

        $new_user = $this->clients_table->newEmptyEntity();

        $new_user->name = $data['name'];
        $new_user->surname = $data['surname'];
        $new_user->nickname = $data['nickname'];
        $new_user->auth_code = '';


        if($this->clients_table->save($new_user))
        {
            $return_array['response_data'] = [
                'msg' =>  'user_created!',
                'type' => 'success'
            ];
        }

        return $return_array;
    }

    private function _addAuthCode($data) {
        $return_array['response_data'] = [
            'msg' =>  'auth_code_cannot_be_added!',
            'type' => 'danger'
        ];

        $retrieved_user = $this->clients_table->getByAuthToken((int)$data['auth_code']);

        $retrieved_user->auth_code = $data['new_auth_code'];

        if($this->clients_table->save($retrieved_user))
        {
            $return_array['response_data'] = [
                'msg' =>  'auth_code_added!',
                'type' => 'success'
            ];
        }

    }

}

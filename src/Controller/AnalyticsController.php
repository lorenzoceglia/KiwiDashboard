<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Cache\Cache;

/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnalyticsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions(['getStats']);
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function getStats()
    {
        $this->autoRender = false;
        $response_data = [];
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if (!empty($data['auth_code'])) {
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

}

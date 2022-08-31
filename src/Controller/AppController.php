<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Filesystem\Folder;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Telegram');
        $this->loadComponent('Authentication.Authentication');

        $this->_setConfigsVariables();

        $this->_setVariables();
        $this->_setTableVariables();
        $this->_setTextVariables();
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function getConfig($name = null, $subkey = null)
    {
        return Configure::read($name, 'config')[$subkey];
    }

    public function getError404()
    {
        throw new NotFoundException('404');
    }

    private function _setConfigsVariables()
    {
        $config = $this->getConfig(null, 'default');

        foreach ($config as $key => $value) {
            $this->$key = $value;
            $this->set($key, $value);
        }
    }

    private function _setTableVariables()
    {
        $dir = new Folder('../src/Model/Table');
        $files = $dir->find('.*\.php');
        foreach ($files as $file) {
            $variable = Inflector::underscore(str_replace(".php", "", $file));
            $this->$variable = TableRegistry::getTableLocator()->get(str_replace("Table.php", "", $file));
        }
    }

    private function _setVariables()
    {
        $this->set('back_link', $this->referer());
        $this->set('current_controller', $this->current_controller = $this->request->getParam('controller'));
        $this->set('current_action', $this->current_action = $this->request->getParam('action'));
    }

    private function _setTextVariables()
    {
        $this->set('search', t('Cerca per...'));
        $this->set('logout_message', t('Seleziona "Esci" qui sotto se sei pronto a chiudere la tua sessione attuale.'));
        $this->set('messages_center', t('Centro Messaggi'));
        $this->set('notification_center', t('Centro Notifiche'));
        $logged_user = $this->request->getAttribute('identity');
        if ($logged_user) $this->set('current_user', $this->users_table->get($logged_user->id));
    }
}

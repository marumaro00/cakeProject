<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	public $helpers = [
        'DataTables' => [
            'className' => 'DataTables.DataTables'
        ]
    ];
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->deny(['display']);
		//$this->Auth->deny(['Dashboard', 'home']);
    }
	 
    public function initialize()
    {
		$this->loadComponent('DataTables.DataTables');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Admin',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Admin',
                'action' => 'login'
            ],
			'loginAction' => [
                'controller' => 'Admin',
                'action' => 'login',
            ],
        ]);
		$this->Auth->config('authenticate', [
			'Basic' => ['userModel' => 'Admin'],
			'Form' => ['userModel' => 'Admin']
		]);
		
		$session = $this->request->session();
		$this->set('user',$session->read('User.fullname'));
		$this->set('role',$session->read('User.role'));
		$this->set('act',$session->read('User.id'));
		$this->set(compact('user','role','act'));
    }
	
}

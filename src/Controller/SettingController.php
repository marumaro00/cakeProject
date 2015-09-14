<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;

class SettingController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
		
	public function index()
	{ 
		$this->set(['loginLayout' => Configure::read('Layout.login')]);
	}
	public function layout()
	{
		$this->set(['data' => 'success',
					'_serialize' => 'data']);
	}
	
}

?>
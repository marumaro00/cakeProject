<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\CompanyLogoForm;
use App\Form\CompanyForm;
use App\Form\CompanyBannerForm;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * Company Controller
 *
 * @property \App\Model\Table\CompanyTable $Company
 */
class CompanyController extends AppController
{
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['Logo', 'Banner']);
	}
	
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	
	public function index($portlet = null)
	{
		if($portlet)
		{
			$this->layout = '';
		}
		$company = new CompanyForm();
		$this->request->data['name'] = Configure::read('Company.name');
		$this->request->data['address'] = Configure::read('Company.address');
		$this->request->data['contact'] = Configure::read('Company.contact');
		$this->set('company', $company);
	}
    public function upload($type = null)
    {
        if ($this->request->is('post')) {
			if($type == 'Logo' || $type == 'logo')
			{
				$company = new CompanyLogoForm();
				if ($company->execute($this->request->data['file']))
				{
					$status = 'OK';
					$message = 'Logo has been saved';
				}
				else
				{
					$status = 'error';
					$message = $this->request->data;
				}
			}
			else if($type == 'Banner' || $type == 'banner')
			{
				$company = new CompanyBannerForm();
				if ($company->execute($this->request->data['file']))
				{
					$status = 'OK';
					$message = 'Logo has been saved';
				}
				else
				{
					$status = 'error';
					$message = $this->request->data;
				}
			}
			$this->set(['status'=>$status,
						'message'=>$message,
						'_serialize'=>['status','message']]);
        }
		$this->layout = 'modal';
        $this->set(compact('type'));
    }
	
	public function Logo($front = null)
	{
		if( file_exists(Configure::read('Company.logo')) ) 
		{
			$this->response->file(Configure::read('Company.logo'));
		}
		else
		{
			if($front)
			{
				$this->response->file(Configure::read('Interface.transparent'));
			}
			else
			{
				$this->response->file(Configure::read('Interface.no_img'));
			}
		}
		return $this->response;
	}
	
	public function Banner($front = null)
	{
		if( file_exists(Configure::read('Company.banner')) ) 
		{
			$this->response->file(Configure::read('Company.banner'));
		}
		else
		{
			if($front)
			{
				$this->response->file(Configure::read('Interface.transparent'));
			}
			else
			{
				$this->response->file(Configure::read('Interface.no_img'));
			}
		}
		return $this->response;
	}
	
	public function information()
	{
		$company = new CompanyForm();
		if($this->request->is('post'))
		{
			if ($company->execute($this->request->data))
			{
				$status = 'OK';
				$message = 'Company information has been saved';
			}
			else
			{
				$status = 'error';
				$message = 'Company information could not be saved right now. please try after a few moments';
			}
			$this->set(['status'=>$status,
						'message'=>$message,
						'_serialize'=>['status','message']]);
		}
	}
}

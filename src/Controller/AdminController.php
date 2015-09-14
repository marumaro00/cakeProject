<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
/**
 * Admin Controller
 *
 * @property \App\Model\Table\AdminTable $Admin
 */
class AdminController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
		$session = $this->request->session();
	}
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add', 'logout']);
	}
    /**
     * Index method
     *
     * @return void
     */
	public function content()
	{
		$admin = $this->Admin->find('all', [
			'contain' => ['AdminProfile'
							=> ['fields'=>['firstname','lastname','email']],
						'Designation'
							=>['fields'=>['name']]],
			'fields' => ['id','username','designation_id','created','modified','status']
		]);
		$this->set(['data'=> $admin,
					'_serialize'=>['data']]);
	}
    public function index($portlet = null)
    {
		if($portlet)
		{
			$this->layout = false;
		}
		$admin = $this->Admin->find('all', [
				'contain' => ['AdminProfile','Designation']
			]);
		$designation = $this->Admin->Designation->find('all', ['limit' => 200]);
		foreach ($designation as $data)
		{
			$position[] = ['value'=>$data->id,'text'=>$data->name];
		}
        $this->set(compact('admin', 'position', 'status'));
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($modal = null)
    {
        $admin = $this->Admin->newEntity();
		if($modal)
		{
			$this->layout = 'modal';
		}
		
        if ($this->request->is('post')) {
            $admin = $this->Admin->patchEntity($admin, $this->request->data,['associated' =>['AdminProfile']]);
            if ($this->Admin->save($admin)) {
				$status = 'OK';
				$message = 'New User Has Been Saved';
            } else {
				$status = 'error';
				$message = 'New User could not be added. Please try again';
            }
            $this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		else
		{
			$designation = $this->Admin->Designation->find('list', ['limit' => 200]);
			$status = array('active'=>'active','inactive'=>'inactive','deleted'=>'deleted');
       		$this->set(compact('admin', 'designation'));
			$this->set(compact('admin', 'status'));
		}
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	public function edit($id = null,$modal=null){
		if($modal)
		{
			$this->layout = 'modal';
		}
		if ($this->request->is(['patch', 'post', 'put']))
		{
			if(isset($this->request->data['pk']))
			{
				$id=$this->request->data['pk'];
				$data = [$this->request->data['name'] => $this->request->data['value']];	
			}
			else
			{
				$data = $this->request->data;
			}
			$admin = $this->Admin->get($id, [
				'contain' => ['AdminProfile','Designation']
			]);
			$designation = $this->Admin->patchEntity($admin, $data);
			if ($this->Admin->save($admin)) {
				$status = 'OK';
				$message = 'changes to the user has been saved';
			} else {
				$status = 'error';
				$message = 'changes to the user could not be saved. Please, try again.';
			}
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
			
		}

		$admin = $this->Admin->get($id, [
            'contain' => ['AdminProfile','Designation']
        ]);
		$designation = $this->Admin->Designation->find('list', ['limit' => 200]);
		$state = array('active'=>'active','inactive'=>'inactive','deleted'=>'deleted');
        $this->set(compact('admin', 'designation'));
		$this->set(compact('admin', 'state'));
		
		
	}
    public function profile($id = null)
    {
        $admin = $this->Admin->get($id, [
            'contain' => 'AdminProfile'
        ]);
		$exists = Configure::read('image');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admin = $this->Admin->patchEntity($admin, $this->request->data);
            if ($this->Admin->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The admin could not be saved. Please, try again.'));
            }
        }
        $designation = $this->Admin->Designation->find('list', ['limit' => 200]);
		$status = array('active'=>'active','inactive'=>'inactive','deleted'=>'deleted');
		$this->set(compact('admin', 'status','exists', 'designation'));
        $this->set('_serialize', ['admin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admin->get($id,[
			'contain'=>['AdminProfile','Designation']]);
        if ($this->Admin->delete($admin,['associated' =>['AdminProfile']])) {
            $this->set('message','User has been deleted');
        } else {
            $this->set('message','User could not be deleted. Please, try again');
        }
		$this->set('_serialize', ['message']);
    }
	
	public function login()
	{
		
		$this->layout = Configure::read('Layout.login');
		if ($this->request->is('post') && $this->request->is('ajax')) 
		{
			$this->set('message','Invalid username or password, try again');
			$admin = $this->Auth->identify();
			if ($admin)
			{
				$this->Auth->setUser($admin);
				$this->set('url',Router::url($this->Auth->redirectUrl()));
				$this->set('message','Successfully Logged In');
				$profile = $this->Admin->get($this->Auth->user('id'),
							['contain' => ['AdminProfile']]);
				$role = $this->Admin->Designation->get($this->Auth->user('designation_id'))->toArray();
				$session = $this->request->session();
				$fullname = $profile['admin_profile']['firstname'] . " " . $profile['admin_profile']['lastname'];
				$session->write('User.fullname', $fullname);
				$session->write('User.role', $role['name']);
				$session->write('User.id', $this->Auth->User('id'));
			}
			
			$this->set('_serialize', ['message','url']);
		}
	}
	public function logout()
	{
		$session = $this->request->session();
		$session->destroy();
		return $this->redirect($this->Auth->logout());
	}
}

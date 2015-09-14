<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Designation Controller
 *
 * @property \App\Model\Table\DesignationTable $Designation
 */
class DesignationController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
    /**
     * Index method
     *
     * @return void
     */
    public function index($portlet=null)
    {
		$this->layout='table';
		if($portlet)
		{
			$this->layout = false;
		}
		$designation = $this->Designation->find('all');
		$this->set(compact('designation'));
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($modal = null)
    {
		if($modal)
		{
			$this->layout = 'modal';
		}
        $designation = $this->Designation->newEntity();
        if ($this->request->is('post')) {
			$this->layout = false;
            $designation = $this->Designation->patchEntity($designation, $this->request->data);
            if ($this->Designation->save($designation)) {
                $status = 'OK';
				$message = 'New Designation Has Been Saved';
            } else {
				$status = 'error';
				$message = 'New Designation could not be added. Please try again';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		$this->set('designation');
			
        
    }
	
    /**
     * Edit method
     *
     * @param string|null $id Designation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null,$modal=null)
    {
		if($modal)
		{
			$this->layout = 'modal';
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
			if(isset($this->request->data['pk']))
			{
				$id=$this->request->data['pk'];
				$data = [$this->request->data['name'] => $this->request->data['value']];	
			}
			else
			{
				$data = $this->request->data;
			}
			$designation = $this->Designation->get($id, [
					'contain' => []
				]);
            $designation = $this->Designation->patchEntity($designation, $data);
            if ($this->Designation->save($designation)) {
				$status = 'OK';
				$message = 'changes to the designation has been saved';
            } else {
				$status = 'error';
				$message = 'changes to the designation could not be saved. Please, try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		$designation = $this->Designation->get($id, [
			'contain' => []
		]);
		$this->set(compact('designation'));		
    }

    /**
     * Delete method
     *
     * @param string|null $id Designation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $designation = $this->Designation->get($id);
        if ($this->Designation->delete($designation)) {
            $status = 'OK';
			$message = 'Designation has been deleted permanently.';
        } else {
            $status = 'error';
			$message = 'Designation could not be deleted at the moment. Please, try again.';
        }
		$this->set(['status' => $status, 
					'message' => $message,	
					'_serialize' => ['status','message'] ]);
    }
	
	public function content()
	{
		$designation = $this->Designation->find('all');
		$this->set(['data'=>$designation,
					'_serialize'=>['data']]);
	}
}

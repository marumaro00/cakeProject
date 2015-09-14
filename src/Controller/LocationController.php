<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Location Controller
 *
 * @property \App\Model\Table\LocationTable $Location
 */
class LocationController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
	public function content()
	{
		$location = $this->Location->find('all');
		$this->set(['data' => $location,
					'_serialize' => ['data']]);
	}
    /**
     * Index method
     *
     * @return void
     */
    public function index($portlet = null)
    {
        $this->layout = 'table';
        if($portlet)
        {
            $this->layout = false;
        }
        $this->set('location', $this->Location->find('all'));
        $this->set(compact('location'));
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
        $location = $this->Location->newEntity();
        if ($this->request->is('post')) {
            $location = $this->Location->patchEntity($location, $this->request->data);
            if ($this->Location->save($location)) {
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
		$this->set(compact('location'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $modal = null)
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
			$location = $this->Location->get($id, [
				'contain' => []
			]);
            $location = $this->Location->patchEntity($location, $data);
            if ($this->Location->save($location)) {
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
		$location = $this->Location->get($id, [
			'contain' => []
		]);
        $this->set(compact('location'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $location = $this->Location->get($id);
        if ($this->Location->delete($location)) {
            $this->set('message','designation has been deleted');
        } else {
            $this->set('message','designation could not be deleted. Please, try again');
        }
        $this->set('_serialize', ['message']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Unit Controller
 *
 * @property \App\Model\Table\UnitTable $Unit
 */
class UnitController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
	
	public function content()
	{
		$unit = $this->Unit->find('all',
			['contain' => ['UnitType']]);
		$this->set(['data' => $unit,
					'_serialize' => ['data']]);
	}
    /**
     * Index method
     *
     * @return void
     */
    public function index($portlet = null)
    {
        $this->layout='table';
        if($portlet)
        {
            $this->layout = false;
        }
		$unit = $this->Unit->UnitType->find('all');
		foreach($unit as $data)
		{
			$type[] = ['value'=>$data->id,'text'=>$data->name];
		}
        $this->set(compact('type'));
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
        $unit = $this->Unit->newEntity();
        if ($this->request->is('post')) {
            $unit = $this->Unit->patchEntity($unit, $this->request->data);
            if ($this->Unit->save($unit)) {
                $status = 'OK';
                $message = 'New Unit of Measurement Has Been Saved';
            } else {
				$status = 'error';
                $message = 'New Unit of Measurement could not be added. Please try again';
            }
            $this->set(['status' => $status, 
                        'message' => $message,  
                        '_serialize' => ['status','message'] ]);
        }
		$type = $this->Unit->UnitType->find('list');
		$this->set(compact('unit','type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Unit id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $modal = null)
    {
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
			$unit = $this->Unit->get($id, [
				'contain' => []
			]);
            $unit = $this->Unit->patchEntity($unit, $data);
            if ($this->Unit->save($unit)) {
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
		$unit = $this->Unit->get($id, [
            'contain' => []
        ]);
		$type = $this->Unit->UnitType->find('list');
        $this->set(compact('unit','type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Unit id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unit = $this->Unit->get($id);
        if ($this->Unit->delete($unit)) {
            $this->set('message','measurement unit has been deleted');
        } else {
            $this->set('message','measurement unit could not be deleted. Please, try again');
        }
        $this->set('_serialize', ['message']);
    }
}

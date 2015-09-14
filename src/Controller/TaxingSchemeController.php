<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaxingScheme Controller
 *
 * @property \App\Model\Table\TaxingSchemeTable $TaxingScheme
 */
class TaxingSchemeController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	public function content()
	{
		$scheme = $this->TaxingScheme->find('all');
		$this->set(['data'=>$scheme,
					'_serialize'=>['data']]);
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
        $this->set('taxingScheme', $this->TaxingScheme->find('all'));
        $this->set('_serialize', ['taxingScheme']);
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
        $taxingScheme = $this->TaxingScheme->newEntity();
        if ($this->request->is('post')) {
            $taxingScheme = $this->TaxingScheme->patchEntity($taxingScheme, $this->request->data);
            if ($this->TaxingScheme->save($taxingScheme)) {
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
        $this->set(compact('taxingScheme'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Taxing Scheme id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null,$modal = null)
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
            $taxingScheme = $this->TaxingScheme->get($id, [
                'contain' => []
            ]);
            $taxingScheme = $this->TaxingScheme->patchEntity($taxingScheme, $data);
            if ($this->TaxingScheme->save($taxingScheme)) {
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
		$taxingScheme = $this->TaxingScheme->get($id, [
            'contain' => []
        ]);
        $this->set(compact('taxingScheme'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Taxing Scheme id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $taxingScheme = $this->TaxingScheme->get($id);
        if ($this->TaxingScheme->delete($taxingScheme)) {
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
}

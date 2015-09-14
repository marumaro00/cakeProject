<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Supplier Controller
 *
 * @property \App\Model\Table\SupplierTable $Supplier
 */
class SupplierController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	
	public function data($id = null)
	{
		$supplier = $this->Supplier->find('all',
			['contain' => ['SupplierDetail','Item']]);
		if( isset($id) )
		{
			$supplier->where(['id'=>$id]);
		}
		$this->set(['data' => $supplier,
					'_serialize' => ['data']]);
	}
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$supplier = $this->Supplier->find('all', [
				'contain' => ['SupplierDetail']
			]);
        $this->set(compact('supplier', $supplier));
        //$this->set('_serialize', ['supplier']);
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
        $supplier = $this->Supplier->newEntity();
        if ($this->request->is('post'))
		{
            $supplier = $this->Supplier->patchEntity($supplier, $this->request->data,['associated' =>['SupplierDetail','Item']]);
            if ($this->Supplier->save($supplier)) {
                $status = 'OK';
				$message = 'A New Supplier Has Been Saved!';
            } else {
                $status = 'error';
				$message = 'A New Supplier could not be save! Please try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		
		$detail = $this->Supplier->SupplierDetail->find('list', ['limit' => 200]);
		$item = $this->Supplier->Item->find('list', ['limit' => 200]);
		$this->set(compact('supplier', 'detail'));
		$this->set(compact('supplier', 'item'));
		$this->set(compact('supplier','modal'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
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
			$supplier = $this->Supplier->get($id, [
				'contain' => ['SupplierDetail','Item']
			]);
            $supplier = $this->Supplier->patchEntity($supplier, $data);
            if ($this->Supplier->save($supplier)) {
                $status = 'OK';
				$message = 'Changes to the Supplier has been Saved';
            } else {
                $status = 'error';
				$message = 'changes to the designation could not be saved. Please, try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		$supplier = $this->Supplier->get($id, [
            'contain' => ['SupplierDetail','Item']
        ]);
        $item = $this->Supplier->Item->find('list', ['limit' => 200]);
        $this->set(compact('supplier', 'item'));
		$this->set(compact('supplier', 'modal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $supplier = $this->Supplier->get($id);
        if ($this->Supplier->delete($supplier)) {
			$this->set('message','designation has been deleted');
        } else {
            $this->set('message','designation could not be deleted. Please, try again');
        }
        $this->set('_serialize', ['message']);
    }
	
	public function items()
	{
		$supplier = $this->Supplier->Item->find('all',
					['contain'=>['Supplier','ItemCategory','ItemType']]);
		$this->set(['data' => $supplier,
					'_serialize' => ['data']]);
	}
}

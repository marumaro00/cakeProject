<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupplierItem Controller
 *
 * @property \App\Model\Table\SupplierItemTable $SupplierItem
 */
class SupplierItemController extends AppController
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
    public function index()
    {
		$relation = $this->SupplierItem->find('all',
			['contain' => [
				'Supplier'=>['SupplierDetail'], 
				'Item' =>['ItemCategory','ItemType','Unit']]])
			->where(['status <>' => 3]);
		$this->set(['data' => $relation,
					'_serialize' => ['data']]);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierItem = $this->SupplierItem->get($id, [
            'contain' => ['Supplier', 'Item']
        ]);
        $this->set('supplierItem', $supplierItem);
        $this->set('_serialize', ['supplierItem']);
    }
	
    /**
     * Delete method
     *
     * @param string|null $id Supplier Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($supplier = null, $item = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		if( isset($supplier) && isset($item))
		{
			$supplierItem = $this->SupplierItem->get([$supplier,$item]);
			$supplierItem->status = 3;
			if ($this->SupplierItem->save($supplierItem)) {
                $status = 'OK';
				$message = 'Item-Supplier Has Been deleted';
            } else {
				$status = 'error';
				$message = 'Item-Supplier could not be deleted. Please try again';
            }
		}
        
        $this->set(['status' => $status,
					'message' => $message,
					'_serialize' => ['status','message']]);
    }
	
	public function supplier($id = null)
	{
		$relation = $this->SupplierItem->find('all',
			['contain' => [
				'Supplier'=>['SupplierDetail'], 
				'Item']]);
		if( isset($id) )
		{
			//$relation->where(['supplier_id' => $id]);
		}
		else{
			$relation->where(['status <>' => 3]);
		}
		$this->set(['data' => $relation,
					'_serialize' => ['data']]);
	}
	
	public function item($id = null)
	{
		$relation = $this->SupplierItem->find('all',
			['contain' => [
				'Supplier', 
				'Item'=>['ItemCategory','ItemType','Unit']]])
			->where(['status <>' => 3]);
		if( isset($item) )
		{
			$relation->where(['item_id' => $id]);
		}
		$this->set(['data' => $relation,
					'_serialize' => ['data']]);
	}
}

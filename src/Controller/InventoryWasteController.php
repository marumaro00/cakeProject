<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InventoryWaste Controller
 *
 * @property \App\Model\Table\InventoryWasteTable $InventoryWaste
 */
class InventoryWasteController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	public function data()
	{
		$waste = $this->InventoryWaste->find('all',
					['contain'=>['InventoryWasteType','Item' =>['Unit']]]);
		$this->set(['data' => $waste,
					'_serialize' => ['data']]);
	}
	
	public function unit($id)
	{
		$items = $this->InventoryWaste->Item->find('all',
					['contain' => ['Unit']])
				->select(['item.id','unit.id','unit.name','unit.code'])
				->where(['item.id'=>$id]);
		$this->set(['item' => $items,
					'_serialize' => ['item']]);
	}
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Item']
        ];
        $this->set('inventoryWaste', $this->paginate($this->InventoryWaste));
        $this->set('_serialize', ['inventoryWaste']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		
		$this->layout = 'modal';
        $inventoryWaste = $this->InventoryWaste->newEntity();
        if ($this->request->is('post')) {
            $inventoryWaste = $this->InventoryWaste->patchEntity($inventoryWaste, $this->request->data);
            if ($this->InventoryWaste->save($inventoryWaste)) {
                $status = 'OK';
				$message = 'Stock Waste has been added';
            } else {
                $status = 'error';
				$message = 'Data could not be saved. please try again later';
            }
			$this->set(['status' => $status,
						'message' => $message,
						'_serialize' => ['status','message']]);
        }
        $item = $this->InventoryWaste->Item->find('list', ['limit' => 200]);
		$waste = $this->InventoryWaste->InventoryWasteType->find('list');
		$unit = $this->InventoryWaste->Item->find('all')->select(['id','code','store_unit']);
        $this->set(compact('inventoryWaste', 'item', 'waste','unit'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory Waste id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventoryWaste = $this->InventoryWaste->get($id);
        if ($this->InventoryWaste->delete($inventoryWaste)) {
            $this->Flash->success(__('The inventory waste has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory waste could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

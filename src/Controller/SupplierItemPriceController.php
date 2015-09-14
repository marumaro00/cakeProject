<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupplierItemPrice Controller
 *
 * @property \App\Model\Table\SupplierItemPriceTable $SupplierItemPrice
 */
class SupplierItemPriceController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	
	public function itemPrice($supplier,$item)
	{
		$prices = $this->SupplierItemPrice->find('all')
					->where(['supplier_id' => $supplier,
							 'item_id' => $item]);
		$this->set(['data'=>$prices,
					'_serialize' => ['data']]);
	}
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Item', 'Supplier']
        ];
        $this->set('supplierItemPrice', $this->paginate($this->SupplierItemPrice));
        $this->set('_serialize', ['supplierItemPrice']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Item Price id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierItemPrice = $this->SupplierItemPrice->get($id, [
            'contain' => ['Item', 'Supplier']
        ]);
        $this->set('supplierItemPrice', $supplierItemPrice);
        $this->set('_serialize', ['supplierItemPrice']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($supplier,$item)
    {
        $supplierItemPrice = $this->SupplierItemPrice->newEntity();
        if ($this->request->is('post')) {
            $supplierItemPrice = $this->SupplierItemPrice->patchEntity($supplierItemPrice, $this->request->data);
            if ($this->SupplierItemPrice->save($supplierItemPrice)) {
                $this->Flash->success(__('The supplier item price has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier item price could not be saved. Please, try again.'));
            }
        }
        $item = $this->SupplierItemPrice->Item->find('list', ['limit' => 200]);
        $supplier = $this->SupplierItemPrice->Supplier->find('list', ['limit' => 200]);
        $this->set(compact('supplierItemPrice', 'item', 'supplier'));
        $this->set('_serialize', ['supplierItemPrice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Item Price id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplierItemPrice = $this->SupplierItemPrice->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierItemPrice = $this->SupplierItemPrice->patchEntity($supplierItemPrice, $this->request->data);
            if ($this->SupplierItemPrice->save($supplierItemPrice)) {
                $this->Flash->success(__('The supplier item price has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier item price could not be saved. Please, try again.'));
            }
        }
        $item = $this->SupplierItemPrice->Item->find('list', ['limit' => 200]);
        $supplier = $this->SupplierItemPrice->Supplier->find('list', ['limit' => 200]);
        $this->set(compact('supplierItemPrice', 'item', 'supplier'));
        $this->set('_serialize', ['supplierItemPrice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Item Price id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierItemPrice = $this->SupplierItemPrice->get($id);
        if ($this->SupplierItemPrice->delete($supplierItemPrice)) {
            $this->Flash->success(__('The supplier item price has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier item price could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

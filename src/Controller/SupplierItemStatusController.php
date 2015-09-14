<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupplierItemStatus Controller
 *
 * @property \App\Model\Table\SupplierItemStatusTable $SupplierItemStatus
 */
class SupplierItemStatusController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('supplierItemStatus', $this->paginate($this->SupplierItemStatus));
        $this->set('_serialize', ['supplierItemStatus']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Item Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierItemStatus = $this->SupplierItemStatus->get($id, [
            'contain' => []
        ]);
        $this->set('supplierItemStatus', $supplierItemStatus);
        $this->set('_serialize', ['supplierItemStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplierItemStatus = $this->SupplierItemStatus->newEntity();
        if ($this->request->is('post')) {
            $supplierItemStatus = $this->SupplierItemStatus->patchEntity($supplierItemStatus, $this->request->data);
            if ($this->SupplierItemStatus->save($supplierItemStatus)) {
                $this->Flash->success(__('The supplier item status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier item status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplierItemStatus'));
        $this->set('_serialize', ['supplierItemStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Item Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplierItemStatus = $this->SupplierItemStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierItemStatus = $this->SupplierItemStatus->patchEntity($supplierItemStatus, $this->request->data);
            if ($this->SupplierItemStatus->save($supplierItemStatus)) {
                $this->Flash->success(__('The supplier item status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier item status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplierItemStatus'));
        $this->set('_serialize', ['supplierItemStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Item Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierItemStatus = $this->SupplierItemStatus->get($id);
        if ($this->SupplierItemStatus->delete($supplierItemStatus)) {
            $this->Flash->success(__('The supplier item status has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier item status could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

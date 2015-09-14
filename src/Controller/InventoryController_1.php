<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Inventory Controller
 *
 * @property \App\Model\Table\InventoryTable $Inventory
 */
class InventoryController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
		
	public function data()
	{
		$ranged_query = $this->Inventory->find('all')
						->select(
							['item_id','reference_date'])
						->where(function ($exp){
							return $exp->between('reference_date', 
												( isset($this->request->query['from']) && !empty($this->request->query['from'])) ? $this->request->query['from'] . ' 00:00:00' : '0000-00-00', //lower bound
												( isset($this->request->query['to']) && !empty($this->request->query['to'])) ? $this->request->query['to'] . ' 23:59:59' : '9999-12-31'); //upper bound
							});
		$subquery = $ranged_query->find('all')
						->select(
							['item_id' => 'item_id',
							'reference_date' => $this->Inventory->find()->func()->max('reference_date')])
						->group('item_id');
		$inventory = $this->Inventory
					->find('all',
						['contain' => ['Item' => ['Unit','ItemPoint'], 'Location']])
					->innerJoin(
						['t2'=>$subquery],
						['t2.item_id = inventory.item_id',
						't2.reference_date = inventory.reference_date']);
        $this->set(['data'=>$inventory,
					'_serialize'=>['data']]);
	}
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$subquery = $this->Inventory->find('list')
						->select(
							['item_id' => 'item_id',
							'reference_date' => $this->Inventory->find()->func()->max('reference_date')])
						->group('item_id');
		$inventory = $this->Inventory
					->find('all',
						['contain' => ['Item' => ['Unit','ItemPoint'], 'Location']])
					->innerJoin(
						['t2'=>$subquery],
						['t2.item_id = inventory.item_id',
						't2.reference_date = inventory.reference_date']);
        $this->set(compact('inventory'));
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventory = $this->Inventory->newEntity();
        if ($this->request->is('post')) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->data);
            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $item = $this->Inventory->Item->find('list', ['limit' => 200]);
        $location = $this->Inventory->Location->find('list', ['limit' => 200]);
        $unit = $this->Inventory->Unit->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'item', 'location', 'unit'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function records($id = null)
    {
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventory->get($id);
        if ($this->Inventory->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function adjust($id = null, $modal = null)
    {
		if($modal)
		{
			$this->layout = 'modal';
		}
        $inventory = $this->Inventory->newEntity();
		$item = $this->Inventory->Item->get($id, ['contain'=>['Unit'],'limit' => 200]);
		if(isset($id))
		{
			$inventory->item_id = $id;
		}
		$inventory->unit_id = $item->store_unit;
        if ($this->request->is('post')) {
			
            if ($this->Inventory->query()
								->insert(['item_id','reference_date','quantity','unit_id'])
								->values(['item_id' => $id,
										  'reference_date' => null,
										  'quantity' => $this->request->data['quantity'],
										  'unit_id' => $item['unit']['id']
										  ])
								->execute()) 
			{
				$this->loadModel('InventoryHistory');
			
				if($this->InventoryHistory->current( $id, $this->request->data['quantity']))
				{
					$status = 'OK';
					$message = 'Adjustments Has Been Saved!';
				}
                
            } else {
                $status = 'error';
				$message = 'Adjustments could not be save! Please try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		if(isset($id))
		{
			$inventory = $this->Inventory->find('all',['contain'=>['Item']])
										->where(['item_id' => $id])
										->order(['reference_date' => 'desc'])
										->first();
		}
		$inventory->isNew(true);
		
        
        $location = $this->Inventory->Location->find('list', ['limit' => 200]);
        $unit = $this->Inventory->Item->Unit->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'item', 'location', 'unit', 'modal','has_selection'));
    }
}

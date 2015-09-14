<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemCategory Controller
 *
 * @property \App\Model\Table\ItemCategoryTable $ItemCategory
 */
class ItemCategoryController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	
	public function content()
	{
		$category = $this->ItemCategory->find('all');
		$this->set(['data'=>$category,
					'_serialize'=>['data']]);
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
        $this->paginate = [
            'contain' => ['ParentItemCategory']
        ];
        $this->set('itemCategory', $this->paginate($this->ItemCategory));
        $this->set('_serialize', ['itemCategory']);
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
        $itemCategory = $this->ItemCategory->newEntity();
		$parentItemCategory = $this->ItemCategory->ParentItemCategory->find('list', ['limit' => 200])->toArray();
        if ($this->request->is('post')) {
            $itemCategory = $this->ItemCategory->patchEntity($itemCategory, $this->request->data);
            if ($this->ItemCategory->save($itemCategory)) {
                $status = 'OK';
				$message = 'New Category Has Been Saved';
            } else {
                $status = 'error';
				$message = 'New Category could not be added. Please try again';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message']]);
        }

        $this->set(compact('itemCategory', 'parentItemCategory'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Category id.
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
			$itemCategory = $this->ItemCategory->get($id, [
				'contain' => []
			]);
            $itemCategory = $this->ItemCategory->patchEntity($itemCategory, $data);
            if ($this->ItemCategory->save($itemCategory)) {
				$status = 'OK';
				$message = 'changes to the Category has been saved';
            } else {
                $status = 'error';
				$message = 'changes to the Category could not be saved. Please, try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		$parentItemCategory = $this->ItemCategory->ParentItemCategory->find('list', ['limit' => 200]);
		$itemCategory = $this->ItemCategory->get($id, [
			'contain' => []
		]);
		$this->set(compact('itemCategory', 'parentItemCategory'));			
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemCategory = $this->ItemCategory->get($id);
        if ($this->ItemCategory->delete($itemCategory)) {
            $status = 'OK';
			$message = 'Category has been deleted permanently.';
        } else {
            $status = 'error';
			$message = 'Designation could not be deleted at the moment. Please, try again.';
        }
        $this->set(['status' => $status, 
					'message' => $message,	
					'_serialize' => ['status','message'] ]);
    }
}

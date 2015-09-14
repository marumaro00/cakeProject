<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * AdminImage Controller
 *
 * @property \App\Model\Table\AdminImageTable $AdminImage
 */
class AdminImageController extends AppController
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
        $this->paginate = [
            'contain' => ['Admin']
        ];
        $this->set('adminImage', $this->paginate($this->AdminImage));
        $this->set('_serialize', ['adminImage']);
    }

    /**
     * View method
     *
     * @param string|null $id Admin Image id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adminImage = $this->AdminImage->find('all', [
            'contain' => [],
			'conditions' => ['admin_id' => $id]
        ])->first();
		if( (isset($adminImage)) && (file_exists($adminImage->file_path)) )
		{
			$this->response->file($adminImage->file_path);
		}
		else
		{
			$this->response->file(Configure::read('User.no_img'));
		}
		return $this->response;
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		$this->layout = 'modal';
        $adminImage = $this->AdminImage->newEntity();
        if ($this->request->is('post')) {
			/**
			* Request Data Fields
			* name, type, tmp_name, error, size
			*/
			$path = Configure::read('User.path') . $this->request->data['user'];
			$data = ['admin_id' => $this->request->data['user'],
						'directory' => $path,
						'file_size' => $this->request->data['file']['size'],
						'file_path' => $path . DS . $this->request->data['file']['name'],
						'name' => $this->request->data['file']['name'],
						'file_type' => $this->request->data['file']['type']
						];
			$adminImage = $this->AdminImage->patchEntity($adminImage, $data);
			if ($this->AdminImage->save($adminImage))
			{
				$this->AdminImage->uploadFile($path,$this->request->data['file']);
			}
            $this->set(['data' =>'successfully uploaded',
						//,
						'_serialize' => ['data']]);
        }
        $admin = $this->AdminImage->Admin->find('list', ['limit' => 200]);
        $this->set(compact('adminImage', 'admin', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin Image id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adminImage = $this->AdminImage->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adminImage = $this->AdminImage->patchEntity($adminImage, $this->request->data);
            if ($this->AdminImage->save($adminImage)) {
                $this->Flash->success(__('The admin image has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The admin image could not be saved. Please, try again.'));
            }
        }
        $admin = $this->AdminImage->Admin->find('list', ['limit' => 200]);
        $this->set(compact('adminImage', 'admin'));
        $this->set('_serialize', ['adminImage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin Image id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adminImage = $this->AdminImage->get($id);
        if ($this->AdminImage->delete($adminImage)) {
            $this->Flash->success(__('The admin image has been deleted.'));
        } else {
            $this->Flash->error(__('The admin image could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

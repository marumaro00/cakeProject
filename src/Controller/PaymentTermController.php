<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentTerm Controller
 *
 * @property \App\Model\Table\PaymentTermTable $PaymentTerm
 */
class PaymentTermController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	
	public function content()
	{
		$payment_term = $this->PaymentTerm->find('all');
		$this->set(['data'=>$payment_term,
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
        $this->set('paymentTerm', $this->PaymentTerm->find('all'));
		$this->set(compact('paymentTerm'));
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
        $paymentTerm = $this->PaymentTerm->newEntity();
        if ($this->request->is('post')) {
            $paymentTerm = $this->PaymentTerm->patchEntity($paymentTerm, $this->request->data);
            if ($this->PaymentTerm->save($paymentTerm)) {
                $status = 'OK';
				$message = 'New Payment Term Has Been Saved';
            } else {
                $status = 'error';
				$message = 'New Payment Term could not be added. Please try again';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		$this->set('paymentTerm');
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Term id.
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
			$paymentTerm = $this->PaymentTerm->get($id, [
            'contain' => []
			]);
            $paymentTerm = $this->PaymentTerm->patchEntity($paymentTerm, $data);
            if ($this->PaymentTerm->save($paymentTerm)) {
                $status = 'OK';
				$message = 'changes to the Payment Term has been saved';
            } else {
                $status = 'error';
				$message = 'changes to the Payment could not be saved. Please, try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		$paymentTerm = $this->PaymentTerm->get($id, [
			'contain' => []
		]);
		$this->set(compact('paymentTerm'));
		
		
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Term id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentTerm = $this->PaymentTerm->get($id);
        if ($this->PaymentTerm->delete($paymentTerm)) {
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

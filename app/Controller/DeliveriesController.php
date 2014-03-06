<?php
App::uses('AppController', 'Controller');
/**
 * Deliveries Controller
 *
 * @property Delivery $Delivery
 * @property PaginatorComponent $Paginator
 */
class DeliveriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Delivery->recursive = 0;
		$this->set('deliveries', $this->Paginator->paginate());
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			

			$this->Delivery->create();




			$data = array('Delivery' => array(
						'date' => $this->request->data['Delivery']['date'],
						'user_id' => $this->Session->read('Auth.User.id'),
						'hour_id' => $this->request->data['Delivery']['hour'],
					)
			);

			if ($this->Delivery->save($this->request->data)) {

				$id_delivery = $this->Delivery->id;
				$order = $this->Delivery->Order->find('first',				
																array(
																	'conditions' => 
																	array(
																		'Order.user_id' => $this->Session->read('Auth.User.id')
																	),
																	'fields'	=> array('id')
															));
				$this->Delivery->Order->create();

				$data = array('Order' => array(
												'delivery_id' 	=> $id_delivery,
												'id'			=> $order['Order']['id']
											)
				);
				$this->Delivery->saveField('order_id', $this->Delivery->Order->id);
				$this->Delivery->Order->save($data);
				$this->Session->setFlash(__('Votre commande à bien été enregistrée'));
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));

			} 

			else {
				$this->Session->setFlash(__('The delivery could not be saved. Please, try again.'));
			}
		}


		$hours = $this->Delivery->Hour->find('list');
		//debug($hours);
		$this->set(compact('hours'));

	}


############# ADMIN ###############

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin


		$this->Delivery->recursive = 0;
		$this->set('deliveries', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin


		if (!$this->Delivery->exists($id)) {
			throw new NotFoundException(__('Invalid delivery'));
		}
		$options = array('conditions' => array('Delivery.' . $this->Delivery->primaryKey => $id));
		$this->set('delivery', $this->Delivery->find('first', $options));

		$users = $this->Delivery->find('list',
												array(
														'conditions' => array(
																				'id' => $id,
																				)
													));
		$this->set(compact('users'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin


		if ($this->request->is('post')) {
			$this->Delivery->create();
			if ($this->Delivery->save($this->request->data)) {
				$this->Session->setFlash(__('The delivery has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery could not be saved. Please, try again.'));
			}
		}
		$orders = $this->Delivery->Order->find('list');
		$this->set(compact('orders'));

		$users = $this->Delivery->User->find('list');
		$this->set(compact('users'));	


	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin



		if (!$this->Delivery->exists($id)) {
			throw new NotFoundException(__('Invalid delivery'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Delivery->save($this->request->data)) {
				$this->Session->setFlash(__('The delivery has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Delivery.' . $this->Delivery->primaryKey => $id));
			$this->request->data = $this->Delivery->find('first', $options);
		}
		$orders = $this->Delivery->Order->find('list');
		$this->set(compact('orders'));


		$users = $this->Delivery->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin


		
		$this->Delivery->id = $id;
		if (!$this->Delivery->exists()) {
			throw new NotFoundException(__('Invalid delivery'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Delivery->delete()) {
			$this->Session->setFlash(__('The delivery has been deleted.'));
		} else {
			$this->Session->setFlash(__('The delivery could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}

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

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
	}

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


	public function admin_add_bac($delivery_id = null) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin

		// On lie les livraisons aux bacs
	    $this->Delivery->bindModel(
	        array('hasMany' => array(
	                'BacDelivery' => array(
	                    'className' => 'BacDelivery'
	                )
	            )
	        )
	    );

		// On récupère les bacs liés
	    $bacs = $this->Delivery->BacDelivery->find('list',
	    							array(
	    								'fields' => 'BacDelivery.bac_id', 
	    								'conditions' => array(
	    														'BacDelivery.delivery_id' => $delivery_id

	    									)
	    								)
	    );

	    // On les envoeis à la vue
		$this->set(compact('bacs'));

		// Si on ajoute un bac
		if ($this->request->is('post')) {

			debug($this->request->data);

		    $this->Delivery->bindModel(
		        array('hasMany' => array(
		                'Bac' => array(
		                    'className' => 'Bac',
		                )
		            )
		        )
		    );
			$bac = $this->Delivery->Bac->find('first', 
												array('fields' => 'code','conditions' => array(
																				'code' => $this->request->data['Bac']['code']
																			))
										);
			
			// Si le bac existe
			if(!empty($bac)){
				$bac_id = $bac['Bac']['id'];
			    $this->Delivery->bindModel(
									        array(
									        	'hasMany' => array(
								                					'BacDelivery' => array(
									                   									 'className' => 'BacDelivery',
									                )
									            )
									        )
			    );
				// On insert la liaison
				$this->Delivery->BacDelivery->create();

				$data = array(
									'BacDelivery' => array(
													'bac_id' => $bac_id,
													'delivery_id' => $delivery_id,

												)
								);



				$this->Delivery->BacDelivery->save($data);

			}
	

		}



	}

	public function admin_delete_bac($bac_id = null, $delivery_id = null) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin


		// On vérifie que la liaison $bac_id $delivery_id existe, 
							//si elle est présente, on la supprime

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
	}


}

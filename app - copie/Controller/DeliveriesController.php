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
		debug($this->Delivery->find('all'));
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

		$this->Paginator->settings = array(
		        'conditions' => array('Delivery.delivery_id' => NULL),
		    );
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



		//--> On lie l'utilisateur correspondant à la livraison
	   	$users = $this->Delivery->unbindModel(
	        array(
	        	'belongsTo' => array('Order')
	            )
	        );
	    

		// On récupère les infos de la
		$delivery = $this->Delivery->findById($id);
		//debug($q);
		$this->set(compact('delivery'));

	    $bacs = $this->Delivery->findAllById($id);
	    $bacs = $bacs[0]['Bac'];
		// On les envoeis à la vue
		$this->set(compact('bacs'));
		$this->set(compact('id'));

	    // on cherche son email
		$user = $this->Delivery->User->find('first',
												array(
														'conditions' => array(
																				'User.id' => $delivery['Delivery']['user_id'],
																				),
														'fields' => array('email'),
													));
		// On l'envoie à la vue
		$this->set(compact('user'));


		//--> Si il y à une livraison différé
		$is_return = $this->Delivery->find('first', array(
													'conditions' => array(
																			'Delivery.delivery_id' => $id)
													)
		);
		if(!empty($is_return)){
			$options = array('conditions' => array('Delivery.id' => $is_return['Delivery']['id']));

			$this->set('delivery_return', $this->Delivery->find('first', $options));

		}
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


			$data = array(
				'Delivery' => array(		
									'id' => $id,
									'user_id' => $this->request->data['Delivery']['user_id'],
									'order_id' => $this->request->data['Delivery']['order_id'],
									'date' => $this->request->data['Delivery']['date'],
							),
				'DeliveryReturn' => array(
							'date' => $this->request->data['DeliveryReturn']['date'],
							),
				);



			if ($this->Delivery->save($data)) {
				$this->Session->setFlash(__('The delivery has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Delivery.' . $this->Delivery->primaryKey => $id));
			$this->request->data = $this->Delivery->find('first', $options);
		}
		$orders = $this->Delivery->Order->find('list');
		$this->set(compact('orders'));


		//--> On lie l'utilisateur correspondant à la livraison
	   	$users = $this->Delivery->bindModel(
	        array('belongsTo' => array(
	                'User' => array(
	                    'className' => 'User',
	                    'fields' => array('email'),
	                )
	            )
	        )
	    );
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



	public function admin_add_bac($delivery_id = null) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin


		// On récupère les bacs liés
	    $bacs = $this->Delivery->findAllById($delivery_id);
	    $bacs = $bacs[0]['Bac'];
		// On les envoeis à la vue
		$this->set(compact('bacs'));

	    $this->set(compact('delivery_id'));

	    

		// Si on ajoute un bac
		if ($this->request->is('post')) {

		    $bac = $this->Delivery->Bac->findByCode($this->request->data['Bac']['code']);
		    if(!empty($bac)){

		    	$exist = $this->Delivery->BacR->findByBacIdAndDeliveryId($bac['Bac']['id'], $delivery_id);
		    	if(empty($exist)){
			    	$this->Delivery->BacR->create();


			    	$this->Delivery->BacR->save(array(
										    			'delivery_id' => $delivery_id,
										    			'bac_id' => $bac['Bac']['id']
										      		)
					      						);

			    	$this->Session->setFlash('Bac correctement associé');
					$this->redirect(array('controller' => 'deliveries', 'action' => 'add_bac', $delivery_id, 'admin' => true));

			    }
			    else{
			    	$this->Session->setFlash('Bac déjà associé');
			    }

		    }
		    else {
		    	echo "erreur";

		    }


		}



	}

	public function admin_delete_bac($delivery_id = null, $bac_id = null) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin



		$bac = $this->Delivery->BacR->findByBacIdAndDeliveryId($bac_id, $delivery_id);



		if(!empty($bac)){

			$data = array(
						'bac_id' => $bac_id, 
						'delivery_id' => $delivery_id
						);

			if($this->Delivery->BacR->delete($bac['BacR']['id'])){

				$this->Session->setFlash('Bac dissocié');
				$this->redirect(array('controller' => 'deliveries', 'action' => 'add_bac', $delivery_id, 'admin' => true));
			}
			else {
				$this->Session->setFlash('Erreur');
				$this->redirect(array('controller' => 'deliveries', 'action' => 'add_bac', $delivery_id, 'admin' => true));

			}

		}
		else {
			$this->Session->setFlash('Bac non associé');

		}

	}
}

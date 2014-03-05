<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

	// Autorisation
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


// Liste des commandes utilisateur 
		public function index() {

			// On demande toutes les commandes utilisateurs
			$orders = $this->Order->findAllByUserIdAndState($this->Session->read('Auth.User.id'), '1');


			if(!empty($orders)){

				// Si on a des commandes on liste les commandes
				$this->set(compact('orders'));
			}
			else {
				$this->Session->setFlash('Aucune commande');
			}


			//echo $livraison[0]['Deliveries'][0]['user_id'];
		}

		// Editer une commande 
		public function edit($order_id) {
			$order_edit = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'Order.id' => $order_id, 
						'user_id' => $this->Session->read('Auth.User.id')
					) 
				) 
			);

			if(!empty($order_edit)){

				// On traite le formulaire
				if(!empty($this->request->data)){
					$this->Order->id = $order_id;

					if($this->Order->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées');

						$this->Order->save(array(
							'nb_bacs'				=> $this->request->data['Orders']['nb_bacs'],
						));
					}
				}

				// On affiche les données
				$order = $this->Order->find('first',
					array(
							'conditions' =>
							array(
									'Order.id' => $order_id,
									'user_id' => $this->Session->read('Auth.User.id')
								)

						)
					);
					$this->set(compact('order'));
			}
			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}

		// Passer une commande
		public function add() {


			
			// Si le formulaire à été soumis
			if(!empty($this->request->data)){
				// On valide les données
				if($this->Order->validates()){

					$this->Order->create();

					$data_order = array(
						"Order" =>
									array(
									'user_id'		=> $this->Session->read('Auth.User.id'),
									'nb_bacs'		=> $this->request->data['Order']['nb_bacs'],
									'state'			=> 1
									),
					);

					// Si la commande à bien été enregistré, on ajoute les livraisons associées
					if($this->Order->save($data_order)) {
						$data_delivery = array("Delivery" =>
															array(
															'order_id'		=> $this->Order->id,
															'nb_bacs'		=> $this->request->data['Order']['nb_bacs'],
															'state'			=> 1
															)
											);
						$this->Order->Delivery->save($data_delivery);



							// Envoie de l'email de notification
							App::uses('CakeEmail', 'Network/Email');

							$CakeEmail = new CakeEmail('default');
							$CakeEmail->to('corentingc@gmail.com');
							$CakeEmail->subject('Dezordre: Nouvelle commande');
							$CakeEmail->emailFormat('text');
							$CakeEmail->template('order');
							$CakeEmail->send();


						$this->Session->setFlash('Commande enregistrée');
					}
				}
			}
			

			// Si c'est la première commande, on propose d'enregistrer une nouvelle adresse

		}

		// Anuler une commande 
		public function cancel($order_id) {

			$order_edit = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'id' 		=> $order_id, 
						'user_id' 	=> $this->Session->read('Auth.User.id'),
						'state'		=> 1
					) 
				) 
			);

			// Si le bac existe et qu'il appartient bien à l'utilisateur
			if(!empty($order_edit)){
					$this->Order->id = $order_id; // On associe l'id du bac à l'objet 

					// On valide les champs envoyés
					if($this->Order->validates() ){


						$this->Session->setFlash('Commande annulé');

						// On enregistre les données
						$this->Order->save(array(
							'state' 	=> 0,
						));
						return $this->redirect(array('controller' => 'orders', 'action' => 'index'));

					}
			}
			else {
				throw new NotFoundException;
			}
		//
		}


		// ####### PANEL ADMIN ########
	public function admin_index() {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin

		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
		
		$users = $this->Order->User->find('list');
		$this->set(compact('users'));

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

		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));


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
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
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



		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$users = $this->Order->User->find('list');
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

		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('The order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}

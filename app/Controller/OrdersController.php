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
			}


		}

		public function view($order_id) {
			$order_edit = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'Order.id' => $order_id, 
						'Order.user_id' => $this->Session->read('Auth.User.id')
					) 
				) 
			);

			if(!empty($order_edit)){
				$order = $this->Order->find('first',
					array(
							'conditions' =>
							array(
									'Order.id' => $order_id,
									'Order.user_id' => $this->Session->read('Auth.User.id')
								)

						)
					);
				
				$this->set(compact('order'));


			    $this->Order->bindModel(
			        array('hasOne' => array(
			                'Delivery' => array(
			                    'className' => 'Delivery'
			                )
			            )
			        )
			    );
				$delivery = $this->Order->find('all',
													array(
															'conditions' =>
															array(
																	'Delivery.order_id' => $order_id,
																	'Order.user_id' => $this->Session->read('Auth.User.id')
																)

														)
													);
				$this->set(compact('delivery'));


			}


			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}



		// Editer une commande 
		public function edit($order_id) {
			$order = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'Order.id' => $order_id, 
						'Order.user_id' => $this->Session->read('Auth.User.id')
					) 
				) 
			);


			debug($order);

			if(!empty($order)){

				// On traite le formulaire
				if(!empty($this->request->data)){
					$this->Order->id = $order_id;

					if($this->Order->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées');

						/*$data_order = array(
											"Order" =>
														array(
														'user_id'		=> $this->Session->read('Auth.User.id'),
														'nb_bacs'		=> $this->request->data['Order']['nb_bacs'],
														'hour_id'		=> 	$this->request->data['Order']['hours'],
														'state'			=> 1
														),
											"Address" =>
														array(
															'city_id'			=> $this->request->data['Order']['cities'],
															'postal_id'			=> $this->request->data['Order']['postals'],
															'firstname'			=> $this->request->data['Address'][0]['firstname'],
															'lastname'			=> $this->request->data['Address'][0]['lastname'],
															'street'			=> $this->request->data['Address'][0]['street'],
															'digicode'			=> $this->request->data['Address'][0]['digicode'],
															'floor'			=> $this->request->data['Address'][0]['floor'],
															'comment'			=> $this->request->data['Address'][0]['comment'],
															)
						);*/
					}
				}


				$this->set(compact('order'));
			}
			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}

		// Passer une commande
		public function add() {	
		$this->layout = false; // Layout admin

			// Si le client à déjà une commande en cours
			$order = $this->Order->find('count',
												array('conditions' => array(
																			'Order.delivery_id =' 	=> NULL,
																			'Order.user_id' 	=> $this->Session->read('Auth.User.id')

													)
												));


			// On récupère les villes
		    $this->Order->bindModel(
		        array('hasMany' => array(
		                'City' => array(
		                    'className' => 'City'
		                )
		            )
		        )
		    );			
		    $cities = $this->Order->City->find('list');
			$this->set(compact('cities'));

			// On récupère les codes postaux
		    $this->Order->bindModel(
		        array('hasMany' => array(
		                'Postal' => array(
		                    'className' => 'Postal'
		                )
		            )
		        )
		    );			
			$postals = $this->Order->Postal->find('list');
			$this->set(compact('postals'));

			// On récupère les horaires
		    $this->Order->bindModel(
		        array('hasMany' => array(
		                'Hour' => array(
		                    'className' => 'Hour'
		                )
		            )
		        )
		    );
			$hours = $this->Order->Hour->find('list');
			$this->set(compact('hours'));


			// Si le formulaire à été soumis
			if(!empty($this->request->data)){


				debug($this->request->data);

				// On valide les données
				if($this->Order->validates()){



					$this->Order->create();

					if($this->request->data['Order']['withdraw'] == 2){
						$data_order = array(
											"Order" =>
														array(
														'user_id'		=> $this->Session->read('Auth.User.id'),
														'nb_bacs'		=> $this->request->data['Order']['nb_bacs'],
														
														'hour_deposit'		=> 	$this->request->data['Order']['hours'],
														'hour_withdrawal'	=> 	$this->request->data['Order']['hours'],

														'date_deposit'		=> 	$this->request->data['Order']['date_deposit'],
														'date_withdrawal'		=> 	$this->request->data['Order']['date_withdrawal'],

														'state'			=> 1
														),
											"Address" =>
														array(
															'user_id'			=> $this->Session->read('Auth.User.id'),
															'city_id'			=> $this->request->data['Order']['cities'],
															'postal_id'			=> $this->request->data['Order']['postals'],
															'firstname'			=> $this->request->data['Address'][0]['firstname'],
															'lastname'			=> $this->request->data['Address'][0]['lastname'],
															'street'			=> $this->request->data['Address'][0]['street'],
															'digicode'			=> $this->request->data['Address'][0]['digicode'],
															'floor'			=> $this->request->data['Address'][0]['floor'],
															'comment'			=> $this->request->data['Address'][0]['comment'],
															)
						);


					}else {
						$data_order = array(
											"Order" =>
														array(
														'user_id'		=> $this->Session->read('Auth.User.id'),
														'nb_bacs'		=> $this->request->data['Order']['nb_bacs'],

														'hour_deposit'		=> 	$this->request->data['Order']['hours'],
														'hour_withdrawal'	=> 	$this->request->data['Order']['hours'],

														'date_deposit'		=> 	$this->request->data['Order']['date_deposit'],
														'date_withdrawal'		=> '0000-00-00',

														'state'			=> 1
														),
											"Address" =>
														array(
															'user_id'			=> $this->Session->read('Auth.User.id'),
															'city_id'			=> $this->request->data['Order']['cities'],
															'postal_id'			=> $this->request->data['Order']['postals'],
															'firstname'			=> $this->request->data['Address'][0]['firstname'],
															'lastname'			=> $this->request->data['Address'][0]['lastname'],
															'street'			=> $this->request->data['Address'][0]['street'],
															'digicode'			=> $this->request->data['Address'][0]['digicode'],
															'floor'			=> $this->request->data['Address'][0]['floor'],
															'comment'			=> $this->request->data['Address'][0]['comment'],
															)
						);
					}

					// Si la commande à bien été enregistré, on ajoute les livraisons associées
					if($this->Order->saveAssociated($data_order)) {
						
							$this->Order->saveField('address_id', $this->Order->Address->id);

							// Envoie de l'email de notification
							App::uses('CakeEmail', 'Network/Email');

							$CakeEmail = new CakeEmail('default');
							$CakeEmail->to('corentingc@gmail.com');
							$CakeEmail->subject('Dezordre: Nouvelle commande');
							$CakeEmail->emailFormat('text');
							$CakeEmail->template('order');
							$CakeEmail->send();

							echo "Reussi";

					}
					else {

						echo " fail";
					}

				}
			}


			// On compte le nombre de commande de l'utilisateur
			$nb_orders = $this->Order->find('count',
				array(
						'conditions' => array(
												'Order.user_id' => $this->Session->read('Auth.User.id'),

						)
				)
			);


			if(empty($nb_orders)){
				// On récupère les villes
				$cities = $this->Order->City->find('list');
				$this->set(compact('cities'));

				// On récupère les codes postaux
				$postals = $this->Order->Postal->find('list');
				$this->set(compact('postals'));
			}



		}



		// Anuler une commande 
		public function cancel($order_id) {

			$order_edit = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'Order.id' 		=> $order_id, 
						'Order.user_id' 	=> $this->Session->read('Auth.User.id'),
						'state'		=> 1
					) 
				) 
			);

			// Si le bac existe et qu'il appartient bien à l'utilisateur
			if(!empty($order_edit)){
				$this->Order->id = $order_id; // On associe l'id de la commande

				$this->Session->setFlash('Commande annulé');

				// On enregistre les données
				$this->Order->save(array(
					'state' 	=> 0,
				));
				return $this->redirect(array('controller' => 'orders', 'action' => 'index'));
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

		$this->Paginator->settings = array('conditions' => 
														array('state' => 1

										));


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



	public function admin_confirm($order_id) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin


		$order_edit = $this->Order->find('first', 
			array(
				'conditions' => 
				array(
					'Order.id' => $order_id, 
				) 
			) 
		);

		if(!empty($order_id)){


			$this->Order->create();
			$data = array(
							'Order' => array(
										'id' => $order_id, 
										'state' => 2
										)
					);

			$this->Order->save($data);

			// On associe au livraisons pour l'enregistrement
		    $this->Order->bindModel(
		        array('hasMany' => array(
		                'Delivery' => array(
		                    'className' => 'Delivery',
		                    'foreignKey' => 'order_id'
		                )
		            )
		        ), false
		    );

			$this->Order->Delivery->create();


			$delivery = array(
								'Delivery' => array(
												'order_id' => $order_id,
												'date' => $order_edit['Order']['date_deposit'],
												'user_id' => $order_edit['Order']['user_id'],
												'address_id' => $order_edit['Order']['address_id'],
												'hour_id' => $order_edit['Order']['hour_deposit'],

											)
							);

			$this->Order->Delivery->save($delivery);

			if($order_edit['Order']['date_withdrawal'] != '0000-00-00 00:00:00') {
				$delivery_deposit = $this->Order->Delivery->id;
				$this->Order->Delivery->create();
				$delivery = array(
									'Delivery' => array(
													'delivery_id' => $delivery_deposit,
													'order_id' => $order_id,
													'date' => $order_edit['Order']['date_withdrawal'],
													'user_id' => $order_edit['Order']['user_id'],
													'address_id' => $order_edit['Order']['address_id'],
													'hour_id' => $order_edit['Order']['hour_withdrawal'],
												)
								);

				$this->Order->Delivery->save($delivery);


			}


		   // debug($this->Order->find('all'));


			return $this->redirect(array('controller' => 'orders', 'action' => 'index', 'admin' => true));
		}


		// sinon erreur 404
		else {
			throw new NotFoundException;
		}
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

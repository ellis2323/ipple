<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Model','Hour');
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
		

		}

		/* ETAPE DE COMMANDE DES BACS */

		// Commande : Etape 1
		public function step1() {

			### LIAISONS ###
			// On récupères les données relatives à la commande et on les passe à la vue

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


			### FIN LIAISON ###

			// Si des données ont été postées
			if(!empty($this->request->data)){
				$data = $this->request->data;
				$this->Order->set($data);

				// Si les données sont validées
				if($this->Order->validates()){
					// On transforme les données pour les passer au controller
					$data = base64_encode(serialize($this->request->data));
					//debug($data);
					$this->redirect(array('controller'=> 'orders','action' => 'step2', $data));
				}


			}
			else {

			}
		}

		// Commande : Etape 2
		public function step2($data_get = null) {
			// Si des données on été passé
			if(!empty($data_get)){
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


				// On récupères le tableau en forme
				$data_get = unserialize(base64_decode($data_get) );
				//debug($data_get);

				// Si on poste des données
				if(!empty($this->request->data)){	
					$data_post = $this->request->data;
					$this->Order->set($data_post);

					// Si les données sont validées
					if($this->Order->validates()){
						// On transforme les données pour les passer au controller

						// On assemble les tableau de données
						$data_full = $data_get + $data_post;
						//debug($data_full);

						// On convertis les données avant de les envoyer
						$data = base64_encode(serialize($data_full));

						$this->redirect(array('controller'=> 'orders','action' => 'step3', $data) );
					}
				}
			}
			else {
				$this->redirect(array('controller'=> 'orders','action' => 'step1'));
			}
		}

		// Commande : Etape 3
		public function step3($data_get = null) {
			// On récupère les créneaux horaires
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
			// Si des données on été passé

			if(!empty($data_get)){

				// On récupères le tableau en forme
				$data_get = unserialize(base64_decode($data_get) );
				//debug($data_get);

				// Si on poste des données
				if(!empty($this->request->data)){	
					$data_post = $this->request->data;
					$this->Order->set($data_post);

					// Si les données sont validées
					if($this->Order->validates()){
						// On transforme les données pour les passer au controller
						$data = base64_encode(serialize($this->request->data));

						// On récupères les données transmises en post et en get
						$data_post_order = $data_post['Order'];
						$data_get_order = $data_get['Order'];

						// On assemble les tableaux
						$data_order = array_merge($data_post_order, $data_get_order);
						// On redéfinis l'index des informations de la commande
						$data_order = array('Order' => $data_order);

						// On redéfinis l'index des informations de l'adresse
						$data_address = array('Address' => $data_get['Address']);

						$data_full = $data_order + $data_address;


						//Si tout est ok, on enregistre les données
						/*#######################*/
						$this->Order->create();

						$format = 'Y-m-d H:i:s';

						$deposit = new DateTime($data_full['Order']['date_deposit']);
						

						// Si on fait un retrait différé
						if($data_full['Order']['withdraw'] == 2) {
							$withdrawal = new DateTime($data_full['Order']['date_withdrawal']);
							$withdrawal->format($format);

							$data_order = array(
												"Order" =>
															array(
															'user_id'				=> $this->Session->read('Auth.User.id'),
															'nb_bacs'				=> $data_full['Order']['nb_bacs'],
															'date_deposit'			=> $deposit->format($format),
															'hour_deposit'			=> 1,
															'state_deposit'			=> 1,
															'date_withdrawal'		=> $withdrawal->format($format),
															'hour_withdrawal'		=> 1,
															'state_withdrawal'		=> 1,
															'state'					=> 1
															),
												"Address" =>
															array(
																'user_id'			=> $this->Session->read('Auth.User.id'),
																'city_id'			=> $data_full['Order']['cities'],
																'postal_id'			=> $data_full['Address'][0]['postals'],
																'firstname'			=> $data_full['Address'][0]['firstname'],
																'lastname'			=> $data_full['Address'][0]['lastname'],
																'street'			=> $data_full['Address'][0]['street'],
																'digicode'			=> $data_full['Address'][0]['digicode'],
																'floor'				=> $data_full['Address'][0]['floor'],
																'comment'			=> $data_full['Address'][0]['comment'],
																'state'				=> 1
																),
												"Address" =>
															array(
																'user_id'			=> $this->Session->read('Auth.User.id'),
																'city_id'			=> $data_full['Order']['cities'],
																'postal_id'			=> $data_full['Address'][0]['postals'],
																'firstname'			=> $data_full['Address'][0]['firstname'],
																'lastname'			=> $data_full['Address'][0]['lastname'],
																'street'			=> $data_full['Address'][0]['street'],
																'digicode'			=> $data_full['Address'][0]['digicode'],
																'floor'				=> $data_full['Address'][0]['floor'],
																'comment'			=> $data_full['Address'][0]['comment'],
																'state'				=> 2
																)
							);


						}

						// sinon retrait immédiat
						else {
							$data_order = array(
												"Order" =>
															array(
															'user_id'			=> $this->Session->read('Auth.User.id'),
															'nb_bacs'			=> $data_full['Order']['nb_bacs'],
															'hour_deposit'		=> 1,
															'date_deposit'		=> $deposit->format($format),
															'state'				=> 1
															),
												"Address" =>
															array(
																'user_id'			=> $this->Session->read('Auth.User.id'),
																'city_id'			=> $data_full['Order']['cities'],
																'postal_id'			=> $data_full['Address'][0]['postals'],
																'firstname'			=> $data_full['Address'][0]['firstname'],
																'lastname'			=> $data_full['Address'][0]['lastname'],
																'street'			=> $data_full['Address'][0]['street'],
																'digicode'			=> $data_full['Address'][0]['digicode'],
																'floor'				=> $data_full['Address'][0]['floor'],
																'comment'			=> $data_full['Address'][0]['comment'],
																)
							);
						}
						
						// Si la commande à bien été enregistré, on ajoute les livraisons associées
						if($this->Order->saveAssociated($data_order)) {
								
								$this->Order->saveField('address_id', $this->Order->Address->id);

								// Envoie de l'email de notification
								

								$CakeEmail = new CakeEmail('default');
								$CakeEmail->to('rpietra@gmail.com');
								$CakeEmail->subject('Dezordre: Commande #'.$this->Order->id);
								$CakeEmail->emailFormat('text');
								$CakeEmail->template('order');
								//$CakeEmail->send();
								if(true){
									$this->Session->setFlash('La commande à bien été enregistrée');
									$this->redirect(array('controller' => 'users', 'action' => 'my_bacs'));
								}
								else {
									$this->Session->setFlash('Erreur lors de l\'envoi de l\'email');
								}

						}
						else {

    						debug($this->validationErrors);
							$this->Session->setFlash('Erreur lors de la sauvegarde.');
						}

					} // Validates
					else {
						$this->Session->setFlash('Erreur de validation');
					}

				} // Empty request data
			}
			else {
				$this->redirect(array('controller'=> 'orders','action' => 'step1'));
			}
		} 

		/* FIN COMMANDE DES BACS */

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

/*
			    $this->User->bindModel(
			        array('hasOne' => 
			        	array(
			                'City' => array(
			                    'className' => 'City'
			                )
			            )
			        )
			    );
				$city = $this->City->find('first',
													array(
															'conditions' =>
															array(
																	'id' =>
																)

														)
													);
				$this->set(compact('city'));
*/

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


			// Si la commande existe et qu'elle appartient bien à l'user
			if(!empty($order)){

				// On traite le formulaire
				if(!empty($this->request->data)){

					// Si les données sont validées
					if($this->Order->validates() ){



						$data_order = array(
											"Order" =>
														array(
														'id' 			=> $order_id,
														'user_id'		=> $this->Session->read('Auth.User.id'),
														'nb_bacs'		=> $this->request->data['Order']['nb_bacs'],
														'hour_deposit'		=> 	$this->request->data['Order']['hours'],
														'state'			=> 1
														),
											"Address" =>
														array(
															'id'				=> $order['Order']['address_id'],
															'city_id'			=> $this->request->data['Order']['cities'],
															'postal_id'			=> $this->request->data['Order']['postals'],
															'firstname'			=> $this->request->data['Address'][0]['firstname'],
															'lastname'			=> $this->request->data['Address'][0]['lastname'],
															'street'			=> $this->request->data['Address'][0]['street'],
															'digicode'			=> $this->request->data['Address'][0]['digicode'],
															'floor'				=> $this->request->data['Address'][0]['floor'],
															'comment'			=> $this->request->data['Address'][0]['comment'],
															'phone'			=> $this->request->data['Address'][0]['phone'],
															)
						);

						if($this->Order->saveAssociated($data_order)){
							$this->Session->setFlash('Données correctement sauvegardées');
							$this->redirect(array('action' => 'edit', $order_id));
						}
					}
				}


				// On récupère les villes
			    $cities = $this->Order->Address->City->find('list');
				$this->set(compact('cities'));

				// On récupère les codes postaux
			
				$postals = $this->Order->Address->Postal->find('list');
				$this->set(compact('postals'));
		

			    
				$hours = new Hour();
				$hours = $hours->find('list');
				$this->set(compact('hours'));

				$this->set(compact('order'));
			}
			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}

		// Passer une commande
		public function add() {	

			// Si le client à déjà une commande en cours
			$order = $this->Order->findByUserId($this->Session->read('Auth.User.id'));

			$order = $this->Order->find('count',
												array('conditions' => array(
																			'Order.user_id' 	=> $this->Session->read('Auth.User.id')

													)
												));

			### LIAISONS ###
			// On récupères les données relatives à la commande et on les passe à la vue

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

			// On récupère les créneaux horaires
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

			### FIN LIAISON ###



			// Si le formulaire à été soumis
			if(!empty($this->request->data)){				
				// On valide les données
				if($this->Order->validates()){

					$this->Order->create();



					if($this->request->data['Order']['withdraw'] == 2){
						

						$data_order = array(
											"Order" =>
														array(
														'user_id'		=> $this->Session->read('Auth.User.id'),
														'nb_bacs'		=> $this->request->data['Order']['nb_bacs'],

														'date_deposit'		=> 	$this->request->data['Order']['date_deposit'],
														'hour_deposit'		=> 	1,

														'date_withdrawal'		=> 	$date_withdrawal,
														'hour_withdrawal'	=> 	1,

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

					else {

						$data_order = array(
											"Order" =>
														array(
														'user_id'			=> $this->Session->read('Auth.User.id'),
														'nb_bacs'			=> $this->request->data['Order']['nb_bacs'],
														'hour_deposit'		=> 	1,
														'date_deposit'		=> 	$this->request->data['Order']['date_deposit'],
														'state'				=> 1
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
															'floor'				=> $this->request->data['Address'][0]['floor'],
															'comment'			=> $this->request->data['Address'][0]['comment'],
															)
						);
					}

					// Si la commande à bien été enregistré, on ajoute les livraisons associées
					if($this->Order->saveAssociated($data_order)) {
							
							$this->Order->saveField('address_id', $this->Order->Address->id);

							// Envoie de l'email de notification

							$CakeEmail = new CakeEmail('default');
							$CakeEmail->to('rpietra@gmail.com');
							$CakeEmail->subject('Dezordre: Commande #'.$this->Order->id);
							$CakeEmail->emailFormat('text');
							$CakeEmail->template('order');
							$CakeEmail->send();

							$this->redirect(array('controller' => 'users', 'action' => 'my_bacs'));

					}
					else {
						$this->Session->setFlash('Erreur lors de la sauvegarde.');
					}

				}
				else {
					//debug($this->Order->invalidFields()); die();
					$this->Session->setFlash('Veuillez corriger les champs comprenant des erreurs');
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

		$this->Order->recursive = 0;

		$this->Paginator->settings = array('conditions' => 
														array('state >=' => 1

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
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$users = $this->Order->User->find('list', array('fields' => 'email'));
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



			$this->Order->Delivery->create();


			$delivery = array(
								'Delivery' => array(
												'order_id' => $order_id,
												'date' => $order_edit['Order']['date_deposit'],
												'user_id' => $order_edit['Order']['user_id'],
												'address_id' => $order_edit['Order']['address_id'],
												'hour_id' => $order_edit['Order']['hour_deposit'],
												'state'		=> 1,

											)
							);

			$this->Order->Delivery->save($delivery);

			if($order_edit['Order']['date_withdrawal'] != NULL) {
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


	public function admin_add_bac($order_id = null) {
		// On récupère les bacs liés
	    $bacs = $this->Order->findAllById($order_id);
	    $bacs = $bacs[0]['Bac'];
		// On les envoeis à la vue
		$this->set(compact('bacs'));

	    $this->set(compact('order_id'));

	    

		// Si on ajoute un bac
		if ($this->request->is('post')) {

		    $bac = $this->Order->Bac->findByCode($this->request->data['Bac']['code']);
		    if(!empty($bac)){

		    	$exist = $this->Order->BacR->findByBacIdAndOrderId($bac['Bac']['id'], $order_id);
		    	if(empty($exist)){
			    	$this->Order->BacR->create();


			    	$this->Order->BacR->save(array(
										    			'order_id' => $order_id,
										    			'bac_id' => $bac['Bac']['id']
										      		)
					      						);

			    	$this->Session->setFlash('Bac correctement associé');
					$this->redirect(array('controller' => 'orders', 'action' => 'add_bac', $order_id, 'admin' => true));

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

	public function admin_delete_bac($order_id = null, $bac_id = null) {

		$bac = $this->Order->BacR->findByBacIdAndOrderId($bac_id, $order_id);



		if(!empty($bac)){

			$data = array(
						'bac_id' => $bac_id, 
						'order_id' => $order_id
						);

			if($this->Order->BacR->delete($bac['BacR']['id'])){

				$this->Session->setFlash('Bac dissocié');
				$this->redirect(array('controller' => 'orders', 'action' => 'add_bac', $order_id, 'admin' => true));
			}
			else {
				$this->Session->setFlash('Erreur');
				$this->redirect(array('controller' => 'orders', 'action' => 'add_bac', $order_id, 'admin' => true));

			}

		}
		else {
			$this->Session->setFlash('Bac non associé');

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

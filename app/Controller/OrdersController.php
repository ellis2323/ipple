<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Model','Hour');
App::import('Model','City');
App::import('Model','Param');
App::import('Model', 'Postal');
App::import('Model', 'Address');
App::import('Model', 'User');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {


/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	// Autorisation
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
	}

    public function beforeRender() {
        parent::beforeRender();
        $params = $this->Session->read('form.params');
        $this->set('params', $params);
    }


    public function index() {

    	debug($this->Order->find('all'));

    }




		/* ETAPE DE COMMANDE DES BACS */

		// Commande : Etape 1
		public function step1() {

			### LIAISONS ###
			// On récupères les données relatives à la commande et on les passe à la vue

			// On récupère les villes
			$cities = new City();
			$this->set('cities', $cities->find('list'));


			### FIN LIAISON ###

			$param = new Param();

			$price_bac = $param->findByKey('price_bac_monthly');
			$price_bac = $price_bac['Param']['value'];
			$this->set(compact('price_bac'));

			$nb_bac_min = $param->findByKey('nb_bac_min');
			$nb_bac_min = $nb_bac_min['Param']['value'];
			$this->set(compact('nb_bac_min'));

			$nb_bac_max = $param->findByKey('nb_bac_max');
			$nb_bac_max = $nb_bac_max['Param']['value'];
			$this->set(compact('nb_bac_max'));
			
			// Si des données ont été postées
			if(!empty($this->request->data)){
				$data = $this->request->data;
				$this->Order->set($data);

				$address = new Address();
				$address->set($data);
	


				// Si les données sont validées
				if($this->Order->validates() && $address->validates()){
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


				if(empty($this->request->data)){
					// Si l'utilisateur à déjà une adresse enregistrée
					$address_user = new Address();
					$data_user = $address_user->find('first', array(
															'conditions' => array(
																					'user_id' => $this->Session->read('Auth.User.id'),
															),
															'order'		=> array(
																					'Address.created' => 'desc',
															),
															'recursive'	=> -1

					));

					// les données de la bdd
					if($data_user){
						$data_address[0] = $data_user['Address'];
						$this->set('data_user', $data_address);
					}
				}
				// les données du formulaire
				else {

					$var[0] = $this->request->data['Address'];
					$var[0]['postal_id'] = $this->request->data['Address']['postals'];

					$this->set('data_user', $var);
				}


				// On récupère les créneaux horaires
			   	$hours = new Hour();
			    $this->set('hdeposits', $hours->find('list'));

				// On récupère les codes postaux
			   	$postals = new Postal();
			    $this->set('postals', $postals->find('list'));

				// On récupères le tableau en forme
				$data_get = unserialize(base64_decode($data_get) );
				//debug($data_get);

				// Si on poste des données
				if(!empty($this->request->data)){	
					//$address = new Address();

					$data_post = $this->request->data;

					$this->Order->set($data_post);

					$r = $this->Order->validates() ;

					// Si les données sont validées
					if($r){
						debug($data_get);
						$address = new Address();
						//debug($this->request->data);
						$this->request->data['Address']['postal_id'] = $this->request->data['Address']['postals'];
						$this->request->data['Address']['city_id'] = $data_get['Order']['cities'];

						if($address->save($this->request->data) ){
							$address->saveField('user_id', $this->Session->read('Auth.User.id'));

							$address_id = $address->id;

							$data = array(
								'Order' => array(
										'cities' => $data_get['Order']['cities'],
										'nb_bacs' => $data_get['Order']['nb_bacs'],
										'date_deposit' => $this->request->data['Order']['date_deposit'],
										'hour_deposit' => $this->request->data['Order']['hdeposits'],
										'concierge_deposit' => $this->request->data['Order']['concierge_deposit'],
								),
								'Id' => $address_id,

							);
							// On convertis les données avant de les envoyer
							$data = base64_encode(serialize($data));

							$this->redirect(array('controller'=> 'orders','action' => 'step3', $data) );
							

						}
						else { 

							$this->Session->setFlash('Erreur lors de l\'enregistrement, merci de corriger vos erreurs', 'alert', array('class' => 'danger'));
						}

						
					}
					else {

						$this->Session->setFlash('Erreur lors de l\'enregistrement, merci de corriger vos erreurs', 'alert', array('class' => 'danger'));
					}
				}
			}
			else {
				$this->redirect(array('controller'=> 'orders','action' => 'step1'));
			}
		}

		// Commande : Etape 3
		public function step3($data_get = null) {
			$this->set('lol', 0);
			// On récupère les créneaux horaires
		   	$hours = new Hour();

			$this->set('hwithdrawals', $hours->find('list'));

			// Si des données on été passé
			if(!empty($data_get)){

				// On récupères le tableau en forme
				$data_get = unserialize(base64_decode($data_get) );
				$date_deposit = $data_get['Order']['date_deposit'];

				$this->set('minDate', $date_deposit);
				
				$address_id = $data_get['Id'];

				$concierge_deposit = $data_get['Order']['concierge_deposit'];
				$this->set(compact('concierge_deposit'));

				$split_date=explode("/",$date_deposit);
				$this->set(compact('split_date'));


				// Si on poste des données
				if(!empty($this->request->data)){	
					$this->set('lol', 1);

					$data_post = $this->request->data;



					$this->Order->set($data_post);


					// Si les données sont validées
					if($this->Order->validates() ){
						// On transforme les données pour les passer au controller
						$data = base64_encode(serialize($this->request->data));

						// On récupères les données transmises en post et en get
						$data_post_order = $data_post['Order'];
						$data_get_order = $data_get['Order'];

						// On assemble les tableaux
						$data_order = array_merge($data_post_order, $data_get_order);
						// On redéfinis l'index des informations de la commande
						$data_order = array('Order' => $data_order);


						$data_full = $data_order;

						//Si tout est ok, on enregistre les données
						/*#######################*/
						$this->Order->create();

						$format = 'Y-m-d H:i:s';

						$deposit = new DateTime($data_order['Order']['date_deposit']);

						// Si on fait un retrait différé
						if($data_full['Order']['withdraw'] == 2) {
							$withdrawal = new DateTime($data_full['Order']['date_withdrawal']);
							$withdrawal->format($format);

							$data_order = array(
												"Order" =>
															array(
															'user_id'					=> $this->Session->read('Auth.User.id'),
															'nb_bacs'					=> $data_full['Order']['nb_bacs'],
															'date_deposit'				=> $data_full['Order']['date_deposit'],
															'hour_deposit'				=> $data_full['Order']['hour_deposit'],
															'state_deposit'				=> 0,
															'concierge_deposit'			=> $data_full['Order']['concierge_deposit'],
															'date_withdrawal'			=> $data_full['Order']['date_withdrawal'],
															'hour_withdrawal'			=> $this->request->data['Order']['hwithdrawals'],
															'state_withdrawal'			=> 1,
															'concierge_withdrawal'		=> $this->request->data['Order']['concierge_withdrawal'],
															'state'						=> 1,
															
															),

							);

						}

						// sinon retrait immédiat
						else {
							$data_order = array(
												"Order" =>
															array(
															'user_id'			=> $this->Session->read('Auth.User.id'),
															'nb_bacs'			=> $data_full['Order']['nb_bacs'],
															'hour_deposit'		=> $data_full['Order']['hour_deposit'],
															'date_deposit'		=> $deposit->format($format),
															'state_deposit'		=> 0,
															'state_withdrawal'	=> 0,
															'state'				=> 1,
															),

							);
						}

						if(!empty($data_full['Order']['cgv'])){
							$data_user = 	array(		
												"User"	=> 
													array(
															'id'			=> $this->Session->read('Auth.User.id'),
															'rules'			=> $data_full['Order']['cgv'],
													),
										);

							

							$this->Order->saveAll($data_user);
							$this->Session->write('Auth.User.rules', $data_full['Order']['cgv']);

						}
						
						// Si la commande à bien été enregistré, on ajoute les livraisons associées
						if($this->Order->saveAll($data_order)) {
								
								$this->Order->saveField('address_id', $address_id);

								// Envoie de l'email de notification

								$CakeEmail = new CakeEmail('default');
								$CakeEmail->to('rpietra@gmail.com');
								$CakeEmail->subject('Dezordre: Commande #'.$this->Order->id);
								$CakeEmail->emailFormat('text');
								$CakeEmail->template('order');
								//$CakeEmail->send();

								$this->Session->setFlash('La commande à bien été enregistrée', 'alert', array('class' => 'success') );
								$this->redirect(array('controller' => 'users', 'action' => 'my_account#livraisons'));

						}
						else {
    						//debug($this->Order->invalidFields());
							$this->Session->setFlash('Erreur lors de la sauvegarde.', 'alert', array('class' => 'danger'));
						}

					} // Validates
					else {
						//debug($this->validationErrors);
						$this->Session->setFlash('Erreur de validation', 'alert', array('class' => 'danger'));
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
			}


			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}

		// Editer une commande 
		public function edit($order_id=null) {
			$order = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'Order.id' 		=> $order_id, 
						'Order.user_id' => $this->Session->read('Auth.User.id'),
						'Order.state <' => 2
					) 
				) 
			);


			// Si la commande existe et qu'elle appartient bien à l'user
			if(!empty($order)){
				
				if(!empty($this->request->data)){
					if(array_key_exists('withdraw', $this->request->data['Order']) ){
						if($this->request->data['Order']['withdraw'] == 1){
							$withdrawal = 1;
						}
						else {
							$withdrawal = 2;
						}
					}
					else {
						$withdrawal = 2;
					}
				}
				else {
					$withdrawal = $order['Order']['state_withdrawal'];
				}
				$this->set('state_withdrawal', $withdrawal);

				// On traite le formulaire si on modifie
				if(!empty($this->request->data)){	

					$this->Order->set($this->request->data);
					// Si les données sont validées
					if($this->Order->validates() ){


						if($withdrawal == 1){

							$date_withdrawal = $this->request->data['Order']['date_deposit'];
							$date = strtotime($date_withdrawal);


							$day =  date('d', $date+((3600*24)*2));
							$month = date('m', $date);
							$year = date('Y', $date);


							$withdrawal = $this->request->data['Order']['date_withdrawal'] = $day.'-'.$month.'-'.$year;
							$state_withdraw = 0;
							//print_r($this->request->data['Order']['date_withdrawal']);
						}

						else{
							$state_withdraw = 1;
							$withdrawal = $this->request->data['Order']['date_withdrawal'];

						}


						if($order['Order']['state_deposit'] == 1){
							$data_order = array(
													"Order" =>
																array(
																'id' 					=> $order_id,
																'user_id'				=> $this->Session->read('Auth.User.id'),
																'nb_bacs'				=> $this->request->data['Order']['nb_bacs'],
																'date_withdrawal' 		=> $withdrawal,
																'hour_withdrawal'		=> $this->request->data['Order']['hours'],
																'concierge_withdrawal'	=> $this->request->data['Order']['concierge_withdrawal'],
																'state_withdrawal'		=> $state_withdraw,

																),
													"Address" =>
																array(
																	'id'				=> $order['Order']['address_id'],
																	'city_id'			=> $this->request->data['Order']['cities'],
																	'postal_id'			=> $this->request->data['Order']['postals'],
																	'firstname'			=> $this->request->data['Address']['firstname'],
																	'lastname'			=> $this->request->data['Address']['lastname'],
																	'street'			=> $this->request->data['Address']['street'],
																	'digicode'			=> $this->request->data['Address']['digicode'],
																	'floor'				=> $this->request->data['Address']['floor'],
																	'comment'			=> $this->request->data['Address']['comment'],
																	'phone'				=> $this->request->data['Address']['phone'],
																	'company'			=> $this->request->data['Address']['company'],
																	)
							);

						}
						else {
							$deposit = $this->request->data['Order']['date_deposit'];

							$data_order = array(
													"Order" =>
																array(
																'id' 					=> $order_id,
																'user_id'				=> $this->Session->read('Auth.User.id'),
																'nb_bacs'				=> $this->request->data['Order']['nb_bacs'],
																'date_deposit' 			=> $deposit,
																'hour_deposit'			=> $this->request->data['Order']['hours'],
																'concierge_deposit'		=> $this->request->data['Order']['concierge_deposit'],
																'date_withdrawal' 		=> $withdrawal,
																'hour_withdrawal'		=> $this->request->data['Order']['hours'],
																'concierge_withdrawal'	=> $this->request->data['Order']['concierge_withdrawal'],
																'state_withdrawal'		=> $state_withdraw,

																),
													"Address" =>
																array(
																	'id'				=> $order['Order']['address_id'],
																	'city_id'			=> $this->request->data['Order']['cities'],
																	'postal_id'			=> $this->request->data['Order']['postals'],
																	'firstname'			=> $this->request->data['Address']['firstname'],
																	'lastname'			=> $this->request->data['Address']['lastname'],
																	'street'			=> $this->request->data['Address']['street'],
																	'digicode'			=> $this->request->data['Address']['digicode'],
																	'floor'				=> $this->request->data['Address']['floor'],
																	'comment'			=> $this->request->data['Address']['comment'],
																	'phone'				=> $this->request->data['Address']['phone'],
																	'company'			=> $this->request->data['Address']['company'],
																	)
							);


						}



						if($this->Order->saveAll($data_order, array('deep' => true) ) ){
								$this->Session->setFlash('Données correctement sauvegardées', 'alert', array('class' => 'success'));
								$this->redirect(array('controller' => 'users', 'action' => 'my_account', '#' => 'livraisons'));


						}
						else {
								//print_r($this->Order->validationErrors);
								//debug($this->request->data['Order']['withdraw']);
								$this->Session->setFlash("Erreur lors de la sauvegarde 2", 'alert', array('class' => 'danger'));
						}

					}
					else {
								$this->Session->setFlash('Erreur lors de la sauvegarde', 'alert', array('class' => 'danger'));
					}
				}


				// On récupère les villes
			    $cities = $this->Order->Address->City->find('list');
				$this->set(compact('cities'));

				// On récupère les codes postaux
				$postals = $this->Order->Address->Postal->find('list');
				$this->set(compact('postals'));
		
				// On récupère les créneaux
				$hours = new Hour();
				$hours = $hours->find('list');
				$this->set(compact('hours'));

				$this->set(compact('order'));
			}
			// sinon erreur 404
			else {
				throw new NotFoundException('Commande archivé"');
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

		$order_edit = $this->Order->findById($order_id);

		if(!empty($order_id)){


			$this->Order->create();
			$data = array(
							'Order' => array(
										'id' => $order_id, 
										'state' => 2
										)
					);

			$this->Order->save($data);

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

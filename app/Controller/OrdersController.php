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


/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

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
															'date_deposit'				=> $deposit->format($format),
															'hour_deposit'				=> $data_full['Order']['hour_deposit'],
															'state_deposit'				=> 0,
															'concierge_deposit'			=> $data_full['Order']['concierge_deposit'],
															'date_withdrawal'			=> $withdrawal->format($format),
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


##############################

	public function msf_index() {
		$this->Session->delete('form');
	}
	
	/**
	 * this method is executed before starting the form and retrieves one important parameter:
	 * the form steps number
	 * you can hardcode it, but in this example we are getting it by counting the number of files that start with msf_step_
	 */
	public function msf_setup() {
		App::uses('Folder', 'Utility');
		$ordersViewFolder = new Folder(APP.'View'.DS.'Orders');
		$steps = count($ordersViewFolder->find('msf_step_.*\.ctp'));
		
		$this->Session->write('form.params.steps', $steps);
		$this->Session->write('form.params.maxProgress', 0);


		$this->redirect(array('action' => 'msf_step', 1));
	}
	
	/**
	 * this is the core step handling method
	 * it gets passed the desired step number, performs some checks to prevent smart users skipping steps
	 * checks fields validation, and when succeding, it saves the array in a session, merging with previous results
	 * if we are at last step, data is saved
	 * when no form data is submitted (not a POST request) it sets this->request->data to the values stored in session
	 */
	public function msf_step($stepNumber) {
		
		/**
		 * check if a view file for this step exists, otherwise redirect to index
		 */
		if (!file_exists(APP.'View'.DS.'Orders'.DS.'msf_step_'.$stepNumber.'.ctp')) {
			$this->redirect('/users/msf_index');
		}
		
		/**
		 * determines the max allowed step (the last completed + 1)
		 * if choosen step is not allowed (URL manually changed) the user gets redirected
		 * otherwise we store the current step value in the session
		 */
		$maxAllowed = $this->Session->read('form.params.maxProgress') + 1;
		if ($stepNumber > $maxAllowed) {
			$this->redirect('/orders/msf_step/'.$maxAllowed);
		} else {
			$this->Session->write('form.params.currentStep', $stepNumber);
		}
		
		/**
		 * check if some data has been submitted via POST
		 * if not, sets the current data to the session data, to automatically populate previously saved fields
		 */
		if ($this->request->is('post')) {
			$address = new Address();
			/**
			 * set passed data to the model, so we can validate against it without saving
			 */
			$this->Order->set($this->request->data);
			$address->set($this->request->data);
			/**
			 * if data validates we merge previous session data with submitted data, using CakePHP powerful Hash class (previously called Set)
			 */


			if ($this->Order->validates() && $address->validates() ) {
				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				
				/**
				 * if this is not the last step we replace session data with the new merged array
				 * update the max progress value and redirect to the next step
				 */
				if ($stepNumber < $this->Session->read('form.params.steps')) {
					$this->Session->write('form.data', $currentSessionData);
					$this->Session->write('form.params.maxProgress', $stepNumber);
					$this->redirect(array('action' => 'msf_step', $stepNumber+1));
				} else {
					/**
					 * otherwise, this is the final step, so we have to save the data to the database
					 */
					$this->Order->save($currentSessionData);
					$this->Session->setFlash('Account created!');
					$this->redirect('/orders/msf_index');
				}
			}
		} else {
			$this->request->data = $this->Session->read('form.data');
		}
		
		/**
		 * here we load the proper view file, depending on the stepNumber variable passed via GET
		 */
		$this->render('msf_step_'.$stepNumber);
	}


##############################


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

				// On traite le formulaire si on modifie
				if(!empty($this->request->data)){	

						
					// Si les données sont validées
					if($this->Order->validates() ){
						$format = 'Y-m-d H:i:s';

						if(!empty($this->request->data['Order']['date_deposit'])){
							$deposit = $this->request->data['Order']['date_deposit'];
						}

						if(!empty($this->request->data['Order']['date_withdrawal'])){
							$withdrawal = $this->request->data['Order']['date_withdrawal'];
						}

						// Si on met à jour la commande de dépot
						if(!empty($deposit)){
							$data_order = array(
												"Order" =>
															array(
															'id' 				=> $order_id,
															'user_id'			=> $this->Session->read('Auth.User.id'),
															'nb_bacs'			=> $this->request->data['Order']['nb_bacs'],
															'date_deposit' 		=> $deposit,
															'hour_deposit'		=> $this->request->data['Order']['hours'],
															'concierge_deposit'	=> $this->request->data['Order']['concierge_deposit'],

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
						// Si on met à jour la commande retour
						elseif(!empty($withdrawal)){
							$data_order = array(
												"Order" =>
															array(
															'id' 					=> $order_id,
															'user_id'				=> $this->Session->read('Auth.User.id'),
															'nb_bacs'				=> $this->request->data['Order']['nb_bacs'],
															'date_withdrawal' 		=> $withdrawal,
															'hour_withdrawal'		=> $this->request->data['Order']['hours'],
															'concierge_withdrawal'	=> $this->request->data['Order']['concierge_withdrawal'],

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

						// Si on édite les deux
						else {
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

															),
												"Address" =>
															array(
																'id'				=> $order['Order']['address_id'],
																'city_id'			=> $this->request->data['Order']['cities'],
																'postal_id'			=> $this->request->data['Order']['postals'],
																'firstname'			=> $this->request->data['Address']['firstname'],
																'lastname'			=> $this->request->data['Address']['lastname'],
																'street'			=> $this->request->data['Address'][0]['street'],
																'digicode'			=> $this->request->data['Address'][0]['digicode'],
																'floor'				=> $this->request->data['Address'][0]['floor'],
																'comment'			=> $this->request->data['Address'][0]['comment'],
																'phone'				=> $this->request->data['Address'][0]['phone'],
																'company'			=> $this->request->data['Address'][0]['company'],
																)
							);

						}

						
						if($this->Order->saveAll($data_order, array('validate' => 'first', 'deep' => true) ) ){
							$this->Session->setFlash('Données correctement sauvegardées', 'alert', array('class' => 'success'));
							$this->redirect(array('controller' => 'users', 'action' => 'my_account', '#' => 'livraisons'));
						}
						else {
							$this->Session->setFlash('Erreur dans la sauvegarde', 'alert', array('class' => 'warning'));
							//$this->redirect(array('action' => 'edit', $order_id));
						}
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

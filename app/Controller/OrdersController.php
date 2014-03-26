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
            // Si aucune data n'a été transmise
            if (empty($data_get)) {
                $this->redirect(array('controller'=> 'orders','action' => 'step1'));
                return;
            }
            // definir une adresse vide par defaut
            $data_user = array(
                0 => array(
                    'lastname'  => null,
                    'firstname' => null,
                    'phone'     => null,
                    'company'   => null,
                    'street'    => null,
                    'floor'     => null,
                    'comment'   => null,
                    'digicode'  => null,
                    'postal_id' => null,
                    'city_id'   => null,
                )
            );
            if (empty($this->request->data)) {
                // formulaire vide => on recharge la dernière entrée dans la base de données
                $address_user = new Address();
                $data_user_bdd = $address_user->find('first', array(
                                                        'conditions' => array(
                                                                                'user_id' => $this->Session->read('Auth.User.id'),
                                                        ),
                                                        'order'		=> array(
                                                                                'Address.created' => 'desc',
                                                        ),
                                                        'recursive'	=> -1

                ));
                if ($data_user_bdd) {
                    $data_user[0] = $data_user_bdd['Address'];
                }
            }
            // on définit les infos relatives à l'adresse dans le formulaire
            $this->set('data_user', $data_user);

            // On récupère les créneaux horaires
            $hours = new Hour();
            $this->set('hdeposits', $hours->find('list'));

            // On récupère les codes postaux
            $postals = new Postal();
            $this->set('postals', $postals->find('list'));

            // On récupères le tableau en forme
            $data_get = unserialize(base64_decode($data_get));

            // Si on ne poste pas de données
            if (empty($this->request->data)) {
                $now = date('d-m-Y');
                $next_day = date('d-m-Y', strtotime($now . ' + 1 day'));
                $this->set('date_deposit', $next_day);
                return;
            }

            // injection des datas
            $data_post = $this->request->data;
            $this->Order->set($data_post);
            $isValidated = $this->Order->validates();

            if(!$isValidated) {
                $date_deposit = $this->request['data']['Order'];
                $this->set('date_deposit', $date_deposit);
                $this->Session->setFlash('Erreur lors de l\'enregistrement, merci de corriger vos erreurs', 'alert', array('class' => 'danger'));
                return;
            }

            // les données sont validées
            // injection des donnees si validated
            $address = new Address();
            $this->request->data['Address']['postal_id'] = $this->request->data['Address']['postals'];
            $this->request->data['Address']['city_id'] = $data_get['Order']['cities'];

            // save l'adresse
            $isSaved = $address->save($this->request->data);
            if (!$isSaved) {
                //! grave Erreur
                $this->Session->setFlash('Erreur lors de l\'enregistrement, merci de corriger vos erreurs', 'alert', array('class' => 'danger'));
                error_log("Critical Error in step 2 validation:ok save:ko", 0);
                return;
            }

            // injection de address id
            $address->saveField('user_id', $this->Session->read('Auth.User.id'));
            $address_id = $address->id;

            $data = array(
                'Order' => array(
                    'cities' => $data_get['Order']['cities'],
                    'nb_bacs' => $data_get['Order']['nb_bacs'],
                    'hour_deposit' => $this->request->data['Order']['hdeposits'],
                    'concierge_deposit' => $this->request->data['Order']['concierge_deposit'],
                    'date_deposit' => $this->request->data['Order']['date_deposit'],
                ),
                'Id' => $address_id,
            );
            // On convertit les données avant de les envoyer
            $data = base64_encode(serialize($data));
            $this->redirect(array('controller' => 'orders', 'action' => 'step3', $data));
        }

		// Commande : Etape 3
        /* variable pour la vue:
           - concierge_checked: 0 / 1
           - minDate: date de deposit
           - concierge_deposit: 0/1
        */
		public function step3($data_get = null) {
            // definit les créneaux horaires pour le formulaire
            $hours = new Hour();
            $this->set('hwithdrawals', $hours->find('list'));

			// Si aucune data n'a été transmise
			if(empty($data_get)){
                $this->redirect(array('controller'=> 'orders','action' => 'step1'));
                return;
            }

            // On récupères le tableau sérialisé et on le remet en forme
            $data_get = unserialize(base64_decode($data_get));

            // Si on ne poste pas de données
            $date_deposit = $data_get['Order']['date_deposit'];
            if (empty($this->request->data)) {
                if ($data_get['Order']['concierge_deposit'] == 0) {
                    $this->set("withdraw", 0);
                    // on definit la variable minDate pour la vue
                    $this->set('minDate', $date_deposit);
                    $this->set('date_withdrawal', $date_deposit);
                } else {
                    $this->set("withdraw", 1);
                    $this->set('minDate', $date_deposit);
                    $date_withdrawal = strtotime($date_deposit) + (24*3600);
                    $next_day = date('d-m-Y', $date_withdrawal);
                    $this->set('date_withdrawal', $next_day);
                }
                $this->set('date_deposit', $date_deposit);
                return;
            }

            // post data
            $data_post = &$this->request->data;
            // on definit la date withdrawal
            if ($data_post['Order']['withdraw'] == "0") {
                // save data
                $data_post['Order']['hwithdrawals'] = $data_get['Order']['hour_deposit'];
                $address_id = $data_get['Id'];
                $format = 'Y-m-d H:i:s';
                $deposit = new DateTime($data_get['Order']['date_deposit']);
                $this->set('concierge_deposit', 0);
                $data_order = array(
                    "Order" =>
                        array(
                            'user_id'			=> $this->Session->read('Auth.User.id'),
                            'nb_bacs'			=> $data_get['Order']['nb_bacs'],
                            'hour_deposit'		=> $data_get['Order']['hour_deposit'],
                            'date_deposit'		=> $deposit->format($format),
                            'hour_withdrawal'   => $data_get['Order']['hour_deposit'],
                            'date_withdrawal'   => $deposit->format($format),
                            'concierge_deposit' => 0,
                            'state_deposit'		=> 0,
                            'state_withdrawal'	=> 0,
                            'state'				=> 1,
                            'withdraw'          => 0,
                        ),

                );
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
                    debug($this->Order->validationErrors);
                    $this->Session->setFlash('Erreur lors de la sauvegarde.', 'alert', array('class' => 'danger'));
                }
                return;
            }

            // withdraw = 1 mais concierge_deposit peut valoir 0 ou 1
            $this->set('date_withdrawal', $data_get['Order']['date_deposit']);
            $this->set('minDate', $date_deposit);

            $address_id = $data_get['Id'];
            $this->set(compact('concierge_deposit'));

            // Si les données ne sont pas validées
            $this->Order->set($data_post);
            $isValidated = $this->Order->validates();
            if (!$isValidated) {
                $this->set("withdraw", 1);
                $this->Session->setFlash('Erreur de validation', 'alert', array('class' => 'danger'));
                return;
            }

            $data_order = array(
                "Order" =>
                    array(
                        'user_id'					=> $this->Session->read('Auth.User.id'),
                        'nb_bacs'					=> $data_get['Order']['nb_bacs'],
                        'date_deposit'				=> $data_get['Order']['date_deposit'],
                        'hour_deposit'				=> $data_get['Order']['hour_deposit'],
                        'state_deposit'				=> 0,
                        'concierge_deposit'			=> $data_get['Order']['concierge_deposit'],
                        'date_withdrawal'			=> $data_post['Order']['date_withdrawal'],
                        'hour_withdrawal'			=> $data_post['Order']['hwithdrawals'],
                        'state_withdrawal'			=> 1,
                        'concierge_withdrawal'		=> $data_post['Order']['concierge_withdrawal'],
                        'state'						=> 1,
                        'withdraw'                  => 1,
                    ),
            );
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
            } else {
                debug($this->Order->validationErrors);
                $this->Session->setFlash('Erreur de sauvegarde', 'alert', array('class' => 'danger'));
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
			$param = new Param();

			$min_date = $param->findByKey('min_date_deposit');
			$min_date = $min_date['Param']['value'];
			$this->set('min_date', $min_date);

			$max_date = $param->findByKey('max_date_withdrawal') ;
			$max_date = $max_date['Param']['value'];
			$this->set('max_date', $max_date);


			$nb_bac_max = $param->findByKey('nb_bac_max') ;
			$nb_bac_max = $nb_bac_max['Param']['value'];
			$this->set('nb_bac_max', $nb_bac_max);

			$nb_bac_min = $param->findByKey('nb_bac_min') ;
			$nb_bac_min = $nb_bac_min['Param']['value'];
			$this->set('nb_bac_min', $nb_bac_min);


            $withdraw = 0;
            // relecture de la commande
            $order = $this->Order->find('first',
                array(
                    'conditions' =>
                        array(
                            'Order.id' 		=> $order_id,
                            'Order.user_id' => $this->Session->read('Auth.User.id'),
                            'Order.state <=' => 2
                        )
                )
            );
            unset($order['User']);
            if (empty($this->request->data)) {
                // Pas d'entrèe dans la db => error
                if (empty($order)) {
                    throw new NotFoundException('Commande archivé"');
                    return;
                }
                // lecture des données
                $date_deposit = $order['Order']['date_deposit'];
                $date_withdrawal = $order['Order']['date_withdrawal'];
                if ($date_deposit == $date_withdrawal) {
                    $withdraw = 0;
                } else {
                    $withdraw = 1;
                }
            } else {
                if (array_key_exists('state_withdrawal', $this->request->data['Order'])) {
                    $withdraw = $this->request->data['Order']['state_withdrawal'];
                } else {
                    // cas bacs chez le client
                    $withdraw = 1;
                }
            }
            $this->set('withdraw', $withdraw);


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

            // On traite le formulaire si on modifie
            if (!empty($this->request->data)){
                // injection de withdraw
                $alias = $this->request->data;
                $this->request->data['Order']['withdraw'] = $withdraw;
                $order_src = $order['Order'];
                $order_replace = $this->request->data['Order'];
                $order['Order'] = array_merge($order_src, $order_replace);
                $address_src = $order['Address'];
                $address_replace = $this->request->data['Address'];
                $order['Address'] = array_merge($address_src, $address_replace);
                $order['Order']['withdraw'] = $withdraw;
                $this->set(compact('order'));
                // Si les données sont validées
                if ($this->Order->validates()){
                    if($this->Order->saveAll($order, array('deep' => true) )){
                        $this->Session->setFlash('Données correctement sauvegardées', 'alert', array('class' => 'success'));
                        $this->redirect(array('controller' => 'users', 'action' => 'my_account', '#' => 'livraisons'));
                    }
                    else { // saveAll
                        error_log("Erreur: ".serialize($this->Order->validationErrors), 0);
                        $this->Session->setFlash("Erreur lors de la sauvegarde 2", 'alert', array('class' => 'danger'));
                    }
                }
                else {
                    $this->Session->setFlash('Erreur lors de la sauvegarde', 'alert', array('class' => 'danger'));
                    error_log(serialize($this->Order->validationErrors), 0);
                }
            }
		}

        public function edit_withdraw($order_id=null) {
            /* récuperation de variables et passage dans la view */
            $param = new Param();

            $min_date = $param->findByKey('min_date_deposit');
            $min_date = $min_date['Param']['value'];
            $this->set('min_date', $min_date);

            $max_date = $param->findByKey('max_date_withdrawal');
            $max_date = $max_date['Param']['value'];
            $this->set('max_date', $max_date-1);


            $nb_bac_max = $param->findByKey('nb_bac_max') ;
            $nb_bac_max = $nb_bac_max['Param']['value'];
            $this->set('nb_bac_max', $nb_bac_max);

            $nb_bac_min = $param->findByKey('nb_bac_min') ;
            $nb_bac_min = $nb_bac_min['Param']['value'];
            $this->set('nb_bac_min', $nb_bac_min);

            /* création de la variable order */
            $order = $this->Order->find('first',
                array(
                    'conditions' =>
                        array(
                            'Order.id' 		=> $order_id,
                            'Order.user_id' => $this->Session->read('Auth.User.id'),
                            'Order.state <=' => 2
                        )
                )
            );



            // Si la commande n'existe pas on envoie une 404 ou qu'elle n'est pas effectué
            if (empty($order) || $order['Order']['state_withdrawal'] != 1) {
                throw new NotFoundException('Commande archivé');
                return;
            }
            $this->set('date_deposit_value', $order['Order']['date_deposit']);

            // Si le formulaire est posté
               if(!empty($this->request->data)){

                //error_log($withdrawal, 0);

                $this->Order->set($this->request->data);
                // Si les données sont validées
                if($this->Order->validates() ){

                        // Si le dépot de bac vide à été effectué (1 ligne)
                        error_log('deposit fait', 0);
                        $data_order = array(
                            "Order" =>
                                array(
                                    'id' 					=> $order_id,
                                    'user_id'				=> $this->Session->read('Auth.User.id'),
                                    'nb_bacs'				=> $this->request->data['Order']['nb_bacs'],
                                    'date_withdrawal' 		=> $this->request->data['Order']['date_withdrawal'],
                                    'hour_withdrawal'		=> $this->request->data['hour_withdrawal'],
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

                    error_log(serialize($data_order), 0);
                    if($this->Order->saveAll($data_order, array('deep' => true) ) ){
                        error_log('save reussi', 0);

                        $this->Session->setFlash('Données correctement sauvegardées', 'alert', array('class' => 'success'));
                        $this->redirect(array('controller' => 'users', 'action' => 'my_account', '#' => 'livraisons'));


                        //$this->set('order', $data);

                    }
                    else { // saveAll
                        $this->Session->setFlash("Erreur lors de la sauvegarde 2", 'alert', array('class' => 'danger'));
                        //debug($order);
                        //debug($this->request->data);
                        $errors = $this->Order->validationErrors;
                        error_log('save fail', 0);
                        error_log(serialize($data_order),0);
                        error_log(serialize($errors));

                    }

                }
                else { // validation
                    $this->Session->setFlash('Erreur lors de la sauvegarde', 'alert', array('class' => 'danger'));

                    error_log('validate fail', 0);
                    error_log(serialize($this->request->data), 0);
                    //error_log(serialize($this->Order->invalidFields()), 0);

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

             // On passe les données $order à la vue
            $this->set(compact('order'));


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
	    $order = $bacs[0]['Order'];
	    $user_id = $order['user_id'];
	    $bacs = $bacs[0]['Bac'];
		// On les envoeis à la vue
		$this->set(compact('bacs'));

	    $this->set(compact('order_id'));

	    $nb_bac_max = $order['nb_bacs'];
	    $nb_bac_current = $this->Order->BacR->find('count', array(
	    															'conditions' => array(
	    																					'order_id' => $order['id']
	    																)


	    ));
	    //debug($nb_bac_current);
	    //print_r($nb_bac_current);
	    //print_r($nb_bac_max);
		// Si on ajoute un bac
		if ($this->request->is('post')) {
			if($nb_bac_current < $nb_bac_max){
			    $bac = $this->Order->Bac->findByCode($this->request->data['Bac']['code']);

			    // Si le bac existe
			    if(!empty($bac)){

			    	// Si le bac n'est pas déjà associé
			    	$exist = $this->Order->BacR->findByBacIdAndOrderId($bac['Bac']['id'], $order_id);
			    	if(empty($exist)){

				    	$this->Order->BacR->create();

				    	$this->Order->BacR->save(array(
											    			'order_id' => $order_id,
											    			'bac_id' => $bac['Bac']['id']
											      		)
						      						);

				    	$this->Order->Bac->id = $bac['Bac']['id'];
				    	$this->Order->Bac->saveField('user_id', $user_id);
				    	$this->Order->Bac->saveField('state', 1);

				    	$this->Session->setFlash('Bac correctement associé');
						$this->redirect(array('controller' => 'orders', 'action' => 'add_bac', $order_id, 'admin' => true));

				    }
				    else{
				    	$this->Session->setFlash('Bac déjà associé');
				    }

			    }
			    else {
			    	throw new NotFoundException('Bac inexistant');

			    }

			}
			else {
					$this->Session->setFlash('Nombre de bac à associer atteint');
			}
		}



	}

	// Permet de supprimer l'association d'un bac à une commande
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

<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Model', 'Hour');

class UsersController extends AppController {




		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->allow('register', 'login', 'logout', 'forgot', 'password', 'activate');
			$this->Auth->deny('my_account', 'my_bacs', 'edit_password');

		}



// Methodes

		// Dashboard
		public function index(){

		}


		public function my_account(){
			// #### Profil
			$user = $this->User->find('first', array(
															'conditions' => array(
																					'id' => $this->Session->read('Auth.User.id'),
															),
															'recursive' => -1
														)
				) ;

			if(!empty($user)){
				$this->set(compact('user'));
			}
			// #### /Profil

			// #### Password

			// si on envoie une demande
			if(!empty($this->request->data['User']['old_password'])){

				$user_id = $this->Session->read('Auth.User.id');
				$password = $this->request->data['User']['old_password'];
				$new_password = $this->request->data['User']['password'];

				$verif_password = $this->User->findByIdAndPassword($user_id, $this->Auth->password($password));

				// Validation des données

				$this->User->set($this->request->data);

				if($this->User->validates()) {

					if(!empty($verif_password) ){

						$this->User->create(array(
							"id"			=> $user_id,
							"password" 		=> $this->Auth->password($new_password),
							));

						// Si tout est ok, on sauvegarde
						$this->User->save();

						$this->Session->destroy(); // on efface la session courante

						$this->Session->setFlash('Votre mot de passe à correctement été modifié. Merci de vous reconnecter.', 'alert', array('class' => 'success'));
						$this->redirect(array('controller' => 'users', 'action' => 'login'));

						
					}
					else {
						$this->Session->setFlash('Veuillez renseignez votre mot de passe', 'alert', array('class' => 'danger'));
						$this->redirect(array('controller' => 'users', 'action' => 'my_account#password'));
					}
				}
				else {
					$this->Session->setFlash('Votre mot de passe actuel est incorrect', 'alert', array('class' => 'danger'));
					$this->redirect(array('controller' => 'users', 'action' => 'my_account#password'));
				}
			}
			// #### /Password

			// #### Livraisons

			// On relie les créneaux associés
			$hours = new Hour();
			$hours = $hours->find('list');
			$this->set(compact('hours'));

			// Etat de commande
			$state = array(
							0 => 'Commande',
							1 => 'En attente',
							2 => 'Terminée',
							3 => 'Livraison de bacs pleins',
			);
			$this->set(compact('state'));

			// Les commandes en cours 
			$orders_current = $this->User->Order->find('all', array(
															'conditions' => array(
																					'Order.user_id' 		=> $this->Session->read('Auth.User.id'),
																					'Order.state <'			=> 3,
																					'OR' => array(
																									'Order.state_deposit ='		=> 0,
																									'Order.state_withdrawal ='	=> 1,
																									
																					)																					
															),
															'recursive' => 0,
															'order'		=> array(
																				'Order.created' 		=> 'desc',
																)
														)
				);

			// Les commandes terminées (historique)
			$orders_history = $this->User->Order->find('all', array(
															'conditions' => array(
																					'Order.user_id' 		=> $this->Session->read('Auth.User.id'),
																					'OR' => array(
																									'Order.state_withdrawal ='	=> 2 ,
																									'Order.state_deposit ='		=> 1,
																					)
															),
															'recursive' => 0,
															'order'		=> array(
																				'Order.created' 		=> 'desc',
															)
														)
			);
			


			if(!empty($orders_current)){
				// Si on a des commandes on liste les commandes
				$this->set(compact('orders_current'));
			}
			if(!empty($orders_history)){

				// Si on a des commandes on liste les commandes
				$this->set(compact('orders_history'));
			}
			// #### /Livraisons
		}

		// Mes bacs
		public function my_bacs(){
			
				// On liste toutes les bacs utilisateurs
				$bacs = $this->User->Bac->findAllByUserIdAndState($this->Session->read('Auth.User.id'), '1');
				// On les envois à la vue
				$this->set(compact('bacs'));

				// Si on à fait une demande de retrait de bac
				if(!empty($this->request->data)){

					// Si on veux que les bacs selectionnés
					if(empty($this->request->data['select_all']) ){
						//else {

						$this->User->Order->create();
						$data = array(	
								'user_id'	=> $this->Session->read('Auth.User.id'),
								'state' 	=> 3, // Etat à 3 : Demande de retrait
						);

						$this->User->Order->save($data);
						$bacs = $this->request->data;
						$order_id = $this->User->Order->id;

						$nb_bac_withdraw = 0;

						// On parse chaque demande
						foreach($bacs['Order'] as $bac_id => $check){
								// Si l'utilisateur veux retirer le bac
								if($check == 1){

									$exist = $this->User->Order->Bac->findById($bac_id);

									// Si le bac n'est pas déjà sortie
									if($exist['Bac']['state'] == 1){

										// On ajoute la liaison à la commande
										$this->User->Order->BacR->create();

										// /!\ Modifier le order_id /!\
										$data = array(
													'bac_id' => $bac_id,
													'order_id' => $this->User->Order->id,
										);

										$this->User->Order->BacR->save($data);


										// On passe le bac en "retrait utilisateur"
										$this->User->Bac->create();
										$this->User->Bac->id = $bac_id;
										$data = array(
													'nb_bacs' => $nb_bac_withdraw,
													'state' => 3,
										);

										$this->User->Bac->save($data);

										echo "Je veux retirer le bac ".$bac_id."<br />";
										$nb_bac_withdraw++;
									}
								}
						}								

						$this->Session->setFlash('Vos bacs ont été récupérés', 'alert', array('class' => 'success'));
						$this->redirect(array('controller' => 'users', 'action' => 'my_bacs') );

					} // fin bacs selectionnés

					// Si on veux tous les bacs
					else {

						
					} // fin tous les bacs

				}


		}

		// Mes bacs
		public function my_orders(){
			
				// On liste toutes les bacs utilisateurs
				$data = $this->User->Orders->find('all', array(
															'conditions' => array(
																					'user_id' => $this->Session->read('Auth.User.id')
															),
														)
				) ;

				$orders = $data;
				$this->set(compact('orders'));


		}
		/* Connexion */
		public function login() {
			if(!empty($this->request->data)){
				if($this->Auth->login()) {

					$this->Session->setFlash('Vous avez correctement été connecté', 'alert', array('class' => 'success'));
					$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
				}
				else {	
					$this->Session->setFlash('Identifiants incorrects', 'alert', array('class' => 'danger'));
				}


			}
		}

		/* Deconnexion */
		public function logout() {
			if($this->Session->read('Auth.User.id')){
				$this->Auth->logout();
				$this->redirect('/');
				$this->Session->setFlash('Deconnecte');
			}
		}

		/* Envoyer un mail de regénération de password */
		public function forgot() {
			if(!empty($this->request->data)){
				$user = $this->User->findByEmail($this->request->data['User']['email'], array('id'));

				if(empty($user)){
					$this->Session->setFlash("L'adresse email n'a pas été trouvé", 'alert', array('class' => 'danger'));

				}
				else {

					$token = md5(time() .' - '. uniqid());
					$this->User->id = $user['User']['id'];
					$this->User->saveField('token', $token);

					// Envoie de l'email de regénération
					App::uses('CakeEmail', 'Network/Email');

					$CakeEmail = new CakeEmail('default');
					$CakeEmail->to($this->request->data['User']['email']);
					$CakeEmail->subject('Dezordre: Régénérer votre mot de passe');
					$CakeEmail->viewVars($this->request->data['User'] + array(
						'token' => $token,
						'id'	=> $this->User->id,

						));
					$CakeEmail->emailFormat('text');
					$CakeEmail->template('forgot');
					$CakeEmail->send();

					$this->Session->setFlash("Un mail vous à été envoyé afin de regénérer votre mot de passe", 'alert', array('class' => 'success'));
				}


			}
		}

		/* Regénérer password */
		public function password($user_id, $token){
			$user = $this->User->find('first', array(
					'fields'	=> array('id'),
					'conditions' => array('id' => $user_id, 'token' => $token)
				));

			if(empty($user)){
				$this->Session->setFlash('Ce lien est incorrect', 'alert', array('class' => 'danger'));
				return $this->redirect(array('action' => 'forgot'));
			}
			if(!empty($this->request->data)){
				$this->User->create($this->request->data);
				if($this->User->validates()){
					$this->User->save(
									array(
										'id' => $user['User']['id'],
										'token' => '',
										'password' => $this->Auth->password($this->request->data['User']['password'])

										)
									);
					
					$this->Session->setFlash('Mot de passe correctement modifié', 'alert', array('class' => 'success'));
					return $this->redirect(array('action' => 'login'));


				}

			}
		}


		/* Enregistrer un nouveau client */
		public function register() {
			if($this->Session->read('Auth.User.id')){
				$this->redirect('/');
			}
			else {

				if(!empty($this->request->data)){

					$this->User->create($this->request->data);
					// Validation des données
					if($this->User->validates()) {

						$token = md5(time() .' - '. uniqid());

						$this->User->create(array(
							"email" 		=> $this->request->data['User']['email'],
							"password" 		=> $this->Auth->password($this->request->data['User']['password']),
							"token" 		=> $token
							));

						// Si tout est ok, on sauvegarde
						$this->User->save();

						// Envoie de l'email d'activation à l'utilisateur
						$CakeEmail = new CakeEmail('default');
						$CakeEmail->to($this->request->data['User']['email']);
						$CakeEmail->subject('Dezordre: Confirmation d\'inscription');
						$CakeEmail->viewVars($this->request->data['User'] + array(
							'token' => $token,
							'id'	=> $this->User->id,

							));
						$CakeEmail->emailFormat('text');
						$CakeEmail->template('register');
						$CakeEmail->send();


						$this->Session->setFlash("Votre compte à bien été créer. Un lien vous à été envoyé par email afin d'activer votre compte.", 'alert', array('class' => 'success'));
						$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
						
					}

					else {
							$this->Session->setFlash("Erreur, merci de corriger", 'alert', array('class' => 'danger'));
					}

				}
			}
		}

		/* Editer le compte  */
		public function edit() {

				// Si on reçoit des données post
				if(!empty($this->request->data)){
					$this->User->id = $this->Session->read('Auth.User.id'); // On associe l'id du bac à l'objet 

					// On valide les champs envoyés
					if($this->User->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées', 'alert', array('class' => 'success'));

						// On enregistre les données
						$this->User->save(array(
							'email'			=> $this->request->data['Users']['email'],
							'password' 		=> $this->Auth->password($this->request->data['Users']['password']),
						));

					}
				}

				// On affiche les données déjà entré par l'user
				$user= $this->User->find('first',
					array(
							'conditions' =>
							array(
									'id' => $this->Session->read('Auth.User.id'),
								)

						)
					);
				$this->set(compact('user'));
		}


		/* Activer un compte nouvellement crée */
		public function activate($user_id, $token) {

			if(isset($user_id)){

				if($this->Session->read('Auth.User.id')){
					$this->redirect('/');
				}
				else {
						$user = $this->User->find('first', array(

								'fields'		=> array('id'),
								'conditions'	=> array(
															'id' => $user_id,
															'token' => $token
														)

								));

						// Si on ne trouve pas le lien
						if(empty($user)){
							$this->Session->setFlash('Ce lien d\'activation est incorrect', 'alert', array('class' => 'danger'));
							return $this->redirect('/');
						}


						$this->Session->setFlash('Votre compte à bien été activé', 'alert', array('class' => 'success'));
						
						// Sinon on active le compte 
						$this->User->save(array(
									'id' 		=> $user['User']['id'],
									'active'	=> 1,
									'token'		=> '',
							));

						return $this->redirect(array('action' => 'login'));
				}
			}
		}


		/* ############### ADMIN ############### */

		// Lister tous les utilisateurs
		public function admin_index(){


			// On liste toutes les utilisateurs
			$users = $this->User->find('all');

			if(!empty($users)){
				// Si on a des bacs, on liste les bacs
				$this->set(compact('users'));
				
			}

		}


		// Editer un utilisateur
		public function admin_edit($user_id){

			$user_edit = $this->User->find('first', 
								array(
									'conditions' => 
									array(
										'id' => $user_id
									) 
								) 
							);

			// Si le bac existe et qu'il appartient bien à l'utilisateur
			if(!empty($user_edit)){
				if(!empty($this->request->data)){
					$this->User->id = $user_id; // On associe l'id du bac à l'objet 

					// On valide les champs envoyés
					if($this->User->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées', 'alert', array('class' => 'success'));

						// On enregistre les données
						$this->User->save(array(
							'firstname'			=> $this->request->data['Users']['firstname'],
							'lastname' 			=> $this->request->data['Users']['lastname'],
							'email' 			=> $this->request->data['Users']['email'],
							'role' 				=> $this->request->data['Users']['role'],
							'active' 			=> $this->request->data['Users']['active'],

						));
					}
				}
				// On affiche les données déjà entré par l'user
				$user= $this->User->find('first',
					array(
							'conditions' =>
							array(
									'id' => $user_id,
								)

						)
					);
					$this->set(compact('user'));
			}
		}

	public function admin_delete($id = null) {


		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Utilisateur introuvable'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('L\'utilisateur à correctement été supprimé.'), 'alert', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('L\'utilisateur n\'a pas pu être supprimé'), 'alert', array('class' => 'danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
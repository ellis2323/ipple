<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController {




		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->allow('register', 'login', 'logout', 'forgot', 'password', 'activate');

		}



// Methodes

		// Dashboard
		public function index(){

		}

		// Newsletter
		public function mail() {
 
 			if(!empty($this->request->data)){
				$this->MailchimpSubscriber = ClassRegistry::init('Mailchimp.MailchimpSubscriber');

				$data = array('EMAIL' => 'corentin@prout.fr');
				$this->MailchimpSubscriber->save($this->request->data);
				debug($this->MailchimpSubscriber->Mailchimp->errorCode);
				debug($this->MailchimpSubscriber->Mailchimp->errorMessage);
			}
		}

		// Mes bacs
		public function my_bacs(){
			
				// On liste toutes les bacs utilisateurs
				$bacs = $this->User->Bac->find('all', array(
															'Bac' => array(
																			'conditions' => array(
																									'user_id' => $this->Session->read('Auth.User.id'),
																									'state <' => 3

																								),
																			)
														)
				) ;
				// On les envois à la vue
				$this->set(compact('bacs'));

				// Si on à fait une demande de retrait de bac
				if(!empty($this->request->data)){


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
									if($exist['Bac']['state'] == 0){

										// On ajoute la liaison à la commande
										$this->User->Order->BacR->create();

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

						echo "<br /><br />Je veux retirer ".$nb_bac_withdraw."bacs";
						debug($this->request->data);

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

					$this->redirect(array('controller' => 'users', 'action' => 'index'));
					$this->Session->setFlash('Vous avez correctement été connecté');
					$this->redirect(array('controller' => 'orders', 'action' => 'add'));
				}
				else {	
					$this->Session->setFlash('Identifiants incorrects');
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
					$this->Session->setFlash("L'adresse email n'a pas été trouvé");

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

					$this->Session->setFlash("Un mail vous à été envoyé afin de regénérer votre mot de passe");
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
				$this->Session->setFlash('Ce lien est incorrect');
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
					
					$this->Session->setFlash('Mot de passe correctement modifié');
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


					// Validation des données
					if($this->User->validates()) {

						$token = md5(time() .' - '. uniqid());

						$this->User->create(array(
							"email" 		=> $this->request->data['User']['email'],
							"password" 		=> $this->Auth->password($this->request->data['User']['password']),
							"lastname" 			=> $this->request->data['User']['lastname'],
							"firstname" 		=> $this->request->data['User']['firstname'],
							"token" 		=> $token
							));

						// Si tout est ok, on sauvegarde
						if($this->User->save()){

							// Envoie de l'email d'activation
							App::uses('CakeEmail', 'Network/Email');

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

							$this->Session->setFlash("Votre compte à bien été créer. Un lien vous à été envoyé par email afin d'activer votre compte.");
							$this->redirect(array('controller' => 'users', 'action' => 'login'));
							
							}
					}

					else {

							$this->Session->setFlash("Erreur, merci de corriger");
					}

				}
			}
		}

		/* Editer un bac */
		public function edit() {

				// Si on reçoit des données post
				if(!empty($this->request->data)){
					$this->User->id = $this->Session->read('Auth.User.id'); // On associe l'id du bac à l'objet 

					// On valide les champs envoyés
					if($this->User->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées');

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
							$this->Session->setFlash('Ce lien d\'activation est incorrect');
							return $this->redirect('/');
						}


						$this->Session->setFlash('Votre compte à bien été activé');
						
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
			/*
			// Si l'utilisateur est admin
			if(!($this->Session->read('Auth.User.role') >= 90) {
				throw new NotFoundException();
			}
			$this->layout = 'admin'; // Layout admin*/




		// Lister tous les utilisateurs
		public function admin_index(){
			// Si l'utilisateur est admin
			if(!($this->Session->read('Auth.User.role') >= 90)) {
				throw new NotFoundException();
			}
			$this->layout = 'admin'; // Layout admin


			// On liste toutes les utilisateurs
			$users = $this->User->find('all');

			if(!empty($users)){
				// Si on a des bacs, on liste les bacs
				$this->set(compact('users'));
				
			}

		}


		// Editer un utilisateur
		public function admin_edit($user_id){
			// Si l'utilisateur est admin
			if(!($this->Session->read('Auth.User.role') >= 90)) {
				throw new NotFoundException();
			}
			$this->layout = 'admin'; // Layout admin



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


						$this->Session->setFlash('Données correctement sauvegardées');

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
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin

		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Utilisateur introuvable'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('L\'utilisateur à correctement été supprimé.'));
		} else {
			$this->Session->setFlash(__('L\'utilisateur n\'a pas pu être supprimé'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
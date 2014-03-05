<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController {




		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->allow('register', 'login', 'logout', 'forgot', 'password', 'activate');

		}



// Methodes



		/* Dashboard Utilisateur*/
		public function index() {
				/*
					// Enlever une liaison
					$this->User->unbindModel(
						array('hasMany' => array('Bac'))
					);
					

					// Ajouter une liaison
					$this->User->bindModel(
					array('hasMany' => array(
						'Orders' => array(
							'className' => 'Order'))
					)
				);
				*/
<<<<<<< HEAD

=======
				//debug($this->User->find('all'));
>>>>>>> d8361b54069cdc57ba0f62fb2cc81fed3454a661

		}

		/* Connexion */
		public function login() {
			if(!empty($this->request->data)){
				if($this->Auth->login()) {

<<<<<<< HEAD
					$this->redirect(array('controller' => 'users', 'action' => 'index'));
					$this->Session->setFlash('Vous avez correctement été connecté');
=======
					$this->redirect(array('controller' => 'orders', 'action' => 'add'));
>>>>>>> d8361b54069cdc57ba0f62fb2cc81fed3454a661
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
<<<<<<< HEAD


							$this->Session->setFlash("Inscription ok, un email vous sera envoyé afin de valider votre compte.");
							$this->redirect(array('controller' => 'users', 'action' => 'login'));
						}
=======
							
							$this->Session->setFlash("Votre compte à bien été créer. Un lien vous à été envoyé par email afin d'activer votre compte.");
							$this->redirect(array('controller' => 'users', 'action' => 'login'));
							
							}
>>>>>>> d8361b54069cdc57ba0f62fb2cc81fed3454a661
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

//$this->layout = 'admin';


		// Lister tous les utilisateurs
		public function admin_index(){
			$this->layout = 'admin'; // Layout admin

			// Si l'utilisateur est admin
			if($this->Session->read('Auth.User.role') >= 90) {
				// On liste toutes les utilisateurs
				$users = $this->User->find('all');

				if(!empty($users)){
					// Si on a des bacs, on liste les bacs
					$this->set(compact('users'));
					
				}


			}
			// Sinon, on redirige vers 404
			else {
				throw new NotFoundException();
			}
		}

		// Editer un utilisateur
		public function admin_edit($user_id){
			$this->layout = 'admin'; // Layout admin

			// Si l'utilisateur est admin
			if($this->Session->read('Auth.User.role') >= 90) {
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

			// Sinon, on redirige vers 404			
			else {
				throw new NotFoundException();
			}
		}

		// Supprimer (desactiver) un user
		public function admin_delete($user_id){
			$this->layout = 'admin'; // Layout admin


			// Si l'utilisateur est admin
			if($this->Session->read('Auth.User.role') >= 90) {
				

			}

			// Sinon, on redirige vers 404			
			else {
				throw new NotFoundException();
			}
		}
}
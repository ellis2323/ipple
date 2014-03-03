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
				// Si l'utilisateur est admin
				/*if($this->Session->read('Auth.User.role') >= 90) {

						$this->Session->setFlash('Bonjour admin :)');
						//throw new NotFoundException();

				}*/	
		}


		/* Connexion */
		public function login() {
			if(!empty($this->request->data)){
				if($this->Auth->login()) {

					$this->redirect(array('controller' => 'users', 'action' => 'index'));
					$this->Session->setFlash('connexion ok');
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

					return $this->redirect(array('action' => 'login'));
					$this->Session->setFlash('Mot de passe correctement modifié');


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
							$CakeEmail->subject('Dezordre: Confirmation de votre inscription');
							$CakeEmail->viewVars($this->request->data['User'] + array(
								'token' => $token,
								'id'	=> $this->User->id,

								));
							$CakeEmail->emailFormat('text');
							$CakeEmail->template('register');
							$CakeEmail->send();

							$this->Session->setFlash("Inscription ok, un email vous sera envoyé afin de valider votre compte.");
							}
					}

					else {

							$this->Session->setFlash("Erreur, merci de corriger");
					}

				}
			}
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



}
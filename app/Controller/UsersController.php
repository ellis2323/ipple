<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController {




		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->allow('register', 'login', 'logout', 'activate');

		}



// Methodes
		public function index() {


			
		}

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

		public function logout() {

			$this->Auth->logout();
			$this->redirect('/');
			$this->Session->setFlash('Deconnecte');

		}

		public function register() {

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

		public function activate($user_id, $token) {
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
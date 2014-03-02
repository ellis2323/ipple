<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController {


		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->allow('register', 'login');

		}



// Methodes
		public function index() {


			
		}

		public function login() {


			
		}

		public function register() {

				if(!empty($this->request->data)){
					$this->User->create($this->request->data);

					if($this->User->validates()) {

						$token = md5(time() .' - '. uniqid());

						$this->User->create(array(
							"email" => $this->request->data['User']['email'],
							"password" => $this->Auth->password($this->request->data['User']['password']),
							"nom" => $this->request->data['User']['nom'],
							"prenom" => $this->request->data['User']['prenom'],
							"token" => $token
							));

							$this->User->save();
							$this->Session->setFlash("Inscription ok, un email vous sera envoyé afin de valider votre compte.");
						}

					else {

							$this->Session->setFlash("Erreur, merci de corriger");
					}

				}

		}


}
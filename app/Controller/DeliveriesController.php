<?php
App::uses('AppController', 'Controller');


class DeliveriesController extends AppController {




		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->deny();

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


		/* Anuler une comande */
		public function cancel($user_id, $token) {

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

						return $this->redirect(array('controller' => 'order', 'action' => 'index'));
				}
			}
		}


		/* ############### ADMIN ############### */

		/*// Lister tous les utilisateurs
		public function admin_index(){
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
			// Si l'utilisateur est admin
			if($this->Session->read('Auth.User.role') >= 90) {
				

			}

			// Sinon, on redirige vers 404			
			else {
				throw new NotFoundException();
			}
		}*/
}
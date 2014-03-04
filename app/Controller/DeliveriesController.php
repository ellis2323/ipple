<?php
App::uses('AppController', 'Controller');


class DeliveriesController extends AppController {




		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->deny();

		}



// Methodes



		public function index() {

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
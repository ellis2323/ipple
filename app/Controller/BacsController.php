<?php
App::uses('AppController', 'Controller');


class BacsController extends AppController {



		// Autorisation
		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->deny();
		}

		/* Liste des bacs utilisateur */
		public function index() {

			// On liste toutes les bacs utilisateurs
			$bacs = $this->Bac->find('all', 
				array(
					'conditions' => 
					array(
						'user_id' => $this->Session->read('Auth.User.id')) 
					) 
			);

			if(!empty($bacs)){
				// Si on a des bacs, on liste les bacs

				$this->set(compact('bacs'));
			}
		}

		/* Editer un bac */
		public function edit($bac_id) {
			$bac_edit = $this->Bac->find('first', 
				array(
					'conditions' => 
					array(
						'id' => $bac_id, 
						'user_id' => $this->Session->read('Auth.User.id')
					) 
				) 
			);

			// Si le bac existe et qu'il appartient bien à l'utilisateur
			if(!empty($bac_edit)){
				if(!empty($this->request->data)){
					$this->Bac->id = $bac_id; // On associe l'id du bac à l'objet 

					// On valide les champs envoyés
					if($this->Bac->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées');

						// On enregistre les données
						$this->Bac->save(array(
							'user_id' 			=> $this->Session->read('Auth.User.id'),
							'title'			=> $this->request->data['Bacs']['title'],
							'description' 	=> $this->request->data['Bacs']['description'],
						));

					}
				}
				// On affiche les données déjà entré par l'user
				$bac= $this->Bac->find('first',
					array(
							'conditions' =>
							array(
									'id' => $bac_id,
									'user_id' => $this->Session->read('Auth.User.id')

								)

						)
					);
					$this->set(compact('bac'));
			}
			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}

/* ############### ADMIN ############### */

		// Lister tous les bacs
		public function admin_index(){
			// Si l'utilisateur est admin
			if($this->Session->read('Auth.User.role') >= 90) {
				// On liste toutes les utilisateurs
				$bacs = $this->Bac->find('all');

				if(!empty($bacs)){
					// Si on a des bacs, on liste les bacs
					$this->set(compact('bacs'));
					
				}

				// Sinon, on redirige vers 404
				else {
					throw new NotFoundException();
				}
			}
		}

		// Editer un bac
		public function admin_edit($bac_id){
			// Si l'utilisateur est admin
			if($this->Session->read('Auth.User.role') >= 90) {
				$bac_edit = $this->Bac->find('first', 
									array(
										'conditions' => 
										array(
											'id' => $bac_id
										) 
									) 
								);

				// Si le bac existe et qu'il appartient bien à l'utilisateur
				if(!empty($bac_edit)){
					if(!empty($this->request->data)){
						$this->Bac->id = $bac_id; // On associe l'id du bac à l'objet 

						// On valide les champs envoyés
						if($this->Bac->validates() ){


							$this->Session->setFlash('Données correctement sauvegardées');

							// On enregistre les données
							$this->Bac->save(array(
								'id'				=> $this->request->data['Bacs']['id'],
								'title'				=> $this->request->data['Bacs']['title'],
								'description' 		=> $this->request->data['Bacs']['description'],
								'user_id' 			=> $this->request->data['Bacs']['user_id'],
							));
						}
					}
					// On affiche les données déjà entré par l'user
					$bac= $this->Bac->find('first',
						array(
								'conditions' =>
								array(
										'id' => $bac_id,
									)

							)
						);
						$this->set(compact('bac'));
				}
			}

			// Sinon, on redirige vers 404			
			else {
				throw new NotFoundException();
			}
		}

}


<?php
App::uses('AppController', 'Controller');


class AddressesController extends AppController {



		// Autorisation
		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->deny();
		}

		/* Liste des bacs utilisateur */
		public function index() {

			// On liste toutes les bacs utilisateurs
			$addresses = $this->Address->findAllByUserId($this->Session->read('Auth.User.id'));

			if(!empty($addresses)){
				// Si on a des bacs, on liste les bacs
				$this->set(compact('addresses'));
			}
		}


		public function add() {
		}

		/* Editer un bac */
		public function edit($address_edit) {
			$address = $this->Address->findByIdAndUserId($address_edit, $this->Session->read('Auth.User.id')); 
			
			// Si le bac existe et qu'il appartient bien à l'utilisateur
			if(!empty($address)){
				if(!empty($this->request->data)){
					$this->Address->id = $address_edit; 

					// On valide les champs envoyés
					if($this->Address->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées');

						// On enregistre les données
						$this->Address->save(array(
							'firstname'			=> $this->request->data['Addresses']['firstname'],
							'lastname'			=> $this->request->data['Addresses']['lastname'],
							'city'				=> $this->request->data['Addresses']['city'],
							'postal'			=> $this->request->data['Addresses']['postal'],
							'street'			=> $this->request->data['Addresses']['address'],
							'number'			=> $this->request->data['Addresses']['address'],
							'digicode'			=> $this->request->data['Addresses']['digicode'],
							'etage'				=> $this->request->data['Addresses']['etage'],
							'tel'				=> $this->request->data['Addresses']['tel'],
							'comment'			=> $this->request->data['Addresses']['comment'],

						));

					}
				}
				// On affiche les données déjà entré par l'user
				$this->set(compact('address'));
			}
			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}



/* ############### ADMIN ############### */
/*
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
*/
}


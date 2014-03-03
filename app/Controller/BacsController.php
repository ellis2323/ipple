<?php
App::uses('AppController', 'Controller');


class BacsController extends AppController {




		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->deny();

		}

		public function index() {

			// On list toutes les bacs utilisateurs
			$bacs = $this->Bac->find('all', 
				array(
					'conditions' => 
					array(
						'user_id' => $this->Session->read('Auth.User.id')) 
					) 
			);

			if(empty($bacs)){
					$this->Session->setFlash('Vous n\'avez aucun bac en stock');
			}
			else {
				// Si on a des bacs, on liste les bacs / VUE A FAIRE
				$this->set(compact('bacs'));
			}
		}



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

}

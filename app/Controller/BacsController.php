<?php
App::uses('AppController', 'Controller');


class BacsController extends AppController {


		// Autorisation
		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->deny();
		}

		/* Editer un bac */
		public function edit($bac_id) {

			// On cherche les infos sur le bac
			$bac = $this->Bac->findByUserIdAndIdAndState($this->Session->read('Auth.User.id'), $bac_id, 1);



			// Si le bac existe et qu'il appartient bien à l'utilisateur
			if(!empty($bac)){
				if(!empty($this->request->data)){
					$this->Bac->id = $bac_id; // On associe l'id du bac à l'objet 

					// On valide les champs envoyés
					if($this->Bac->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées', 'alert', array('class' => 'success'));

						// On enregistre les données
						$this->Bac->save(array(
							'title'			=> $this->request->data['Bacs']['title'],
							'description' 	=> $this->request->data['Bacs']['description'],
						));

					}
				}
				// On affiche les données déjà entré par l'user
				$this->set(compact('bac'));

			}
			// sinon erreur 404
			else {
				throw new NotFoundException('Bac introuvable');
			}
		}

/* ############### ADMIN ############### */

		// Lister tous les bacs
		public function admin_index(){
			// Si l'utilisateur est admin
			if(!($this->Session->read('Auth.User.role') >= 90)) {
				throw new NotFoundException;
			}
			$this->layout = 'admin'; // Layout admin

			// On liste toutes les utilisateurs
			$bacs = $this->Bac->find('all');

			if(!empty($bacs)){
				// Si on a des bacs, on liste les bacs
				$this->set(compact('bacs'));
				
			}

		}



		// Ajouter un bac
		public function admin_add(){
			// Si l'utilisateur est admin
			if(!($this->Session->read('Auth.User.role') >= 90)) {
				throw new NotFoundException;
			}
			$this->layout = 'admin'; // Layout admin


			if(!empty($this->request->data)){
					// si on ajoute une liste
					debug($this->request->data);
					if(isset($this->request->data['Bacs']['basename'])){
							$basename = $this->request->data['Bacs']['basename'];
							$start = $this->request->data['Bacs']['start'];
							$end = $this->request->data['Bacs']['end'];

							for($i=$start;$i<($end+1);$i++){
								$code = $basename.$i;

								$bac = $this->Bac->findByCode($code);
								if(empty($bac)){
									$this->Bac->create();

									$this->Bac->save(array(
												'code' => $code,
										));
								}
							}
							echo ($i-1)."bacs ajoutés";
					}

					// Ajout simple
					else {

						echo ($i-1)."bacs ajoutés";
					}
			}
			
		}

		// Editer un bac
		public function admin_edit($bac_id){

			


			$this->layout = 'admin'; // Layout admin


			$bac_edit = $this->Bac->find('first', 
								array(
									'conditions' => 
									array(
										'Bac.id' => $bac_id
									) 
								) 
							);

			$users = $this->Bac->find('list');
			$this->set(compact('users'));
			// Si le bac existe et qu'il appartient bien à l'utilisateur
			if(!empty($bac_edit)){
				if(!empty($this->request->data)){
					$this->Bac->id = $bac_id; // On associe l'id du bac à l'objet 

					// On valide les champs envoyés
					if($this->Bac->validates() ){



						$this->Bac->create();

						$data= array(
									'Bac' => array(
													'id'				=> $bac_id,
													'code'				=> $this->request->data['Bacs']['code'],
													'user_id' 			=> $this->request->data['Bacs']['users'],
						));

						// On enregistre les données
						if($this->Bac->saveAssociated($data)){
							$this->Session->setFlash('Données correctement sauvegardées', 'alert', array('class' => 'success'));
							//debug($this->Bac->saveAssociated($data));

						}
					}
				}
				// On affiche les données déjà entré par l'user
				$bac= $this->Bac->find('first',
					array(
							'conditions' =>
							array(
									'Bac.id' => $bac_id,
								)

						)
					);
				$this->set(compact('bac'));
			}


		}

		public function admin_view($id = null) {
			if (!$this->Bac->exists($id)) {
				throw new NotFoundException(__('Invalid bac'));
			}
			$options = array('conditions' => array('Bac.' . $this->Bac->primaryKey => $id));
			$this->set('bac', $this->Bac->find('first', $options));
		}

		public function admin_delete($id = null) {
			
			$this->Bac->id = $id;
			if (!$this->Bac->exists()) {
				throw new NotFoundException(__('Bac introuvable'));
			}
			if ($this->Bac->delete()) {
				$this->Session->setFlash(__('Le bac à correctement été supprimé.'), 'alert', array('class' => 'success'));
			} else {
				$this->Session->setFlash(__('Le bac n\'a pas pu être supprimé'), 'alert', array('class' => 'danger'));
			}
			return $this->redirect(array('action' => 'index'));
		}

}


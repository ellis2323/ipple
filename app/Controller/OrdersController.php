<?php
App::uses('AppController', 'Controller');


class OrdersController extends AppController {



		// Autorisation
		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->deny();
		}

		// Liste des commandes utilisateur 
		public function index() {

			// On demande toutes les commandes utilisateurs
			$orders = $this->Order->findAllByUserIdAndState($this->Session->read('Auth.User.id'), '1');


			if(!empty($orders)){

				// Si on a des commandes on liste les commandes
				$this->set(compact('orders'));
			}
			else {
				$this->Session->setFlash('Aucune commande');
			}

			$livraison = $this->Order->find('all');
			debug($livraison);

			//echo $livraison[0]['Deliveries'][0]['user_id'];
		}

		// Editer une commande 
		public function edit($order_id) {
			$order_edit = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'id' => $order_id, 
						'user_id' => $this->Session->read('Auth.User.id')
					) 
				) 
			);

			if(!empty($order_edit)){

				// On traite le formulaire
				if(!empty($this->request->data)){
					$this->Order->id = $order_id;

					if($this->Order->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées');

						$this->Order->save(array(
							'nb_bacs'				=> $this->request->data['Orders']['nb_bacs'],
						));
					}
				}

				// On affiche les données
				$order = $this->Order->find('first',
					array(
							'conditions' =>
							array(
									'id' => $order_id,
									'user_id' => $this->Session->read('Auth.User.id')
								)

						)
					);
					$this->set(compact('order'));
			}
			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}

		// Passer une commande
		public function add() {

			// Si le formulaire à été soumis
			if(!empty($this->request->data)){
				// On valide les données
				if($this->Order->validates()){

					$this->Order->create(array(
						'user_id'			=> $this->Session->read('Auth.User.id'),
						'nb_bacs'		=> $this->request->data['Orders']['nb_bacs'],
						'state'			=> 1
					));
					
					if($this->Order->save()){
						$this->Session->setFlash('Commande enregistrée');

					}
				}
			}
			

			// On affiche le formulaire : Nombre de bac, date de dépot, date de retrait
				// Si c'est la première commande, on propose d'enregistrer une nouvelle adresse

		}

		// Anuler une commande 
		public function cancel($order_id) {

			$order_edit = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'id' 		=> $order_id, 
						'user_id' 	=> $this->Session->read('Auth.User.id'),
						'state'		=> 1
					) 
				) 
			);

			// Si le bac existe et qu'il appartient bien à l'utilisateur
			if(!empty($order_edit)){
					$this->Order->id = $order_id; // On associe l'id du bac à l'objet 

					// On valide les champs envoyés
					if($this->Order->validates() ){


						$this->Session->setFlash('Commande annulé');

						// On enregistre les données
						$this->Order->save(array(
							'state' 	=> 0,
						));
						return $this->redirect(array('controller' => 'orders', 'action' => 'index'));

					}
			}
			else {
				throw new NotFoundException;
			}
		//
		}


		// ####### PANEL ADMIN ########

		public function admin_index() {
			$this->layout = 'admin'; // Layout admin


			// On demande toutes les commandes utilisateurs
			$orders = $this->Order->find('all');

			if(!empty($orders)){
				$this->set(compact('orders'));
			}
			else {
				$this->Session->setFlash('Aucune commande');
			}

			//$livraison = $this->Order->find('all');
			//debug($livraison);

			//echo $livraison[0]['Deliveries'][0]['user_id'];
		}

		// Editer une commande 
		public function admin_edit($order_id) {
			$this->layout = 'admin'; // Layout admin

			
			$order_edit = $this->Order->find('first', 
				array(
					'conditions' => 
					array(
						'id' => $order_id, 
					) 
				) 
			);

			if(!empty($order_edit)){

				// On traite le formulaire
				if(!empty($this->request->data)){
					$this->Order->id = $order_id;

					if($this->Order->validates() ){


						$this->Session->setFlash('Données correctement sauvegardées');

						$this->Order->save(array(
							'nb_bacs'				=> $this->request->data['Orders']['nb_bacs'],
						));
					}
				}

				// On affiche les données
				$order = $this->Order->find('first',
					array(
							'conditions' =>
							array(
									'id' => $order_id,
								)

						)
					);
					$this->set(compact('order'));
			}
			// sinon erreur 404
			else {
				throw new NotFoundException;
			}
		}


}

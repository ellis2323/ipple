<?php
App::uses('AppController', 'Controller');


class OrdersController extends AppController {



		// Autorisation
		public function beforeFilter() {

			parent::beforeFilter();
			$this->Auth->deny();
		}

		/* Liste des commandes utilisateur */
		public function index() {

			// On demande toutes les commandes utilisateurs
			$orders = $this->Order->find('all', 
				array(
					'conditions' => 
					array(
						'user_id' => $this->Session->read('Auth.User.id')) 
					) 
			);

			if(!empty($commandes)){

				// Si on a des commandes on liste les commandes
				$this->set(compact('orders'));
			}
		}

}

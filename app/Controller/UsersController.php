<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class UsersController extends AppController {


	// Before controller
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('register', 'activate', 'login', 'logout', 'forgot', 'newpassword');
		//$this->Auth->deny('my_account', 'my_bacs', 'edit_password');
	}


	// User : Dashboard
	public function index() {
						
	}
	

	// User : Enregistrer
	public function register() {
		
		// If user already connected
		if($this->Session->read('Auth.User.id')) {
			$this->redirect('/');
			return;
		}
		
		// If request data is not empty
		if(empty($this->request->data)) {
			return;
		}
			
			
		// Create activation token
		$token = md5(time() .' - '. uniqid());
		
		
		// Set user
		$this->User->create(array(
			"email" 			=> $this->request->data['User']['email'],
			"password" 			=> $this->Auth->password($this->request->data['User']['password']),
			"password2" 		=> $this->Auth->password($this->request->data['User']['password2']),
			"activation_token"	=> $token,
			"creation_date"		=> date('Y-m-d H:i:s'),
			"last_update"		=> date('Y-m-d H:i:s')
		));
		
		// If data is not validate
		if(!$this->User->validates()) {
			$this->Session->setFlash("Erreur, merci de corriger", 'alert', array('class' => 'danger'));
			return;
		}
		

		// Save user
		$this->User->data = $this->User->save();
		

		// Send activation mail
		$CakeEmail = new CakeEmail('default');
		$CakeEmail->template('register');
		$CakeEmail->emailFormat('text');
		$CakeEmail->from('contact@dezordre.com', 'Dezordre');
		$CakeEmail->to($this->User->data['User']['email']);
		$CakeEmail->subject('Dezordre: Confirmation d\'inscription');
		$CakeEmail->viewVars(array(
			'email'	=> $this->User->data['User']['email'],
			'token' => $token,
			'id'	=> $this->User->id
		));
		$CakeEmail->send();


		// Return result
		$this->Session->setFlash("Votre compte à bien été créer. Un lien vous à été envoyé par email afin d'activer votre compte.", 'alert', array('class' => 'success'));
		$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
		return;
		
	}
	
	
	// User : Activer compte
	public function activate($id, $activation_token) {

		// If params not set
		if(!isset($id) || !isset($activation_token)) {
			$this->redirect('/');
			return;
		}
		
		// If user already connected
		if($this->Session->read('Auth.User.id')){
			$this->redirect('/');
			return;
		}
		
		
		// Check if token is correct
		$user = $this->User->find('first', array(
			'fields'		=> array('id'),
			'conditions'	=> array(
				'id' 				=> $id,
				'activation_token' 	=> $activation_token
			)
		));

		// If token is incorrect
		if(empty($user)) {
			$this->Session->setFlash('Ce lien d\'activation est incorrect', 'alert', array('class' => 'danger'));
			$this->redirect('/');
			return;
		}


		// Update user
		$this->User->save(array(
			'id' 				=> $user['User']['id'],
			'active'			=> 1,
			'activation_token'	=> NULL,
			"last_update"		=> date('Y-m-d H:i:s')
		));
		
		// Return result
		$this->Session->setFlash('Votre compte a bien été activé', 'alert', array('class' => 'success'));
		$this->redirect(array('action' => 'login'));
		return;

	}
	
	
	// User : Login
	public function login() {

		// If params not set
		if(!$this->request->is('post')) {
			return;
		}
		
		// If user already connected
		if($this->Session->read('Auth.User.id')){
			$this->redirect('/');
			return;
		}
		
		// If wrong datas
		if(!$this->Auth->login()) {
			$this->Session->setFlash('Identifiants incorrects', 'alert', array('class' => 'danger'));
			return;
		}
		
		// Return result
		$this->Session->setFlash('Vous avez été correctement connecté', 'alert', array('class' => 'success'));
		$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
		return;

	}
	
	
	// User : Logout
	public function logout() {

		// If already logout
		if(!$this->Session->read('Auth.User.id')) {
			return;
		}
		
		// Logout
		$this->Auth->logout();
		$this->Session->setFlash('Déconnecté', 'alert', array('class' => 'success'));
		$this->redirect('/');
		return;

	}
	
	// User : Forgot password
	public function forgot() {

		// If params not set
		if(!$this->request->is('post')) {
			return;
		}
		
		// If user already connected
		if($this->Session->read('Auth.User.id')){
			$this->redirect('/');
			return;
		}
		
		// Get user
		$user = $this->User->findByEmail($this->request->data['User']['email'], array('id'));
		
		// If user does not exist
		if(empty($user)){
			$this->Session->setFlash("L'adresse email n'a pas été trouvé", 'alert', array('class' => 'danger'));
			return;
		}
		
		// Generate and save token
		$token = md5(time() .' - '. uniqid());
		$this->User->data = $this->User->save(array(
			'id' 				=> $user['User']['id'],
			'activation_token'	=> $token,
			"last_update"		=> date('Y-m-d H:i:s')
		));
		
		// Send activation mail
		$CakeEmail = new CakeEmail('default');
		$CakeEmail->template('forgot');
		$CakeEmail->emailFormat('text');
		$CakeEmail->from('contact@dezordre.com', 'Dezordre');
		$CakeEmail->to($this->request->data['User']['email']);
		$CakeEmail->subject('Dezordre: Régénérer votre mot de passe');
		$CakeEmail->viewVars(array(
			'token' => $token,
			'id'	=> $this->User->id
		));
		$CakeEmail->send();

		// Return result
		$this->Session->setFlash("Un mail vous a été envoyé afin de regénérer votre mot de passe", 'alert', array('class' => 'success'));
		$this->redirect(array('action' => 'login'));
		return;

	}
	
	
	// User : Generate new password
	public function newpassword($id, $activation_token) {

		// If params not set
		if(!isset($id) || !isset($activation_token)) {
			$this->redirect('/');
			return;
		}
		
		// If user already connected
		if($this->Session->read('Auth.User.id')){
			$this->redirect('/');
			return;
		}

		// If params not set
		if(!$this->request->is('post')) {
			return;
		}
		
		// Check if token is correct
		$user = $this->User->find('first', array(
			'fields'		=> array('id'),
			'conditions'	=> array(
				'id' 				=> $id,
				'activation_token' 	=> $activation_token
			)
		));

		// If token is incorrect
		if(empty($user)) {
			$this->Session->setFlash('Ce lien de génération de nouveau mot de passe est incorrect', 'alert', array('class' => 'danger'));
			$this->redirect('/');
			return;
		}
		
		
		// Set user
		$this->User->set(array(
			'id' 				=> $user['User']['id'],
			'password'			=> $this->Auth->password($this->request->data['User']['password']),
			'password2'			=> $this->Auth->password($this->request->data['User']['password2']),
			'activation_token'	=> NULL,
			"last_update"		=> date('Y-m-d H:i:s')
		));
		
		// If data is not validate
		if(!$this->User->validates()) {
			$this->Session->setFlash("Erreur, merci de corriger", 'alert', array('class' => 'danger'));
			return;
		}
		
		// Update user
		$this->User->save();
			
		// Return result	
		$this->Session->setFlash('Mot de passe correctement modifié', 'alert', array('class' => 'success'));
		$this->redirect(array('action' => 'login'));
		return;
		
	}
		
}
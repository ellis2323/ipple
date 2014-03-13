<?php
App::uses('AppController','Controller');
class UsersController extends AppController{

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('signup','login','activate','forgot','password');
    }

    public function account(){
        if (!empty($this->request->data)) {
            $this->request->data['User']['id'] = $this->Auth->user('id');
            $this->User->create($this->request->data);
            if($this->User->validates()){
                $this->User->create();
                $this->User->save($this->request->data, true, array('firstname','lastname'));

                if(!empty($this->request->data['User']['avatarf']['tmp_name'])){
                    $directory = IMAGES . 'avatars' . DS . ceil($this->User->id / 1000);
                    if(!file_exists($directory))
                        mkdir($directory, 0777);
                    move_uploaded_file($this->request->data['User']['avatarf']['tmp_name'], $directory . DS . $this->User->id . '.jpg');
                    $this->User->saveField('avatar', 1);
                }

                $user = $this->User->read();
                $this->Auth->login($user['User']);

                $this->Session->setFlash("Vos informations ont bien été modifiées","flash", array('class' => 'success'));
            }
        }else{
            $this->User->id = $this->Auth->user('id');
            $this->request->data = $this->User->read();
        }
    }

    public function login(){
        if (!empty($this->request->data)) {
            if ($this->Auth->login()) {
                $this->Session->setFlash("Vous êtes maintenant connecté","flash", array('class' => 'success'));
            }else{
                $this->Session->setFlash("Identifiants incorrects","flash", array('class' => 'error'));
            }
        }
    }

    public function logout(){
        $this->Auth->logout();
        return $this->redirect('/');
    }

    public function signup(){
        if (!empty($this->request->data)) {
            $this->User->create($this->request->data);
            if($this->User->validates()){
                $token = md5(time() . ' - ' . uniqid());
                $this->User->create(array(
                    'username' => $this->request->data['User']['username'],
                    'password' => $this->Auth->password($this->request->data['User']['password']),
                    'mail'     => $this->request->data['User']['mail'],
                    'token'    => $token
                ));
                $this->User->save();

                App::uses('CakeEmail', 'Network/Email');
                $CakeEmail = new CakeEmail('default');
                $CakeEmail->to($this->request->data['User']['mail']);
                $CakeEmail->subject('Votre inscription Petsy');
                $CakeEmail->viewVars(
                    $this->request->data['User'] +
                    array(
                        'token' => $token,
                        'id' => $this->User->id
                    )
                );
                $CakeEmail->emailFormat('text');
                $CakeEmail->template('signup');
                $CakeEmail->send();

                $this->Session->setFlash('Merci vous êtes inscrit');
            }else{
                $this->Session->setFlash('Merci de corriger vos erreurs', 'flash', array('class' => 'error'));
            }
        }
    }

    /**
     * Permet de regénérer un mot de passe pour un utilisateur
     */
    public function forgot(){
        if (!empty($this->request->data)) {
            $user = $this->User->findByMail($this->request->data['User']['mail'], array('id'));
            if(empty($user)){
                $this->Session->setFlash("Ce email n'est associé a aucun compte","flash", array('class' => 'error'));
            }else{
                $token = md5(uniqid().time());
                $this->User->id = $user['User']['id'];
                $this->User->saveField('token', $token);

                App::uses('CakeEmail', 'Network/Email');
                $cakeMail = new CakeEmail('default');
                $cakeMail->to($this->request->data['User']['mail']);
                $cakeMail->subject('Régénération de mot de passe');
                $cakeMail->template('password');
                $cakeMail->viewVars(array('token' => $token, 'id' => $user['User']['id']));
                $cakeMail->emailFormat('text');
                $cakeMail->send();

                $this->Session->setFlash("Un email vous a été envoyé avec les instructions pour regénérer votre mot de passe","flash", array('class' => 'success'));
            }
        }
    }

    public function password($user_id, $token){
        $user = $this->User->find('first', array(
            'fields'     => array('id'),
            'conditions' => array('id' => $user_id, 'token' => $token)
        ));
        if (empty($user)) {
            $this->Session->setFlash('Ce lien ne semble pas bon');
            return $this->redirect(array('action' => 'forgot'));
        }
        if(!empty($this->request->data)){
            $this->User->create($this->request->data);
            if($this->User->validates()){
                $this->User->create();
                $this->User->save(array(
                    'id' => $user['User']['id'],
                    'token' => '',
                    'active' => 1,
                    'password' => $this->Auth->password($this->request->data['User']['password'])
                ));
                $this->Session->setFlash("Votre mot de passe a bien été modifié","flash", array('class' => 'success'));
                return $this->redirect(array('action' => 'login'));
            }
        }
    }

    public function activate($user_id, $token){
        $user = $this->User->find('first', array(
            'fields'     => array('id'),
            'conditions' => array('id' => $user_id, 'token' => $token)
        ));
        if (empty($user)) {
            $this->Session->setFlash('Ce lien de validation ne semble pas bon');
            return $this->redirect('/');
        }
        $this->Session->setFlash('Votre compte a bien été validé');
        $this->User->save(array(
            'id'     => $user['User']['id'],
            'active' => 1,
            'token'  => ''
        ));
        return $this->redirect(array('action' => 'login'));
    }

}
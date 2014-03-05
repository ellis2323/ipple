<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {


	public $displayField = 'email';



	public $hasMany = array(
		'Bacs' => array(
			'className' => 'Bacs',
			'foreignKey' => 'id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(

		// Validation de l'email
		'email' => array( 
			'notEmpty' => array(
				'rule' => 'notEmpty',
			),

			'email' => array(
				'rule' => 'email',
				'message' => "veuillez entrer un email valide"

			),
			'isUniq' => array(

				'rule' => 'isUnique',
				'message' => " Un compte avec cet email existe déjà",
				)
		),

		// Validation du password
		'password' => array(
			'rule' => 'notEmpty',
			'message' => 'Merci de mettre un mot de passe'
		),

		// Confirmation du password
		'password2' => array(
			'rule' => 'identicalFields',
			'message' => 'Les mots de passe diffèrent'
		),

		// Validation du nom
		'lastname' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
			),

			'alpha' => array(
				'rule' => '/^[a-zàâçéèêëîïôûùüÿñæœ .-]*$/i',
				'message' => "veuillez entrer un nom valide"

			),
		),

		// Validation du prenom
		'firstname' => array(
							'notEmpty' => array(
				'rule' => 'notEmpty',
			),

			'email' => array(
				'rule' => '/^[a-zàâçéèêëîïôûùüÿñæœ .-]*$/i',
				'message' => "veuillez entrer un prenom valide"

			),
		)



	// Fin du array	
	);


	public function identicalFields($check, $limit){
		return $check['password2'] == $this->data['User']['password'];
	}

}

<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';

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
		'nom' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
			),

			'alpha' => array(
				'rule' => '/^[a-zàâçéèêëîïôûùüÿñæœ .-]*$/i',
				'message' => "veuillez entrer un nom valide"

			),
		),

		// Validation du prenom
		'prenom' => array(
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

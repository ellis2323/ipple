<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {


	public $displayField = 'email';



	public $hasMany = array('Order' => array('dependent' => true), 'Bac');


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
				'message' => "Veuillez entrer un email valide"
			),
			'isUniq' => array(

				'rule' => 'isUnique',
				'message' => " Un compte avec cet email existe déjà",
				)
		),

		// Vérification du password
        'password' => array(
            'rule' => 'notEmpty',
            'message' => 'Veuillez entrer un mot de passe'
        ),
        'password2' => array(
            'rule' => 'identicalFields',
            'required' => false,
            'message' => 'Les mot de passe diffèrent'
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
        $field = key($check);
        return $check[$field] == $this->data['User']['password'];
    }
}

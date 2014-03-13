<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property User $User
 */
class Address extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'street';


/**
 * belongsTo associations
 *
 * @var array
 */


	// Une adresse à plusieurs livraisons et plusieurs commandes

	// Une adresse à une ville et un code postal
	public $hasOne = array('Postal','City');


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Utilisateur invalide',
			),
		),

		'firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Veuillez choisir un prénom',
			),
		),

		'lastname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Veuillez préciser un nom',
			),
		),

		'city' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Veuillez choisir une ville valide',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Veuillez choisir une ville',
			),
		),

		'company' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Veuillez choisir un code postal',
			),
		),

		'postal' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Veuillez choisir un code postal valide',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Veuillez choisir un code postal',
			),
		),

		'street' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Veuillez définir une adresse.',
			),

		),

		'etage' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Veuillez préciser votre étage',			
				),
		),

		'tel' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Veuillez entrer votre numéro de téléphone.',
			),
		),



	// Validates
	);


	public function requireNotEmpty($data, $shouldNotBeEmpty) {
	    return !empty($this->data[$this->name][$shouldNotBeEmpty]);
	}

}

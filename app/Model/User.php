<?php

App::uses('AppModel', 'Model');

class User extends AppModel {
	
	// Nom table
	public $useTable = 'user';

	// Label pour l'enregistrement
	public $displayField = 'email';


	// Relations table
	public $hasMany = array(
		'Order' => array(
            'className' 	=> 'Order',
            'foreignKey' 	=> 'user_id',
			'dependent' 	=> true
		), 
		'Box' => array(
            'className' 	=> 'Box',
            'foreignKey' 	=> 'user_id',
			'dependent' 	=> true
		), 
		'Address' => array(
            'className' 	=> 'Address',
            'foreignKey' 	=> 'user_id',
			'dependent' 	=> true
		)
	);
	
	
	// Validations des données
	public $validate = array(
	
		# id
		'id' => array(
			'Id invalide'		=> array(
				'rule' 		=> 'numeric',
				'required'	=> 'update'
			)
		),
	
		# email
		'email' => array(
			'Email invalide' 	=> array(
				'rule' 		=> 'email',
				'required'	=> 'create'
			),
			'Email déjà existant' => array(
				'rule' 		=> 'isUnique'
			)
		),
	
		# password
		'password' => array(
			'Mot de passe invalide'	=> array(
				'rule' 		=> 'notEmpty'
			),
            'Mots de passe différants' => array(
				'rule' 		=> array('equalToField', 'password2'),
				'required'	=> 'create'
			)
		),
		
		# name
		'first_name' => array(
			'Prenom invalide' 	=> array(
				'rule' 		=> '/^[a-zàâçéèêëîïôûùüÿñæœ .-]+$/i',
				'required'	=> false
			)
		),
		'last_name' 	=> array(
			'Nom invalide' 	=> array(
				'rule' 		=> '/^[a-zàâçéèêëîïôûùüÿñæœ .-]+$/i',
				'required'	=> false
			)
		),
		
		# options
		'role' => array(
			'rule' 			=> 'numeric',
			'required'		=> 'create',
			'allowEmpty'	=> true
			
		),
		'active' 	=> array(
			'rule' 			=> 'boolean',
			'required'		=> 'create',
			'allowEmpty'	=> true
		),
		'activation_token' 	=> array(
			'rule' 			=> 'notEmpty',
			'required'		=> 'create',
			'allowEmpty'	=> true
		),
		
		# datetime
		'creation_date' => array(
			'Date de création invalide' => array(
				'rule' 			=> array('datetime', 'ymd'),
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		'last_update' => array(
			'Date de modification invalide' => array(
				'rule' 			=> array('datetime', 'ymd'),
				'required'		=> true,
				'allowEmpty'	=> false
			)
		)
		
	);
	
	// Check if equal to argument field
	public function equalToField($array, $field) {
		return strcmp($this->data[$this->alias][key($array)], $this->data[$this->alias][$field]) == 0;
	}
}

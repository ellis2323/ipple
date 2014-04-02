<?php

App::uses('AppModel', 'Model');


class Address extends AppModel {
	
	// Nom table
	public $useTable = 'address';

	// Label pour l'enregistrement
	public $displayField = 'street';


	// Relations table
	public $belongsTo = array(
		'User' => array(
            'className' 	=> 'User',
            'foreignKey' 	=> 'user_id'
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
		
		# name
		'first_name' => array(
			'Prenom invalide' 	=> array(
				'rule' 		=> '/^[a-zàâçéèêëîïôûùüÿñæœ .-]+$/i',
				'required'	=> 'create'
			)
		),
		'last_name' 	=> array(
			'Nom invalide' 	=> array(
				'rule' 		=> '/^[a-zàâçéèêëîïôûùüÿñæœ .-]+$/i',
				'required'	=> 'create'
			)
		),
		
		# infos
		'company' 	=> array(
			'Société invalide' 	=> array(
				'rule' 		=> '/^[a-zàâçéèêëîïôûùüÿñæœ .-]+$/i',
				'required'	=> false
			)
		),
		'phone' 	=> array(
			'Téléphone invalide' 	=> array(
				'rule' 		=> '/^[0-9 .-\+\(\)]+$/i',
				'required'	=> false
			)
		),
		
		# address
		'street' => array(
			'rule' 		=> 'notEmpty',
			'required'	=> 'create'
		),
		'floor' => array(
			'allowEmpty'	=> true
		),
		'notes' => array(
			'allowEmpty'	=> true
		),
		'digicode' => array(
			'allowEmpty'	=> true
		),
		'zip' => array(
			'rule' 		=> 'notEmpty',
			'required'	=> 'create'
		),
		'city' => array(
			'Ville invalide' 	=> array(
				'rule' 		=> '/^[a-zàâçéèêëîïôûùüÿñæœ .-]+$/i',
				'required'	=> 'create'
			)
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
		),
		
		# foreign keys
		'user_id' => array(
			'Utilisateur invalide'	=> array(
				'rule' 		=> 'numeric',
				'required'	=> 'create'
			)
		)
		
	);

}

<?php

App::uses('AppModel', 'Model');

class Box extends AppModel {
	
	// Nom table
	public $useTable = 'box';

	// Label pour l'enregistrement
	public $displayField = 'sealed';


	// Relations table
	public $belongsTo = array(
		'User' => array(
            'className' 	=> 'User',
            'foreignKey' 	=> 'user_id'
        )
	);
	public $hasAndBelongsToMany = array(
		'Order' => array(
			'className' 			=> 'Box',
			'joinTable' 			=> 'order_box',
			'foreignKey' 			=> 'box_id',
			'associationForeignKey'	=> 'order_id',
			'unique' 				=> false
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
	
		# infos
		'title' => array(
			'Titre invalide' => array(
				'rule' 			=> 'notEmpty',
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		'description' => array(
			'allowEmpty'	=> true
		),
		'photo' => array(
			'allowEmpty'	=> true
		),
		'sealed' => array(
			'Scellé invalide' => array(
				'rule' 			=> 'notEmpty',
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		
		# options,
		'state' => array(
			'rule' 			=> 'notEmpty',
			'required'		=> 'create'
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

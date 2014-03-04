<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class Bac extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(

		// Validation du titre
		'title' => array( 
			'rule' => 'alphaNumeric',
		),
		// Validation de la description
		'description' => array( 
			'rule' => 'alphaNumeric',
		),

	// Fin du array	
	);



}

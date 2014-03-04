<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class Order extends AppModel {


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
		),


	// Fin du array	
	);


}

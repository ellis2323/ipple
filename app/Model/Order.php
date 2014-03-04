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


// Aftersave
//Si une livraison est associé à la commande, la mettre à jour (date) / A FAIRE
//J-1 > bloquer l'edition de commande


	public $validate = array(

		'nb_bacs' => array( 
			'rule' => 'naturalNumber',
		),
	// Fin du array	
	);


}

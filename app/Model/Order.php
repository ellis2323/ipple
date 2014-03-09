<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property User $User
 * @property Delivery $Delivery
 */
class Order extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';





	// Une commande peut avoir plusieurs livraisons
	public $hasMany = array(
	'Delivery' => array(

		'dependent' => true), 
	'Bac'
	);

	// Une commande apppartient à un user, et à une adresse
	public $belongsTo = array(
							'User' => array(
												'className' => 'User', 
											),
							'Address'
	);


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
								'nb_bacs' => array(
										'rule' => array('checkNbBac', 4),
										'message' => 'Vous devez prendre au moins 4 bacs'
								)
						);




	// Permet de vérifier le nombre de bacs minimum
	public function checkNbBac($data, $limit){

		return $data['nb_bacs'] >= $limit;
	}
}

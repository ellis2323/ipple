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

	public $belongsTo = array(
							'User' => array(
												'className' => 'User', 
											),
							'Address' => array(
												'className' => 'Address', 
											),
							);


	// Permet de vérifier le nombre de bacs minimum
	public function checkNbBac($data, $limit){

		return $data['nb_bacs'] >= $limit;
	}
}

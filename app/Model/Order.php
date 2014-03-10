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


	public $belongsTo = array(
							'User',
							'Address'
	);

	public $hasAndBelongsToMany = array('Bac');

	public $hasMany = array(
							'BacR' => array(
											'dependent' => true
											)
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

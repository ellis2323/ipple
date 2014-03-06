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
	public $validate = array();

	public $belongsTo = array(
							'User' => array(
												'className' => 'User', 
											),
							'Address' => array(
												'className' => 'Address', 
											),
							);

	

}

<?php
App::uses('AppModel', 'Model');
/**
 * Delivery Model
 *
 * @property Delivery $Delivery
 * @property Order $Order
 * @property Delivery $Delivery
 * @property BacDelivery $BacDelivery
 */
class Delivery extends AppModel {


	

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


	public $hasAndBelongsToMany = array('Bac');

	public $belongsTo = array('Order','Address', 'User');
	public $hasOne = array('DeliveryReturn' => 
										array(
											'className' => 'Delivery',
											'dependent' => true
											),
						);

	public $hasMany = array('BacR');





}

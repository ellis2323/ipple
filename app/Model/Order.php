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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
						'User' => array(
							'className' => 'User',
							'foreignKey' => 'user_id',
							'conditions' => '',
							'fields' => '',
							'order' => ''
						)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Delivery' => array(
			'className' => 'Delivery',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}

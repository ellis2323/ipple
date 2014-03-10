<?php
App::uses('AppModel', 'Model');
/**
 * Bac Model
 *
 * @property User $User
 * @property BacDelivery $BacDelivery
 * @property Lock $Lock
 */
class Bac extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'code';

	public $actsAs = array('Media.Media');


	
	
	public $hasMany = array(

		'Lock' => array(
			'className' => 'Lock',
			'foreignKey' => 'bac_id',
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


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(

		),
		'description' => array(

		),
		'state' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);




}

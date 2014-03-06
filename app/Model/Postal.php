<?php
App::uses('AppModel', 'Model');
/**
 * Postal Model
 *
 * @property Address $Address
 */
class Postal extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'label';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
/*
	public $belongsTo = array(
		'Address' => array(
			'className' => 'Address',
			'foreignKey' => 'postal_id',
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
*/
}

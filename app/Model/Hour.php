<?php
App::uses('AppModel', 'Model');
/**
 * TimeSlot Model
 *
 * @property Delivery $Delivery
 */
class Hour extends AppModel {

	public $virtualFields = array(
	    'hour' => 'CONCAT(Hour.start_hour, " - ", Hour.end_hour)'
	);
	public $displayField = 'hour';


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Delivery' => array(
			'className' => 'Delivery',
			'foreignKey' => 'hour_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'hour_id',
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

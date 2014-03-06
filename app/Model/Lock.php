<?php
App::uses('AppModel', 'Model');
/**
 * Lock Model
 *
 * @property Bac $Bac
 */
class Lock extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Bac' => array(
			'className' => 'Bac',
			'foreignKey' => 'bac_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

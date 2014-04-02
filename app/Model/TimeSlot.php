<?php

App::uses('AppModel', 'Model');


class TimeSlot extends AppModel {
	
	// Nom table
	public $useTable = 'time_slot';

	// Label pour l'enregistrement
	public $displayField = 'time';


	// Relations table
	public $hasMany = array(
		'Order' 	=> array(
			'className' 	=> 'Order',
			'foreignKey' 	=> 'hour_deposit',
			'dependent' 	=> false
		)
	);

	// Champs virtuels
	public $virtualFields = array(
	    'time' => 'CONCAT(SUBSTR(TimeSlot.start_hour, 0, 5), " - ", SUBSTR(TimeSlot.end_hour, 0, 5))'
	);

}

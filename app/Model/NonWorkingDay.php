<?php

App::uses('AppModel', 'Model');


class NonWorkingDay extends AppModel {

	// Nom table
	public $useTable = 'non_working_day';

	// Label pour l'enregistrement
	public $displayField = 'value';

}

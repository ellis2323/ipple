<?php

App::uses('AppModel', 'Model');


class Parameter extends AppModel {
	
	// Nom table
	public $useTable = 'parameter';

	// Label pour l'enregistrement
	public $displayField = 'value';

}

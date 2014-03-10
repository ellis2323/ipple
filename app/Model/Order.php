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


	public $belongsTo = array(
							'User',
							'Address'
	);

	public $hasAndBelongsToMany = array('Bac');

	public $hasMany = array(
							'BacR' => array(
											'dependent' => true
											)
							);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
								'nb_bacs' => array(
										'rule' => array('checkNbBac', 4),
										'message' => 'Vous devez prendre au moins 4 bacs'
								),
								'date_deposit' => array(
										'rule' => 'checkDate',
										'message' => 'La date selectionnée est indisponible'
								),
								'date_withdrawal' => array(
										'rule' => 'checkDate',
										'message' => 'La date selectionnée est indisponible'
								)
						);

	// Permet de vérifier le nombre de bacs minimum
	public function checkNbBac($data, $limit){
		return $data['nb_bacs'] >= $limit;
	}

	// Permet de vérifier la disponibilité de la date
	public function checkDate($data){
		//debug($data);

		// On charge le model contenant les dates bloquées
		App::import('Model','DatesBlock');
		$DatesBlock = new DatesBlock();

		// On convertis le datetime en timestamp
		foreach($data as $date){
			$date = strtotime($date);
		}

		// On définis nos attributs
		$day = date('j', $date); // Jour calendaire
		$day_week = date('w', $date); // Jour de la semaine
		$week = date('W', $date); // Semaine
		$month = date('n', $date); // Mois

		// On cherche si les attributs sont présent dans la table de blocage
		$day_block = $DatesBlock->findByValueAndType($day, 1);
		$week_block = $DatesBlock->findByValueAndType($week, 2);
		debug($week_block);
		$month_block = $DatesBlock->findByValueAndType($month, 3);
		$day_week_block = $DatesBlock->findByValueAndType($day_week, 4);

		// Si on trouve la date
		if(!empty($day_block) ||  !empty($month_block) || !empty($week_block) || !empty($day_week_block)){
			return false;
		}
		else {
			return true;
		}		

	}
	
	/*public function checkHour($data){
		// On charge le model contenant les blocages de créneaux
		App::import('Model','HoursBlock');
		$HoursBlock = new HoursBlock();

		// On convertis le datetime en timestamp
		$date = strtotime($data['date_deposit']);

		// On définis nos attributs
		$day = date('j', $date);
		$day_week = date('W', $date);
		$week = date('w', $date);
		$month = date('n', $date);

		$hour_id = $data['hour_deposit'];

		$day_block = $DatesBlock->findByValueAndType($day, 1);
		$week_block = $DatesBlock->findByValueAndType($week, 2);
		$month_block = $DatesBlock->findByValueAndType($month, 3);
		$day_week_block = $DatesBlock->findByValueAndType($day_week, 4);
	}*/

}

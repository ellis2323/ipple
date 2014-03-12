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
										'rule' => array('checkNbBac', 4, 10),
										'message' => 'Vous devez prendre au moins 4 bacs'
								),
								'date_deposit' => array(
														'CheckDate' =>array(
																			'rule' => 'checkDate',
																			'message' => 'La date de dépôt selectionnée est indisponible',
																		),
								),
								'date_withdrawal' => array(								
															'VerifDate' =>array(
																				'rule' => array('checkWithdraw', 'date_deposit'),
																				'message' => 'Vérifiez que la date de récupération est supérieur à la date de dépôt'
																			),
								)
						);

	/*'date_deposit' => array(
														'CheckDate' =>array(
																			'rule' => 'checkDate',
																			'message' => 'La date de dépôt selectionnée est indisponible',
																			'required' => true,
																		),
								),*/
	// Permet de vérifier le nombre de bacs minimum
	public function checkNbBac($data, $limit_min, $limit_max){

		// Ajouter la récupération du nombre de bac min et max dans la BDD
		if($data['nb_bacs'] >= $limit_min && $data['nb_bacs'] <= $limit_max){
			return true;
		}
		else {
			return false;
		}
	}

	// Permet de vérifier que la date de retrait est supérieur à la date de dépot
	public function checkWithdraw($data, $data_deposit){
		$deposit = $this->data[$this->name][$data_deposit];
		$deposit = new DateTime($deposit);

		// On convertis le datetime en timestamp
		foreach($data as $withdraw){
			$withdraw = new DateTime($withdraw);
		}

		$interval = $deposit->diff($withdraw);
		$valid = $interval->invert;
		
		if(empty($withdraw)){
			return true;
		}

		if($valid != 1){
			return true;
		}
		else {
			return false;
			
		}
	}

	// Permet de vérifier la disponibilité de la date
	public function checkDate($data){

		// On charge le model contenant les dates bloquées
		App::import('Model','DatesBlock');
		$DatesBlock = new DatesBlock();
		
		//$date = $data['date_deposit'];

		// On convertis le datetime en timestamp
		$date = array_shift($data);

		$date = new DateTime($date);
		$date = $date->getTimestamp();

		// On définis nos attributs
		/* On inverse le jour et le mois car date américaine */
		$day = date('n', $date); // Mois
		$month = date('d', $date); // Jour calendaire
		$day_week = date('w', $date); // Jour de la semaine
		$week = date('W', $date); // Semaine
		
		
		// On cherche si les attributs sont présent dans la table de blocage
		$day_block = $DatesBlock->findByValueAndType($day, 1);
		$week_block = $DatesBlock->findByValueAndType($week, 2);
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

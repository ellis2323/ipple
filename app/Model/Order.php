<?php
App::uses('AppModel', 'Model');
App::import('Model','DatesBlock');
App::import('Model','Param');
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
							'Address',

	);


	public $hasAndBelongsToMany = array('Bac');

	public $hasMany = array(
							'BacR' => array(
											'dependent' => true
											),

							);

	 

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
								'nb_bacs' => array(
												'MinBac' => array(
																'rule' => 'checkNbBacMin',
																'message' => "Vous n'avez pas pris assez de bacs.",
														),
												'MaxBac' => array(
																'rule' => 'checkNbBacMax',
																'message' => 'Vous avez pris trop de bacs.',
																),
								),
								'withdraw' => array(
													'rule' => 'notEmpty'
													),
								'cgv' => array(
												'rule' => 'notEmpty',

												),
								'date_deposit' => array(
														'CheckDate' =>array(
																			'rule' => 'checkDate',
																			'message' => 'La date selectionnée est indisponible',
																		),
								),
								'date_withdrawal' => array(								
														'CheckDate' =>array(
																			'rule' => 'checkDate',
																			'message' => 'La date selectionnée est indisponible',
																		),
								),

						);

	// Permet de vérifier le nombre de bacs minimum
	public function checkNbBacMin($data){

		$param = new Param();

		$nb_bac_min = $param->findByKey('nb_bac_min');
		$nb_bac_min = $nb_bac_min['Param']['value'];

		// Ajouter la récupération du nombre de bac min et max dans la BDD
		if($data['nb_bacs'] >= $nb_bac_min){
			return true;
		}
		else {
			return false;
		}
	}

	public function checkNbBacMax($data){

		$param = new Param();

		$nb_bac_max = $param->findByKey('nb_bac_max');
		$nb_bac_max = $nb_bac_max['Param']['value'];

		// Ajouter la récupération du nombre de bac min et max dans la BDD
		if($data['nb_bacs'] <= $nb_bac_max){
			return true;
		}
		else {
			return false;
		}
	}

	// Permet de vérifier que la date de retrait est supérieur à la date de dépot
	public function checkWithdraw($data, $data_deposit){
		$deposit = $this->data[$this->name][$data_deposit];

		// On convertis le datetime en timestamp
		foreach($data as $withdraw){
			$withdraw = strtotime($withdraw);
		}

		
		if($deposit < $withdraw){
			return true;
		}
		else {
			return false;
			
		}
	}

	// Permet de vérifier la disponibilité de la date
	public function checkDate($data){

		// On charge le model contenant les dates bloquées

		$DatesBlock = new DatesBlock();
		
		//$date = $data['date_deposit'];

		// On convertis le datetime en timestamp
		$date = array_shift($data);

		$date = strtotime($date);

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

	public function checkPhone($data){


		debug($data);
		#^0[1-68]([-. ]?[0-9]{2}){4}$#
	}

}

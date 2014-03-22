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
														'CheckDates' =>array(
																			'rule' => array('checkDate', null),
																			'message' => 'La date selectionnée est indisponible',
																		),
								),
								'date_withdrawal' => array(	
														'CheckWithdrawal' =>array(
																			'rule' => array('checkWithdraw', 'date_deposit', 'withdraw'),
																			'message' => 'Date de retrait inférieure',
																		),							
														'CheckDates' =>array(
																			'rule' => array('checkDate', 'withdraw'),
																			'message' => 'Date indisponible',
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

#############

	// Permet de vérifier que la date de retrait est supérieur à la date de dépot
	// $data = données du champs en validation
	// $date_deposit = champs associé pour vérifier la date
	// $state_withdraw = champs associé qui définis le type de commande (0 = retrait immédiat -> on passe la vérification / 1 retrait différé -> on vérifie)
	public function checkWithdraw($data, $date_deposit=NULL, $state_withdraw=NULL){

		# vérification de la validation via le champs $withdraw
		// Si $withdraw n'est pas nul (et contient donc le nom d'un champ)
		if($state_withdraw != NULL) {
			//print_r('Champs withdraw:'.$withdraw.'<br />');

			// On vérifie que la clé du champs existe dans le tableau des données postées
			if(array_key_exists($state_withdraw, $this->data[$this->name]) ) {

				// On récupère le type de récupération : immédiate (0) ou différé (1) 
				$state_withdraw = $this->data[$this->name][$withdraw];

				// Si la récupération est immédiate, alors on valide le champs (on ne le vérifie pas)
				if($state_withdraw == 0){
					return true;
				}
			}
		}

		# vérification de la date (dans le cas ou $state_withdraw == 1)
		// On vérifie que la clé $date_deposit existe dans le tableau de donnée postée, sinon on ne peux pas vérifier les dates
		if(array_key_exists($date_deposit, $this->data[$this->name])){

			// On récupère notre date date de dépot et date de retrait
			$date_deposit_value = $this->data[$this->name][$date_deposit];
			$date_withdraw = array_shift($data);

			// On convertis les dates en timestamp pour faciliter la vérification
			$date_withdraw_value = strtotime($date_withdraw); //
			$date_deposit_value = strtotime($date_deposit_value);

			// Si la date de dépot est inférieur à la date actuelle
			if($date_deposit_value < $date_withdraw_value){


				// On récupères la date minimum et la date maximum pour une livraison différé
				$Params = new Param();	// on charge le modèle des paramètres

				$max_date = $Params->findByKey('max_date_withdrawal');
				$max_date = $max_date['Param']['value'];

				$min_date = $Params->findByKey('min_date_deposit');
				$min_date = $min_date['Param']['value'];

				$day = (3600*24);

				$max_date_total = $date_deposit_value+($day*$max_date);
				$min_date_total = $date_deposit_value+($day*$min_date);


				// On vérifie que la date de retrait est inférieur au délai maximal, et supérieur au délai minimum
				if($date_withdraw_value < $max_date_total && $date_withdraw_value > $min_date_total) {
					return true;			
				}
				else{
					return false;
				}
			}
			// La de dépot est supérieur au retrait = impossible
			else {
				return false;
			}
		}
		// Le champs n'existe pas dans les données postées, le champs ne peux pas  être validé
		else {
			return false;
		}
	}

############

	// Permet de vérifier la disponibilité de la date
	// $data = données du champs en validation
	// $state_withdrawal = permet de vérifier le type de livraison, si retrait immédiat (0 =  ne pas vérifier date_withdrawal)
	public function checkDate($data, $state_withdrawal=NULL){

		# On  vérifie que la date doit être validé ou non
		// Si le champs $state_withdrawal est présent dans le tableau de données postées
		if(array_key_exists($state_withdrawal, $this->data[$this->name])){

			$state_withdrawal_value = $this->data[$this->name][$state_withdrawal];
			// Et que sa valeur est égale à 0 (retrait immédiat) alors on saute la vérification
			if($state_withdrawal_value == 0){
				return true;
			}
		}

		# La date doit être validé
		// On charge le model contenant les dates bloquée
		$DatesBlock = new DatesBlock();

		// On récupère la première valeur du tableau et on la convertis en timestamp
		$date = array_shift($data); 
		$date = strtotime($date);

		// On récupères le timestamp du jour
		$today = time();

		// On définis nos attributs
		$day = date('d', $date); // Date du mois bloqué
		$month = date('n', $date); // Mois
		$day_week = date('w', $date); // Jour de la semaine
		$week = date('W', $date); // Semaine
		
		// On cherche si les attributs sont présent dans la table de blocage
		$day_block = $DatesBlock->findByValueAndType($day, 1); // Date du mois bloqué
		$week_block = $DatesBlock->findByValueAndType($week, 2); // Semaine bloqué
		$month_block = $DatesBlock->findByValueAndType($month, 3); // Mois bloqué
		$day_week_block = $DatesBlock->findByValueAndType($day_week, 4); // Jour de la semaine bloqué


		// Si on trouve la date , la validation échoue
		if(!empty($day_block) ||  !empty($month_block) || !empty($week_block) || !empty($day_week_block)){
			return false;
		}
		// Sinon
		else {
			// On vérifie que la date soit supérieur à aujourd'hui
			if($date > $today ) {
				return true;
			}
			else {
				return false;
			}
		}		

	}



}

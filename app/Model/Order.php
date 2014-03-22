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
																			'rule' => array('checkWithdraw', 'date_deposit', 'state_withdrawal'),
																			'message' => 'Date de retrait inférieure',
																		),							
														'CheckDates' =>array(
																			'rule' => array('checkDate', 'state_withdrawal'),
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

	// Permet de vérifier que la date de retrait est supérieur à la date de dépot
	public function checkWithdraw($data, $field=NULL, $withdraw=NULL){
        error_log("checkWithdraw data:".serialize($data)." field:".serialize($field)." withdraw:".serialize($withdraw), 0);

		if($withdraw != NULL) {
			//print_r('Champs withdraw:'.$withdraw.'<br />');

			if(array_key_exists($withdraw, $this->data[$this->name]) ) {

				$data_withdraw = $this->data[$this->name][$withdraw];

				if(!$data_withdraw){
                    error_log('checkwith state withdra = 0 ', 0);
                    error_log('Data withdraw win'.serialize($data_withdraw), 0);
					return true;
				}

			}
            else {
                error_log(serialize($this->data), 0);
                error_log('clé inexistante', 0);
            }
		}

		if(array_key_exists($field, $this->data[$this->name])){
			$deposit = $this->data[$this->name][$field];

			// On convertis le datetime en timestamp
			$withdraw = strtotime($data['date_withdrawal']);
			$deposit = strtotime($deposit);

			if($deposit < $withdraw){
				return true;
			}
			else {


				return false;
			}
		}
		else {

			return true;
		}	
	}

	// Permet de vérifier la disponibilité de la date
	public function checkDate($data, $field=NULL){
        error_log("data:".serialize($data)." field:".serialize($field), 0);


		if(array_key_exists($field, $this->data[$this->name])){
			if($this->data[$this->name][$field] == 0){
                error_log('checkdate state_withdraw = 0', 0);
				return true;
			}

		}

		// On charge le model contenant les dates bloquées
		$params = new Param();
		$DatesBlock = new DatesBlock();
		
		//$date = $data['date_deposit'];
		$max_date = $params->findByKey('max_date_withdrawal');
		$max_date = $max_date['Param']['value'];

		$min_date = $params->findByKey('min_date_deposit');
		$min_date = $min_date['Param']['value'];

		// On convertis le datetime en timestamp
		$date = array();
		$date = $data;
		$date = array_shift($date);

		/*print_r('0.Date before strtotime:');
		print_r($date);
		print_r('<br />');*/

		$date = strtotime($date);
		$today = time();
		if(array_key_exists('date_deposit', $this->data[$this->name])){
            error_log('date_deposit exist');
			$date_deposit = $this->data[$this->name]['date_deposit'];
		}
		else {
			$order = new Order();
			$order_id= $order->findById($this->data[$this->name]['id']);
            error_log('date_deposit false');
			$date_deposit = $order_id[$this->name]['date_deposit'];
		}
		$date_deposit = strtotime($date_deposit);
		/*echo "1: <br />";
		print_r($this->data);
		echo "<br />";*/


		// On définis nos attributs
		$day = date('d', $date); // Jour calendaire
		$month = date('n', $date); // Mois
		$day_week = date('w', $date); // Jour de la semaine
		$week = date('W', $date); // Semaine
		
		
		// On cherche si les attributs sont présent dans la table de blocage
		$day_block = $DatesBlock->findByValueAndType($day, 1);
		$week_block = $DatesBlock->findByValueAndType($week, 2);
		$month_block = $DatesBlock->findByValueAndType($month, 3);
		$day_week_block = $DatesBlock->findByValueAndType($day_week, 4);


		$max_date_total = $date_deposit+((3600*24)*$max_date);

		// Si on trouve la date
		if(!empty($day_block) ||  !empty($month_block) || !empty($week_block) || !empty($day_week_block)){
            error_log('date bloquée', 0);
            return false;

		}
		else {
			// on vérifie la date de retrait
			if(array_key_exists('date_withdrawal', $data)) {
				if($date < $max_date_total ) {
                    error_log('+ que max date', 0);
					return true;			
				}
				else{
                    error_log('date de retrait inférieur', 0);
					/*print_r('1.Date:');
					print_r($date);
					print_r('<br />');
					print_r('2.Date max:');
					print_r($max_date_total) ;
					print_r('<br />');
					print_r('3.Today:');
					print_r($today) ;
					print_r('<br />');*/
					return false;
				}
			}
			else {
				// On vérifie que la date est supérieur à aujourd'hui
				if($date > $today ) {
                    error_log('> today', 0);
					return true;
				}
				else {
                    error_log('< today', 0);
					return false;
				}
			}
		}		

	}



}

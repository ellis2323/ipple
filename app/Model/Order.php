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
														'checkDate' =>array(
																			'rule' => array('checkDate'),
																			'message' => 'La date selectionnée est indisponible',
																		),
								),
								'date_withdrawal' => array(	
														'CheckWithdrawal' =>array(
																			'rule' => array('checkWithdraw'),
																			'message' => 'Date de retrait incorrecte',
																		),							
														'CheckDate' =>array(
																			'rule' => array('checkDate'),
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

       // On récupère la première valeur du tableau
       $date_withdrawal = strtotime(array_shift($data));

        // 1) Si le champs associé $withdraw est renseigné
		if($withdraw != NULL) {
            error_log('$withdraw non null');
            // Et qu'il existe dans le tableau de donnée
			if(array_key_exists($withdraw, $this->data[$this->name]) ) {
                error_log('$withdraw dans $this->data');
				$data_withdraw = $this->data[$this->name][$withdraw];

                // Et qu'il est égal à false (0)
				if(!$data_withdraw){
                    error_log('$withdraw state == 0');
					return true; // On ne vérifie pas le champs (retrait immédiat)
				}
                else {
                    error_log('$withdraw state == 1');
                }

			}
            else {
                error_log('$withdraw PAS dans $this->data');
            }
		}

        // 2) Si le champs $field est renseigné
        if($field != NULL) {
        error_log('$field non null');

            // et qu'il est présent dans le tableau de donnée
            if(array_key_exists($field, $this->data[$this->name])){
                error_log('$field présent dans $this->data');

                // On récupère sa valeur
                $date_deposit = $this->data[$this->name][$field];
                error_log(serialize($date_deposit));

            }
            else {
                error_log('$field non présent, requete BDD');
                $order = new Order();
                $order_date_deposit = $order->find('first', array(
                                                                   'conditions' => array(
                                                                                            'Order.id' => $this->data[$this->name]['id'],
                                                                   ),
                ));

                $date_deposit = $order_date_deposit[$this->name][$field];
                error_log(serialize($date_deposit));
            }

            // Et on convertis la date en timestamp
            $date_deposit = strtotime($date_deposit);
        }
        else {
            error_log('$field null, on ne peux pas comparer');
            return false;
        }


        error_log('$field null');

        // 3) On vérifie que la date de retrait est supérieur à la date de dépot
        if($date_withdrawal > $date_deposit){
            error_log('WIN $date_withdrawal > $date_deposit');

            // On récupère les paramètres dans la BDD
            $params = new Param();
            $max = $params->findByKey('max_date_withdrawal');
            $max_date = $max['Param']['value'];

            $min = $params->findByKey('min_date_deposit');
            $min_date = $min['Param']['value'];

            $day = (3600*24); // sec dans un day
            $max_date_withdrawal = $date_deposit+($day*$max_date); // date maximal de retrait en timestamp par rapport à date deposit

            if($date_withdrawal < $max_date_withdrawal){
                error_log('WIN $date_withdrawal < $max_date_withdrawal');

                return true;
            }
            else {
                error_log('FAIL $date_withdrawal > $max_date_withdrawal');
                return false;
            }
        }
        else {
            error_log('FAIL $date_withdrawal < $date_deposit');
            return false;
        }
	}

	// Permet de vérifier la validité de la date
	public function checkDate($data){
        error_log("checkdate data:".serialize($data), 0);

		// On charge le model contenant les dates bloquées
		$DatesBlock = new DatesBlock();


		// On convertis le datetime en timestamp
		$date = array();
		$date = $data;
		$date = array_shift($date);

		/*print_r('0.Date before strtotime:');
		print_r($date);
		print_r('<br />');*/

         // timestamp de notre date $data
		$date = strtotime($date);
		$today = time();
		if(array_key_exists('date_deposit', $this->data[$this->name])){
            error_log('date_deposit dans le tableau de data');
			$date_deposit = $this->data[$this->name]['date_deposit'];
		}
		else {
            error_log('date_deposit pas dans data');
            $order = new Order();
			$order_id= $order->findById($this->data[$this->name]['id']);
			$date_deposit = $order_id[$this->name]['date_deposit'];
		}
		$date_deposit = strtotime($date_deposit);
		/*echo "1: <br />";
		print_r($this->data);
		echo "<br />";*/

        // Valeur de la date de dépot associé
        $date_deposit_value = $date_deposit/(24*3600);

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


        $dates_block = $DatesBlock->findAllByType(5); // On récupère toues l es dates en timestamp
        //$date_block_max = $date_block + (3600*24);

		// Si on trouve la date
		if(!empty($day_block) ||  !empty($month_block) || !empty($week_block) || !empty($day_week_block)){
            return false;
		}
		else {
            $date_value = round( $date/(3600*24) );

            foreach($dates_block as $date_block){

                $date_block_value =  round($date_block['DatesBlock']['value']/(3600*24) );
               // debug($date_value);

                if($date_value == $date_block_value){
                    error_log('date bloquée', 0);
                    return false;
                }


            }

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

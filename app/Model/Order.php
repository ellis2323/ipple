<?php

App::uses('AppModel', 'Model');
App::import('Model', 'NonWorkingDate');
App::import('Model', 'TimeSlot');
App::import('Model', 'Parameter');


class Order extends AppModel {
	
	// Nom table
	public $useTable = 'order';

	// Label pour l'enregistrement
	public $displayField = 'id';


	// Relations table
	public $belongsTo = array(
		'Address' => array(
            'className' 	=> 'Address',
            'foreignKey' 	=> 'address_id'
        ),
		'User' => array(
            'className' 	=> 'User',
            'foreignKey' 	=> 'user_id'
        ),
		'DepositTimeSlot' => array(
            'className' 	=> 'TimeSlot',
            'foreignKey' 	=> 'deposit_time_slot'
        ),
		'WithdrawalTimeSlot' => array(
            'className' 	=> 'TimeSlot',
            'foreignKey' 	=> 'withdrawal_time_slot'
        )
	);
	public $hasAndBelongsToMany = array(
		'Box' => array(
			'className' 			=> 'Box',
			'joinTable' 			=> 'order_box',
			'foreignKey' 			=> 'order_id',
			'associationForeignKey'	=> 'box_id',
			'unique' 				=> false
		)
	);
	
	
	// Validations des données
	public $validate = array(
	
		# id
		'id' => array(
			'Id invalide'		=> array(
				'rule' 		=> 'numeric',
				'required'	=> 'update'
			)
		),
	
		# deposit
		'deposit_date' => array(
			'Date de dépot invalide' => array(
				'rule' 			=> array('openedDate', 'deposit'),
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		'deposit_time_slot' => array(
			'Plage horaire de dépot invalide' => array(
				'rule' 			=> array('openedTimeSlot', 'deposit'),
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		'deposit_concierge' => array(
			'rule' 			=> 'boolean',
			'allowEmpty'	=> true
		),
	
		# withdrawal
		'withdrawal_date' => array(
			'Date de retrait invalide' => array(
				'rule' 			=> array('openedDate', 'withdrawal'),
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		'withdrawal_time_slot' => array(
			'Plage horaire de retrait invalide' => array(
				'rule' 			=> array('openedTimeSlot', 'withdrawal'),
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		'withdrawal_concierge' => array(
			'rule' 			=> 'boolean',
			'allowEmpty'	=> true
		),
		
		# options
		'empty_box_number' => array(
			'Nombre de boites vides invalide' => array(
				'rule' 			=> array('valideBoxNumber'),
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		'state' => array(
			'rule' 			=> 'notEmpty'
		),
		
		# datetime
		'creation_date' => array(
			'Date de création invalide' => array(
				'rule' 			=> array('datetime', 'ymd'),
				'required'		=> 'create',
				'allowEmpty'	=> false
			)
		),
		'last_update' => array(
			'Date de modification invalide' => array(
				'rule' 			=> array('datetime', 'ymd'),
				'required'		=> true,
				'allowEmpty'	=> false
			)
		),
		
		# foreign keys
		'user_id' => array(
			'Utilisateur invalide'	=> array(
				'rule' 		=> 'numeric',
				'required'	=> 'create'
			)
		),
		'address_id' => array(
			'Utilisateur invalide'	=> array(
				'rule' 		=> 'numeric',
				'required'	=> 'create'
			)
		)
		
	);



	// Check box number
	public function valideBoxNumber($data){

		// Datas
		$Parameter = new Parameter();

		// Check minimum box number
		$minBoxNumber = $Parameter->findByKey('min_box_number');
		if($minBoxNumber['Parameter']['value'] > $data['empty_box_number'])
			return false;

		// Check maximum box number
		$maxBoxNumber = $Parameter->findByKey('max_box_number');
		if($maxBoxNumber['Parameter']['value'] < $data['empty_box_number'])
			return false;
			
		// Return result
		return true;
		
	}
	
	
	// Check opened date
	public function openedDate($data, $type) {
		
		// Datas
		$NonWorkingDay 		= new NonWorkingDay();
		$Parameter 			= new Parameter();
		
		if($type == "deposit") {
			
			// Datas
			$depositDate		= $data['deposit_date'];
		
			// Get parameters
			$minDepositDate 	= $Parameter->findByKey('min_deposit_date');
			$maxDepositDate 	= $Parameter->findByKey('max_deposit_date');
			
			// If deposit date is too close
			if(strtotime($depositDate) < time()+($minDepositDate*86400))
				return false;
			
			// If deposit date is too far
			if(strtotime($depositDate) > time()+($maxDepositDate*86400)+86399)
				return false;
				
				
			// Check deposit date
			$timestamp 	= strtotime($depositDate);
			$monthDay 	= date('d', $timestamp);
			$weekDay 	= strtolower(date('l', $timestamp));
			$month 		= strtolower(date('m', $timestamp));
			$year 		= date('Y', $timestamp);
			
			$closed = $NonWorkingDay->find('first', array(
				'conditions' 	=> array(
					array('OR'	=> array(
						'NonWorkingDay.starting_date <=' 	=> $depositDate,
						'NonWorkingDay.starting_date' 		=> 'NULL'
					)),
					array('OR'	=> array(
						'NonWorkingDay.ending_date >=' 		=> $depositDate,
						'NonWorkingDay.ending_date' 		=> 'NULL'
					)),
					array('OR'	=> array(
						array('NonWorkingDay.value' 		=> $monthDay),
						array('NonWorkingDay.value' 		=> $weekDay),
						array('NonWorkingDay.value' 		=> $month),
						array('NonWorkingDay.value' 		=> $year)
					))
				)
			));
			
			// If deposit date is closed
			if(!empty($closed))
				return false;
		
		} else if($type == "withdrawal") {
			
			// Datas
			$withdrawalDate		= $data['withdrawal_date'];
			
			// Get parameters
			$minWithdrawalDate 	= $Parameter->findByKey('min_withdrawal_date');
			$maxWithdrawalDate 	= $Parameter->findByKey('max_withdrawal_date');
			
			// If withdrawal date is too close
			if(strtotime($withdrawalDate) < time()+($minWithdrawalDate*86400))
				return false;
			
			// If withdrawal date is too far
			if(strtotime($withdrawalDate) > time()+($maxWithdrawalDate*86400)+86399)
				return false;
			
		
			// Check withdrawal date
			$timestamp 	= strtotime($withdrawalDate);
			$monthDay 	= date('d', $timestamp);
			$weekDay 	= strtolower(date('l', $timestamp));
			$month 		= strtolower(date('m', $timestamp));
			$year 		= date('Y', $timestamp);
			
			$closed = $NonWorkingDay->find('first', array(
				'conditions' 	=> array(
					array('OR'	=> array(
						'NonWorkingDay.starting_date <=' 	=> $withdrawalDate,
						'NonWorkingDay.starting_date' 		=> 'NULL'
					)),
					array('OR'	=> array(
						'NonWorkingDay.ending_date >=' 		=> $withdrawalDate,
						'NonWorkingDay.ending_date' 		=> 'NULL'
					)),
					array('OR'	=> array(
						array('NonWorkingDay.value' 		=> $monthDay),
						array('NonWorkingDay.value' 		=> $weekDay),
						array('NonWorkingDay.value' 		=> $month),
						array('NonWorkingDay.value' 		=> $year)
					))
				)
			));
			
			// If withdrawal date is closed
			if(!empty($closed))
				return false;
				
		}
		
		// Return result	
		return true;
		
	}
	
	
	// Check opened time slot
	public function openedTimeSlot($data, $type) {
		
		// Datas
		$TimeSlot 			= new TimeSlot();
		
		if($type == "deposit") {
			
			// Datas
			$depositTimeSlot	= $data['deposit_time_slot'];
		
			// Get time slot
			$result = $TimeSlot->findByIdAndState($depositTimeSlot, 1);
			
			// If deposit time slot is not unavailable
			if(!empty($result))
				return false;
		
		} else if($type == "withdrawal") {
			
			// Datas
			$withdrawalTimeSlot	= $data['withdrawal_time_slot'];
		
			// Get time slot
			$result = $TimeSlot->findByIdAndState($withdrawalTimeSlot, 1);
			
			// If withdrawal time slot is not unavailable
			if(!empty($result))
				return false;
			
		}
		
		// Return result	
		return true;
		
	}

}

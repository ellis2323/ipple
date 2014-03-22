<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'dezordre',
		'port' => '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock'

	);
	public $mailchimp = array(
	    'datasource' => 'Mailchimp.MailchimpSubscriberSource',
	    'apikey' => '2099de1a78d310974a1f1fdfa27f5ff8-us3',
	    'defaultListId' => '364805',
	);
		
}



/*
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'dezordre',
		'port' => '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock'
	);
}*/

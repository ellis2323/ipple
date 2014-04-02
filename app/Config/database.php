<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
		'database' => 'dezordre',
		'port' => '/Applications/MAMP/tmp/mysql/mysql.sock'

	);
	public $mailchimp = array(
	    'datasource' => 'Mailchimp.MailchimpSubscriberSource',
	    'apikey' => '2099de1a78d310974a1f1fdfa27f5ff8-us3',
	    'defaultListId' => '364805',
	);
	// Mailchimp
	/*public $mailchimp = array(
	    'datasource' => 'MailchimpSubscriberSource',
	    'apikey' => '2099de1a78d310974a1f1fdfa27f5ff8-us3',
	    'listId' => '364805',
	    'baseUrl' => 'http://us1.api.mailchimp.com/1.2/' // or another one, depending on the API version you use
	);*/
		
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

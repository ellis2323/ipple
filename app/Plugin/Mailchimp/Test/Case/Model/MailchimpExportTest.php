<?php

App::uses('MailchimpExport', 'Mailchimp.Model');
App::uses('MyCakeTestCase', 'Tools.TestSuite');

class MailchimpExportTest extends MyCakeTestCase {

	public $MailchimpExport;

	public function setUp() {
		parent::setUp();
		$this->MailchimpExport = new MailchimpExport();
	}

	public function testObject() {
		$this->assertTrue(is_object($this->MailchimpExport));
		$this->assertIsA($this->MailchimpExport, 'MailchimpExport');
	}

	/**
	 * MailchimpExportTest::testGetLists()
	 *
	 * @return void
	 */
	public function testGetLists() {
		$res = $this->MailchimpExport->getLists();
		//$this->debug($res);
		$this->assertTrue(is_int($res['total']));
		$this->assertTrue(isset($res['data']));
		if ($res['data']) {
			$this->assertTrue(!empty($res['data'][0]['stats']));
		}
	}

	/**
	 * MailchimpExportTest::testExportActivity()
	 *
	 * @expectedException CakeException
	 * @return void
	 */
	public function testExportActivity() {
		$res = $this->MailchimpExport->exportActivity();
		//$this->debug($res);
	}

	/**
	 * MailchimpExportTest::testExportMembers()
	 *
	 * @return void
	 */
	public function testExportMembers() {
		$res = $this->MailchimpExport->exportMembers();
		$this->debug($res);
		$this->assertTrue(!empty($res) && is_array($res));
	}

}
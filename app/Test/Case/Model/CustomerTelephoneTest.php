<?php
App::uses('CustomerTelephone', 'Model');

/**
 * CustomerTelephone Test Case
 *
 */
class CustomerTelephoneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.customer_telephone',
		'app.customer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CustomerTelephone = ClassRegistry::init('CustomerTelephone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CustomerTelephone);

		parent::tearDown();
	}

}

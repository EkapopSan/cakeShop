<?php
App::uses('ProductUnit', 'Model');

/**
 * ProductUnit Test Case
 *
 */
class ProductUnitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_unit'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductUnit = ClassRegistry::init('ProductUnit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductUnit);

		parent::tearDown();
	}

}

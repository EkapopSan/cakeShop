<?php
App::uses('Manufacturer', 'Model');

/**
 * Manufacturer Test Case
 *
 */
class ManufacturerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.manufacturer',
		'app.product',
		'app.category',
		'app.product_attribute',
		'app.category_attribute',
		'app.attribute',
		'app.brand',
		'app.product_series',
		'app.product_label',
		'app.product_unit'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Manufacturer = ClassRegistry::init('Manufacturer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Manufacturer);

		parent::tearDown();
	}

}

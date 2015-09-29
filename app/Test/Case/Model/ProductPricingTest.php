<?php
App::uses('ProductPricing', 'Model');

/**
 * ProductPricing Test Case
 *
 */
class ProductPricingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_pricing',
		'app.product',
		'app.category',
		'app.product_attribute',
		'app.category_attribute',
		'app.attribute',
		'app.brand',
		'app.product_series',
		'app.product_label',
		'app.product_unit',
		'app.manufacturer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductPricing = ClassRegistry::init('ProductPricing');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductPricing);

		parent::tearDown();
	}

}

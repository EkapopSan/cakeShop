<?php
App::uses('ProductSeries', 'Model');

/**
 * ProductSeries Test Case
 *
 */
class ProductSeriesTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_series',
		'app.brand'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductSeries = ClassRegistry::init('ProductSeries');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductSeries);

		parent::tearDown();
	}

}

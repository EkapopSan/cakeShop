<?php
App::uses('OrderDetail', 'Model');

/**
 * OrderDetail Test Case
 *
 */
class OrderDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_detail',
		'app.order',
		'app.customer',
		'app.customer_address',
		'app.city',
		'app.customer_telephone',
		'app.quotation',
		'app.quotation_detail',
		'app.product',
		'app.category',
		'app.product_attribute',
		'app.category_attribute',
		'app.attribute',
		'app.brand',
		'app.product_series',
		'app.product_label',
		'app.product_unit',
		'app.manufacturer',
		'app.product_pricing'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderDetail = ClassRegistry::init('OrderDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderDetail);

		parent::tearDown();
	}

}

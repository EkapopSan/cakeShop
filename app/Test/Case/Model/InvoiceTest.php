<?php
App::uses('Invoice', 'Model');

/**
 * Invoice Test Case
 *
 */
class InvoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoice',
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
		'app.product_pricing',
		'app.order_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Invoice = ClassRegistry::init('Invoice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Invoice);

		parent::tearDown();
	}

}

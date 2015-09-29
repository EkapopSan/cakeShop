<?php
App::uses('QuotationDetail', 'Model');

/**
 * QuotationDetail Test Case
 *
 */
class QuotationDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quotation_detail',
		'app.quotation',
		'app.customer',
		'app.customer_address',
		'app.city',
		'app.customer_telephone',
		'app.order',
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
		$this->QuotationDetail = ClassRegistry::init('QuotationDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuotationDetail);

		parent::tearDown();
	}

}

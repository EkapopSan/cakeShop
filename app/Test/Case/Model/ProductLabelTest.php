<?php
App::uses('ProductLabel', 'Model');

/**
 * ProductLabel Test Case
 *
 */
class ProductLabelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_label'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductLabel = ClassRegistry::init('ProductLabel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductLabel);

		parent::tearDown();
	}

}

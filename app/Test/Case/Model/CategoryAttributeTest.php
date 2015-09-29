<?php
App::uses('CategoryAttribute', 'Model');

/**
 * CategoryAttribute Test Case
 *
 */
class CategoryAttributeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.category_attribute',
		'app.category',
		'app.product',
		'app.attribute',
		'app.product_attribute'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoryAttribute = ClassRegistry::init('CategoryAttribute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoryAttribute);

		parent::tearDown();
	}

}

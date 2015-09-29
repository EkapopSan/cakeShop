<?php
App::uses('TemplateAttribute', 'Model');

/**
 * TemplateAttribute Test Case
 *
 */
class TemplateAttributeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.template_attribute',
		'app.template',
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
		$this->TemplateAttribute = ClassRegistry::init('TemplateAttribute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TemplateAttribute);

		parent::tearDown();
	}

}

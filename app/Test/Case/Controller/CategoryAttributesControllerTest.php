<?php
App::uses('CategoryAttributesController', 'Controller');

/**
 * CategoryAttributesController Test Case
 *
 */
class CategoryAttributesControllerTest extends ControllerTestCase {

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

}

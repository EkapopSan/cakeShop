<?php
App::uses('ProductAttributesController', 'Controller');

/**
 * ProductAttributesController Test Case
 *
 */
class ProductAttributesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_attribute',
		'app.category',
		'app.product',
		'app.attribute',
		'app.category_attribute'
	);

}

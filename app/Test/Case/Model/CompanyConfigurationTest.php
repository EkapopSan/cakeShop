<?php
App::uses('CompanyConfiguration', 'Model');

/**
 * CompanyConfiguration Test Case
 *
 */
class CompanyConfigurationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.company_configuration'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompanyConfiguration = ClassRegistry::init('CompanyConfiguration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompanyConfiguration);

		parent::tearDown();
	}

}

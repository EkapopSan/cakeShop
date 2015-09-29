<?php
/**
 * CompanyConfigurationFixture
 *
 */
class CompanyConfigurationFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'company_configuration';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'company_id' => array('type' => 'string', 'null' => false, 'default' => '1', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'VAT_Value' => array('type' => 'string', 'null' => false, 'default' => '7', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price_incl_vat' => array('type' => 'string', 'null' => false, 'default' => '1', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shipping_base_price' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'validity' => array('type' => 'string', 'null' => false, 'default' => '7', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delivery' => array('type' => 'string', 'null' => false, 'default' => '3', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'company_id' => 'Lorem ipsum dolor sit amet',
			'VAT_Value' => 'Lorem ipsum dolor sit amet',
			'price_incl_vat' => 'Lorem ipsum dolor sit amet',
			'shipping_base_price' => 'Lorem ipsum dolor sit amet',
			'validity' => 'Lorem ipsum dolor sit amet',
			'delivery' => 'Lorem ipsum dolor sit amet'
		),
	);

}

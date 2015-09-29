<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'order_no_sale' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'order_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shipping_price' => array('type' => 'float', 'null' => false, 'default' => '0', 'unsigned' => false),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'customer_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'customer_tax_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'customer_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'customer_tel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'customer_fax' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'billing_address' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'billing_city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'billing_zip' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shipping_address' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shipping_city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'shipping_zip' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'order_no_sale' => 1,
			'order_code' => 'Lorem ipsum dolor sit amet',
			'shipping_price' => 1,
			'customer_id' => 1,
			'customer_name' => 'Lorem ipsum dolor sit amet',
			'contact_name' => 'Lorem ipsum dolor sit amet',
			'customer_tax_id' => 'Lorem ipsum dolor sit amet',
			'customer_email' => 'Lorem ipsum dolor sit amet',
			'customer_tel' => 'Lorem ipsum dolor sit amet',
			'customer_fax' => 'Lorem ipsum dolor sit amet',
			'billing_address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'billing_city_id' => 1,
			'billing_zip' => 'Lorem ipsum dolor sit amet',
			'shipping_address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'shipping_city_id' => 1,
			'shipping_zip' => 'Lorem ipsum dolor sit amet',
			'order_date' => '2015-02-10 05:15:14',
			'created_date' => '2015-02-10 05:15:14'
		),
	);

}

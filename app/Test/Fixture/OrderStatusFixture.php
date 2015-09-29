<?php
/**
 * OrderStatusFixture
 *
 */
class OrderStatusFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'order_status';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'shipping_status' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'payment_status' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'shipping_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'tracking_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shipping_details' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payment_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'payment_ref' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payment_details' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'order_id' => 1,
			'shipping_status' => 1,
			'payment_status' => 1,
			'shipping_date' => '2015-02-10 05:23:53',
			'tracking_code' => 'Lorem ipsum dolor sit amet',
			'shipping_details' => 'Lorem ipsum dolor sit amet',
			'payment_date' => '2015-02-10 05:23:53',
			'payment_ref' => 'Lorem ipsum dolor sit amet',
			'payment_details' => 'Lorem ipsum dolor sit amet'
		),
	);

}

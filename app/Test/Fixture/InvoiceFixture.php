<?php
/**
 * InvoiceFixture
 *
 */
class InvoiceFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'invoice';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'inv_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'billing_total' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'shipping_price' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'discount' => array('type' => 'float', 'null' => false, 'default' => '0', 'unsigned' => false),
		'invoice_no_sales' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'print_count' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'inv_code' => 'Lorem ipsum dolor sit amet',
			'billing_total' => 1,
			'shipping_price' => 1,
			'discount' => 1,
			'invoice_no_sales' => 1,
			'created_date' => '2015-02-10 05:30:58',
			'print_count' => 1
		),
	);

}

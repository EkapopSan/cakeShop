<?php
/**
 * TemplateAttributeFixture
 *
 */
class TemplateAttributeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'template_attribute';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'template_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'attribute_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'template_id' => 1,
			'attribute_id' => 1
		),
	);

}

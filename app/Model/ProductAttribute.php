<?php
App::uses('AppModel', 'Model');
/**
 * ProductAttribute Model
 *
 * @property CategoryAttribute $CategoryAttribute
 * @property Product $Product
 * @property Attribute $Attribute
 */
class ProductAttribute extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'product_attribute';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'CategoryAttribute' => array(
			'className' => 'CategoryAttribute',
			'foreignKey' => 'category_attribute_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Attribute' => array(
			'className' => 'Attribute',
			'foreignKey' => 'attribute_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

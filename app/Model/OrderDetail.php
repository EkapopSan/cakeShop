<?php
App::uses('AppModel', 'Model');
/**
 * OrderDetail Model
 *
 * @property Order $Order
 * @property Product $Product
 */
class OrderDetail extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'product_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
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
		)
	);
}

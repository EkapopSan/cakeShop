<?php
App::uses('AppModel', 'Model');
/**
 * OrderStatus Model
 *
 * @property Order $Order
 */
class OrderStatus extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'order_status';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'payment_status';


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
		)
	);
}

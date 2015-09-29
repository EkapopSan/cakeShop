<?php
App::uses('AppModel', 'Model');
/**
 * Invoice Model
 *
 * @property Order $Order
 */
class Invoice extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'invoice';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'inv_code';


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

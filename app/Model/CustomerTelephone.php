<?php
App::uses('AppModel', 'Model');
/**
 * CustomerTelephone Model
 *
 * @property Customer $Customer
 */
class CustomerTelephone extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'customer_telephone';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'number';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

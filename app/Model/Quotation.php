<?php
App::uses('AppModel', 'Model');
/**
 * Quotation Model
 *
 * @property Customer $Customer
 * @property QuotationDetail $QuotationDetail
 */
class Quotation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'quotation_no';


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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'QuotationDetail' => array(
			'className' => 'QuotationDetail',
			'foreignKey' => 'quotation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}

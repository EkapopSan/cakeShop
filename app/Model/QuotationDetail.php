<?php
App::uses('AppModel', 'Model');
/**
 * QuotationDetail Model
 *
 * @property Quotation $Quotation
 * @property Product $Product
 */
class QuotationDetail extends AppModel {

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
		'Quotation' => array(
			'className' => 'Quotation',
			'foreignKey' => 'quotation_id',
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

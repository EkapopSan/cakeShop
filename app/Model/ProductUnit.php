<?php
App::uses('AppModel', 'Model');
/**
 * ProductUnit Model
 *
 */
class ProductUnit extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    
    
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'unit_id',
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

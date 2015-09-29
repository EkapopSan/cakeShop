<?php
App::uses('AppModel', 'Model');
/**
 * ProductLabel Model
 *
 */
class ProductLabel extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
    
    
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'label_id',
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

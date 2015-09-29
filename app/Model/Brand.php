<?php
App::uses('AppModel', 'Model');
/**
 * Brand Model
 *
 * @property ProductSeries $ProductSeries
 */
class Brand extends AppModel {
    
    
	public $displayField = 'name';
    
    
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'brand_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ProductSeries' => array(
			'className' => 'ProductSeries',
			'foreignKey' => 'brand_id',
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

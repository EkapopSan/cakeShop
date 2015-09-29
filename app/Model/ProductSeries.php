<?php
App::uses('AppModel', 'Model');
/**
 * ProductSeries Model
 *
 * @property Brand $Brand
 */
class ProductSeries extends AppModel {
    
	public $displayField = 'name';
    
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'series_id',
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
    
	public $belongsTo = array(
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

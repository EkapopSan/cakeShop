<?php
App::uses('AppModel', 'Model');
/**
 * ProductPricing Model
 *
 * @property Product $Product
 */
class ProductPricing extends AppModel {
    
	public $useTable = 'product_pricing';
    
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * Manufacturer Model
 *
 * @property Product $Product
 */
class Manufacturer extends AppModel {
    
	public $useTable = 'manufacturer';    
	public $displayField = 'name';
    
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'manufacturer_id',
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

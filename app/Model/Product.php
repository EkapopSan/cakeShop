<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Category $Category
 * @property Label $Label
 * @property Attribute $Attribute
 */
class Product extends AppModel {
    
    
	public $useTable = 'product';
	public $displayField = 'name';
    
    
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProductLabel' => array(
			'className' => 'ProductLabel',
			'foreignKey' => 'label_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProductUnit' => array(
			'className' => 'ProductUnit',
			'foreignKey' => 'unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProductSeries' => array(
			'className' => 'ProductSeries',
			'foreignKey' => 'series_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Manufacturer' => array(
			'className' => 'Manufacturer',
			'foreignKey' => 'manufacturer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    
    public $hasMany = array(
		'ProductPricing' => array(
			'className' => 'ProductPricing',
			'foreignKey' => 'product_id',
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
    
    
	public $hasAndBelongsToMany = array(
		'Attribute' => array(
			'className' => 'Attribute',
			'joinTable' => 'product_attribute',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'attribute_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}

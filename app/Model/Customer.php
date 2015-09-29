<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 * @property CustomerAddress $CustomerAddress
 * @property CustomerTelephone $CustomerTelephone
 * @property Order $Order
 * @property Quotation $Quotation
 */
class Customer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'first_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CustomerAddress' => array(
			'className' => 'CustomerAddress',
			'foreignKey' => 'customer_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CustomerTelephone' => array(
			'className' => 'CustomerTelephone',
			'foreignKey' => 'customer_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'customer_id',
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
		'Quotation' => array(
			'className' => 'Quotation',
			'foreignKey' => 'customer_id',
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
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
        	if(!empty($this->data[$this->alias]['password'])) {
	            $passwordHasher = new BlowfishPasswordHasher();
	            $this->data[$this->alias]['password'] = $passwordHasher->hash(
	                $this->data[$this->alias]['password']
	            );
        	}
        }
        return true;
    }
}

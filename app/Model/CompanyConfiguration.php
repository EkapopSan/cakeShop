<?php
App::uses('AppModel', 'Model');
/**
 * CompanyConfiguration Model
 *
 * @property Company $Company
 */
class CompanyConfiguration extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'company_configuration';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

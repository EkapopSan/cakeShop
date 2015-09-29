<?php
App::uses('AppModel', 'Model');
/**
 * Company Model
 *
 */
class Company extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'company';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}

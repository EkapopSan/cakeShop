<?php

/**
 * CompaniesController short summary.
 *
 * CompaniesController description.
 *
 * @version 1.0
 * @author HPPro
 */
App::uses('AppController', 'Controller');
class CompaniesController  extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');
    
    
    public function beforeFilter() {
    }
    
    public function index() {
        
    }
}

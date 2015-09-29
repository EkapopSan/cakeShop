<?php

/**
 * ConfigurationsController short summary.
 *
 * ConfigurationsController description.
 *
 * @version 1.0
 * @author HPPro
 */
App::uses('AppController', 'Controller');
class ConfigurationsController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time', 'ConfigurationPage');
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');
    
    
    public function beforeFilter() {
    }
    
    public function index() {
        
    }
    
    public function cities() {
        $this->loadModel('City');
        $this->set('cities', $this->City->find('all'));
     }
     
}

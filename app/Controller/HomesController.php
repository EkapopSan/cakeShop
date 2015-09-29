<?php
App::uses('AppController', 'Controller');
class HomesController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');
	public $components = array('Paginator', 'Acl', 'Security', 'RequestHandler', 'Session');
    
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow();
    }
     
    
	public function index() {
        
	}
}

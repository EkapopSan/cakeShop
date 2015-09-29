<?php
App::uses('AppController', 'Controller');
class AboutsController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $components = array('Session');
    
    public function beforeFilter() {
        $this->Auth->allow('index');
    }
         
	public function index() {
        
	}
}

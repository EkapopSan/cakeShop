<?php
App::uses('AppController', 'Controller');
class ArticlesController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');    
	public $components = array('Paginator', 'Acl', 'Security', 'RequestHandler', 'Session');
    
    public function beforeFilter() {
        parent::beforeFilter();
        //if($this->Session->read('Auth.User') && $this->request->params['action'] !== 'logout') {
        //    if( !$this->Acl->check($this->Auth->user('Group.name'), $this->name, '*') ) {
        //        $this->Session->setFlash(__('You are not authorized to access that location.'), 'flash_error');
        //    }
        //}
    }    
    
	public function add() {
        $this->set('ckeditorClass', Configure::read('CKFinder.class'));
        $this->set('ckfinderPath', Configure::read('CKFinder.path'));
	}
}

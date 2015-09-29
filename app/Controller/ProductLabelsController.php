<?php
App::uses('AppController', 'Controller');
/**
 * ProductLabels Controller
 *
 * @property ProductLabel $ProductLabel
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class ProductLabelsController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');    
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');
    
    
	public function index() {
		$this->ProductLabel->recursive = 0;
		$this->set('productLabels', $this->Paginator->paginate());
	}
    
    
	public function view($id = null) {
		if (!$this->ProductLabel->exists($id)) {
			throw new NotFoundException(__('Invalid product label'));
		}
		$options = array('conditions' => array('ProductLabel.' . $this->ProductLabel->primaryKey => $id));
		$this->set('productLabel', $this->ProductLabel->find('first', $options));
	}
    
    
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductLabel->create();
			if ($this->ProductLabel->save($this->request->data)) {
                $response = array(
                    'code' => 1,
                    'status' => 'success',
                    'message' => 'The product label has been saved.'
                );
                $this->set(compact('response'));
                $this->Session->setFlash(__('The product label has been saved.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('The product label could not be saved. Please, try again.'));
			}
		}
	}
    
    
	public function edit($id = null) {
		if (!$this->ProductLabel->exists($id)) {
			throw new NotFoundException(__('Invalid product label'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductLabel->save($this->request->data)) {
				$this->Session->setFlash(__('The product label has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product label could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('ProductLabel.' . $this->ProductLabel->primaryKey => $id));
			$this->request->data = $this->ProductLabel->find('first', $options);
		}
	}
    
    
	/**
     * Summary of delete
     * ก่อนลบ ควรตรวจสอบดูก่อนว่ามี Product ใช้งาน ProductLabel ดังกล่าวหรือเปล่า
     * ไม่ควรลบ ProductLabel ทั้งๆ ที่ยังมี Product อยู่
     * @param mixed $id 
     * @throws NotFoundException 
     * @return mixed
     */
    public function delete($id = null) {
		$this->ProductLabel->id = $id;
		if (!$this->ProductLabel->exists()) {
			throw new NotFoundException(__('Invalid product label'));
		}
        $productLabels = $this->ProductLabel->Product->find('count', array('conditions' => array('label_id' => $id)));
		if($productLabels > 0) {
			$this->Session->setFlash(__('The product label could not be deleted! because has a product use this label.'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductLabel->delete()) {
			$this->Session->setFlash(__('The product label has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product label could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

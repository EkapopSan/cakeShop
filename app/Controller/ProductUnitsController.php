<?php
App::uses('AppController', 'Controller');
/**
 * ProductUnits Controller
 *
 * @property ProductUnit $ProductUnit
 * @property PaginatorComponent $Paginator
 */
class ProductUnitsController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');    
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');
    
    
	public function index() {
		$this->ProductUnit->recursive = 0;
		$this->set('productUnits', $this->Paginator->paginate());
	}
    
    
	public function view($id = null) {
		if (!$this->ProductUnit->exists($id)) {
			throw new NotFoundException(__('Invalid product unit'));
		}
		$options = array('conditions' => array('ProductUnit.' . $this->ProductUnit->primaryKey => $id));
		$this->set('productUnit', $this->ProductUnit->find('first', $options));
	}
    
    
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductUnit->create();
			if ($this->ProductUnit->save($this->request->data)) {
                $response = array(
                    'code' => 1,
                    'status' => 'success',
                    'message' => 'The product unit has been saved.'
                );
                $this->set(compact('response'));
                $this->Session->setFlash(__('The product unit has been saved.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('The product unit could not be saved. Please, try again.'));
			}
		}
	}
    
    
	public function edit($id = null) {
		if (!$this->ProductUnit->exists($id)) {
			throw new NotFoundException(__('Invalid product unit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductUnit->save($this->request->data)) {
				$this->Session->setFlash(__('The product unit has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product unit could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('ProductUnit.' . $this->ProductUnit->primaryKey => $id));
			$this->request->data = $this->ProductUnit->find('first', $options);
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
		$this->ProductUnit->id = $id;
		if (!$this->ProductUnit->exists()) {
			throw new NotFoundException(__('Invalid product unit'));
		}
        $productLabels = $this->ProductUnit->Product->find('count', array('conditions' => array('label_id' => $id)));
		if($productLabels > 0) {
			$this->Session->setFlash(__('The product label could not be deleted! because has a product use this label.'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductUnit->delete()) {
			$this->Session->setFlash(__('The product unit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product unit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Manufacturers Controller
 *
 * @property Manufacturer $Manufacturer
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class ManufacturersController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');    
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');
    
    public function beforeFilter() {
    }
    
    
	public function index() {
		$this->Manufacturer->recursive = 0;
		$this->set('manufacturers', $this->Paginator->paginate());
	}
    
    
	public function view($id = null) {
		if (!$this->Manufacturer->exists($id)) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		$options = array('conditions' => array('Manufacturer.' . $this->Manufacturer->primaryKey => $id));
		$this->set('manufacturer', $this->Manufacturer->find('first', $options));
	}
    
    
	public function add() {
		if ($this->request->is('post')) {
			$this->Manufacturer->create();
			if ($this->Manufacturer->save($this->request->data)) {
                $response = array(
                    'code' => 1,
                    'status' => 'success',
                    'message' => 'The Manufacturers has been saved.'
                );
                $this->set(compact('response'));
                $this->Session->setFlash(__('The Manufacturers has been saved.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'));
			}
		}
	}
    
    
	public function edit($id = null) {
		if (!$this->Manufacturer->exists($id)) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Manufacturer->save($this->request->data)) {
				$this->Session->setFlash(__('The manufacturer has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Manufacturer.' . $this->Manufacturer->primaryKey => $id));
			$this->request->data = $this->Manufacturer->find('first', $options);
		}
	}

	/**
     * Summary of delete
     * ก่อนลบ ควรตรวจสอบดูก่อนว่ามี Product อ้างอิงถึง Manufacturer ดังกล่าวหรือเปล่า
     * ไม่ควรลบ Brand ทั้งๆ ที่ยังมี Product ใช้อ้างอิงถึงอยู่
     * @param mixed $id 
     * @throws NotFoundException 
     * @return mixed
     */
	public function delete($id = null) {
		$this->Manufacturer->id = $id;
		if (!$this->Manufacturer->exists()) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
        $products = $this->Manufacturer->Product->find('count', array('conditions' => array('Product.manufacturer_id' => $id)));
        if($products > 0) {
            $this->Session->setFlash(__('The Manufacturer could not be deleted! because has a product in this Manufacturer.'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
		$this->request->allowMethod('post', 'delete');
		if ($this->Manufacturer->delete()) {
			$this->Session->setFlash(__('The manufacturer has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The manufacturer could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

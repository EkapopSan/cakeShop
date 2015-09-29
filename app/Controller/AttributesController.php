<?php
App::uses('AppController', 'Controller');
/**
 * Attributes Controller
 *
 * @property Attribute $Attribute
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class AttributesController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');    
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');
    
    public function beforeFilter() {
    }
    
	public function index() {
		$this->Attribute->recursive = 0;
		$this->set('attributes', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Attribute->exists($id)) {
			throw new NotFoundException(__('Invalid attribute'));
		}
		$options = array('conditions' => array('Attribute.' . $this->Attribute->primaryKey => $id));
		$this->set('attribute', $this->Attribute->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Attribute->create();
			if ($this->Attribute->save($this->request->data)) {
                $response = array(
                    'code' => 1,
                    'status' => 'success',
                    'message' => 'The attribute has been saved.'
                );
                $this->set(compact('response'));
                $this->Session->setFlash(__('The attribute has been saved.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('The attribute could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Attribute->exists($id)) {
			throw new NotFoundException(__('Invalid attribute'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Attribute->save($this->request->data)) {
				$this->Session->setFlash(__('The attribute has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attribute could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Attribute.' . $this->Attribute->primaryKey => $id));
			$this->request->data = $this->Attribute->find('first', $options);
		}
	}

	/**
     * Summary of delete
     * ก่อนลบ ควรตรวจสอบดูก่อนว่ามี Product ใช้งาน Attribute ดังกล่าวหรือเปล่า
     * ไม่ควรลบ Attribute ทั้งๆ ที่ยังมี Product อยู่
     * @param mixed $id 
     * @throws NotFoundException 
     * @return mixed
     */
	public function delete($id = null) {
		$this->Attribute->id = $id;
		if (!$this->Attribute->exists()) {
			throw new NotFoundException(__('Invalid attribute'));
		}
        $attributes = $this->Attribute->ProductAttribute->find('count', array('conditions' => array('attribute_id' => $id)));
		if($attributes > 0) {
			$this->Session->setFlash(__('The attribute could not be deleted! because has a product use this attribute.'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Attribute->delete()) {
            $this->Session->setFlash(__('The attribute has been deleted.'), 'flash_success');
        } else {
            $this->Session->setFlash(__('The attribute could not be deleted. Please, try again.'), 'flash_error');
        }
		return $this->redirect(array('action' => 'index'));
	}
}

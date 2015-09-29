<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class CategoriesController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');
	public $components = array('Paginator', 'Acl', 'Security', 'RequestHandler', 'Session');

	
	public function beforeFilter() {
        $this->Security->unlockedActions = array('add', 'delete');
	}    
    
	public function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Category->find('all'));
	}
    
	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}
    
	public function add() {
        if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data['Category'])) {
                if(!is_null($this->request->data['CategoryAttribute'])) {
                    $categoryAttributeObj = array();
                    foreach ( $this->request->data['CategoryAttribute'] as $key => $value ) {
                        $categoryAttributeObj[] = array(
                            'CategoryAttribute' => array(
                                'category_id' => $this->Category->id,
                                'attribute_id' => $value
                            )
                        );
                    }
                    $this->Category->CategoryAttribute->saveMany($categoryAttributeObj, array('deep', true));
                    
                    $this->Session->setFlash(__('The category has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            return $this->redirect(array('action' => 'index'));
        }
	}
    
    public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
                return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			throw new NotFoundException(__('Invalid category'));
		}
	}
    
	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists() or $id <= 0) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');        
         
        
        
         //ตรวจสอบก่อนว่ามี category ย่อยภายใต้ category นี้หรือเปล่า
         //ถ้ามี ห้ามลบ category นี่, ให้ลบ category ย่อยภายใต้ก่อน
         //ถ้าไม่มี ลบได้เลย
         $child = $this->Category->find('count', array(
            'conditions' => array('Category.parent_id' => $id)
         ));		
         
        
         
        //ตรวจสอบก่อนว่ามี category ย่อยภายใต้ category นี้หรือเปล่า
        //ถ้ามี ห้ามลบ category นี่, ให้ลบ category ย่อยภายใต้ก่อน
        //ถ้าไม่มี ลบได้เลย
         $product = $this->Category->Product->find('count', array(
             'conditions' => array('category_id' => $id)
        ));
         
         
         if( $child > 0 or $product > 0 ) {
             $this->Session->setFlash(__('The category could not be deleted. cause this category had some product or child category.'));
         } else {             
             if ($this->Category->delete()) {
                 $this->Session->setFlash(__('The category has been deleted.'));
             } else {
                 $this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
             }
         }
		return $this->redirect(array('action' => 'index'));
	}
    
}
<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');
	public $components = array('Paginator', 'Acl', 'Security', 'RequestHandler', 'Session');
    
    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Product.id' => 'asc'
        )
    );
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->unlockedActions = array('add', 'index');
	}
        
	public function index() {
        $this->Product->recursive = 0;
        $products = null;
        if(isset($this->request->params['pass'][0])) {
            $products = $this->Product->findByUuid($this->request->params['pass'][0]);
        } else {
            $products = $this->Paginator->paginate();
        }
         
        $this->set('products', $products);
        $this->set('categories', $this->Product->Category->find('threaded', array('fields', array('id', 'uuid', 'name'), 'order' => array('Category.lft'))));
	}
    
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id), 'recursive' => 1);
		$this->set('product', $this->Product->find('first', $options));
	}
    
	public function add() {
        /**
         * Summary of add
         * @return mixed
         * ข้อมูลที่ส่งเข้ามาได้แก่ data[Product] และ data[ProductAttribute]
         * 1. นำข้อมูล data[Product] ที่ส่งเข้ามาบันทึกลงไปที่ฐานข้อมูลก่อน
         * 2. หลังจากบันทึก data[Product] แล้วจะได้ id ของ Product กลับมา
         * 3. สร้างโครงสร้างข้อมูลของ ProductAttribute
         * 4. บันทึกข้อมูล ProductAttribute
         */
        if ($this->request->is('post')) {
            //#1
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                if(!is_null($this->request->data['ProductAttributes'])) {
                    //#3
                    $ProductAttributeObj = array();
                    foreach ( $this->request->data['ProductAttributes'] as $key => $ProductAttribute ) {
                        $ProductAttributeObj[] = array(
                            'ProductAttribute' => array(
                                'category_attribute_id' => $ProductAttribute['category_attribute_id'],
                                //#2
                                'product_id' => $this->Product->id,
                                'attribute_id' => $key,
                                'value' => $ProductAttribute['value']
                            )
                        );
                    }
                    //#4
                    $this->Product->ProductAttribute->saveMany($ProductAttributeObj, array('deep', true));
                }
                $this->Session->setFlash(__('The product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Product->Category->find('all');
        $attributes = $this->Product->Attribute->find('list');
        $this->set('labels', $this->Product->ProductLabel->find('list'));
        $this->set('units', $this->Product->ProductUnit->find('list'));
        $this->set('series', $this->Product->ProductSeries->find('list'));
        $this->set('brands', $this->Product->Brand->find('list'));
        $this->set('manufacturers', $this->Product->Manufacturer->find('list'));
        $this->set(compact('categories', 'attributes'));
	}
    
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
                if(!is_null($this->request->data['ProductAttributes'])) {
                    $ProductAttributeObj = array();
                    foreach ( $this->request->data['ProductAttributes'] as $key => $ProductAttribute ) {
                        $ProductAttributeObj[] = array(
                            'ProductAttribute' => array(
                                'id' => $ProductAttribute['id'],
                                'category_attribute_id' => $ProductAttribute['category_attribute_id'],
                                'product_id' => $id,
                                'attribute_id' => $key,
                                'value' => $ProductAttribute['value']
                            )
                        );
                    }
                    $this->Product->ProductAttribute->saveMany($ProductAttributeObj);
                }
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
        $this->loadModel('CategoryAttribute');
        $productObj = $this->Product->findById($id);
        $this->Product->Category->CategoryAttribute->recursive = 1;
		$this->set('categoryAttributes', $this->Product->Category->CategoryAttribute->findAllByCategoryId($productObj['Product']['category_id']));
	}
    
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
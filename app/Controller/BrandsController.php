<?php
App::uses('AppController', 'Controller');
/**
 * Brands Controller
 *
 * @property Brand $Brand
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class BrandsController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');
    
    
	public function index() {
		$this->Brand->recursive = 0;
		$this->set('brands', $this->Paginator->paginate());
	}
    
	public function view($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
		$this->set('brand', $this->Brand->find('first', $options));
	}
    
	public function add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			if ($this->Brand->save($this->request->data)) {
                $response = array(
                    'code' => 1,
                    'status' => 'success',
                    'message' => 'The brand has been saved.'
                );
                $this->set(compact('response'));
                $this->Session->setFlash(__('The brand has been saved.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.'));
			}
		}
	}
    
	public function edit($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash(__('The brand has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
			$this->request->data = $this->Brand->find('first', $options);
		}
	}

	/**
     * Summary of delete
     * ��͹ź ��õ�Ǩ�ͺ�١�͹����� [Product ��� ProductSeries] ��ҧ�ԧ�֧ Brand �ѧ�������������
     * �����ź Brand ���� ����ѧ�� [Product ��� ProductSeries] ����ҧ�ԧ�֧����
     * @param mixed $id 
     * @throws NotFoundException 
     * @return mixed
     */
	public function delete($id = null) {
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException(__('Invalid brand'));
		}
        
        //��Ǩ�ͺ��������ѹ��Ѻ Product
        $products = $this->Brand->Product->find('count', array('conditions' => array('Product.brand_id' => $id)));
        if($products > 0) {
            $this->Session->setFlash(__('The Brand could not be deleted! because has a product in this Brand.'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
        
        //��Ǩ�ͺ��������ѹ��Ѻ Product Series
        $productSeries = $this->Brand->ProductSeries->find('count', array('conditions' => array('ProductSeries.brand_id' => $id)));
        if($productSeries > 0) {
            $this->Session->setFlash(__('The Brand could not be deleted! because has a product series in this Brand.'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
        
		$this->request->allowMethod('post', 'delete');
		if ($this->Brand->delete()) {
			$this->Session->setFlash(__('The Brand has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The Brand could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

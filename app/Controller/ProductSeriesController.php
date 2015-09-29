<?php
App::uses('AppController', 'Controller');
/**
 * ProductSeries Controller
 *
 * @property ProductSeries $ProductSeries
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class ProductSeriesController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');    
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');

    //public $paginate = array(
    //    'fields' => array('ProductSeries.id', 'ProductSeries.brand_id', 'ProductSeries.name', 'ProductSeries.information', 'Brand.name'),
    //    'limit' => 25,
    //    'order' => array(
    //        'ProductSeries.id' => 'asc'
    //    )
    //);
    
    public function beforeFilter() {
    }
    
    
	public function index() {
		$this->ProductSeries->recursive = 1;
        $this->paginate = array(
            'fields' => array('ProductSeries.id', 'ProductSeries.brand_id', 'ProductSeries.name', 'ProductSeries.information', 'Brand.name'),
            'limit' => 25
        );
		$this->set('productSeries', $this->paginate('ProductSeries'));
	}
    
    
	public function view($id = null) {
		if (!$this->ProductSeries->exists($id)) {
			throw new NotFoundException(__('Invalid product series'));
		}
		$options = array('conditions' => array('ProductSeries.' . $this->ProductSeries->primaryKey => $id));
		$this->set('productSeries', $this->ProductSeries->find('first', $options));
	}
    
    
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductSeries->create();
			if ($this->ProductSeries->save($this->request->data)) {
                $response = array(
                    'code' => 1,
                    'status' => 'success',
                    'message' => 'The product series has been saved.'
                );
                $this->set(compact('response'));
                $this->Session->setFlash(__('The product series has been saved.'), 'flash_success');
			} else {
				$this->Session->setFlash(__('The product series could not be saved. Please, try again.'));
			}
		}
		$brands = $this->ProductSeries->Brand->find('list');
		$this->set(compact('brands'));
	}
    
    
	public function edit($id = null) {
		if (!$this->ProductSeries->exists($id)) {
			throw new NotFoundException(__('Invalid product series'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductSeries->save($this->request->data)) {
				$this->Session->setFlash(__('The product series has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product series could not be saved. Please, try again.'), 'flash_error');
			}
		} else {
			$options = array('conditions' => array('ProductSeries.' . $this->ProductSeries->primaryKey => $id));
			$this->request->data = $this->ProductSeries->find('first', $options);
		}
		$brands = $this->ProductSeries->Brand->find('list');
		$this->set(compact('brands'));
	}

	/**
     * Summary of delete
     * ก่อนลบ ควรตรวจสอบดูก่อนว่ามี Product ใช้งาน ProductSeries ดังกล่าวหรือเปล่า
     * ไม่ควรลบ ProductSeries ทั้งๆ ที่ยังมี Product อยู่
     * @param mixed $id 
     * @throws NotFoundException 
     * @return mixed
     */
	public function delete($id = null) {
		$this->ProductSeries->id = $id;
		if (!$this->ProductSeries->exists()) {
			throw new NotFoundException(__('Invalid product series'));
		}
        $productSeries = $this->ProductSeries->Product->find('count', array('conditions' => array('series_id' => $id)));
		if($productSeries > 0) {
			$this->Session->setFlash(__('The product series could not be deleted! because has a product use this series.'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
		$this->request->allowMethod('post', 'delete');
		if ($this->ProductSeries->delete()) {
			$this->Session->setFlash(__('The product series has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The product series could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

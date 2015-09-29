<?php
App::uses('AppController', 'Controller');

class CustomersController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');    
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session', 'UserUtils');
    
    
    public function beforeFilter() {
    }
    
	public function index() {
        if ($this->request->is('get') && count($this->request->query) > 0) {
            
            $this->Customer->recursive = 2;
            $queries = $this->request->query;
            $this->Paginator->settings = array(
                    'conditions' => array(
                        'AND' => array(
                            'Customer.first_name LIKE' => '%' . $queries['first_name'] . '%', 
                            'Customer.company_name LIKE' => '%' . $queries['company_name'] . '%',
                            'Customer.email LIKE' => '%' . $queries['email'] . '%',
                            'Customer.tax_id LIKE' => '%' . $queries['TaxId'] . '%'
                            )
                        ),
                    //'contain' => array(
                    //    'CustomerAddress' => array(
                    //        'conditions' => array(
                    //            'AND' => array(
                    //                'CustomerAddress.type' => 'billing',
                    //                'CustomerAddress.city_id' => $queries['city_id']
                    //                )
                    //            )
                    //        )
                    //),
                    'limit' => 25
                );            
            $this->Session->setFlash(__('Success.'), 'flash_success');
        }
        
        $this->set('customers', $this->Paginator->paginate());
        $this->set('cities', $this->Customer->CustomerAddress->City->find('list'));
	}
        
	public function view($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
        
        $this->Customer->recursive = 2;
        $customer = $this->Customer->findById($id);
        $customer['Customer']['created_by'] = $this->UserUtils->getUsernameById($customer['Customer']['created_by']);
        
		$this->set('customer', $customer);
	}
        
	public function add() {
        if(!$this->request->isAjax() && !$this->request->is('post')) {
            $this->redirect(array('controller' => 'customers', 'action' => 'index'));
        }
		if ($this->request->is('post')) {

            // if(!isUniqueCustomerInfo($this->request->data))
            // {

            // }

            $this->Customer->create();
            date_default_timezone_set('Asia/Bangkok');
            $this->request->data['Customer']['created_date'] =  date("Y-m-d H:i:s");
            $this->request->data['Customer']['created_by'] = $this->Auth->user('id');
            
            if ($this->Customer->save($this->request->data['Customer'])) {
                
                $customerAddress = array();
                foreach ( $this->request->data['CustomerAddress'] as $key => $value ) {
                    if(!empty($value['address'])) {
                        $customerAddress[] = array(
                            'CustomerAddress' => array(
                                'customer_id' => $this->Customer->id,
                                'address_name' => $value['address_name'],
                                'type' => $value['type'],
                                'address' => $value['address'],
                                'city_id' => $value['city_id'],
                                'zip' => $value['zip'],
                                'country' => $value['country']
                            )
                        );
                    }
                }
                $this->Customer->CustomerAddress->saveMany($customerAddress, array('deep', true));
                
                $customerTelephone = array();
                foreach ( $this->request->data['CustomerTelephone'] as $key => $value ) {
                    if(!empty($value['number'])) {
                        $customerTelephone[] = array(
                            'CustomerTelephone' => array(
                                'customer_id' => $this->Customer->id,
                                'type' => $value['type'],
                                'number' => $value['number']
                            )
                        );
                    }
                }
                $this->Customer->CustomerTelephone->saveMany($customerTelephone, array('deep', true));
                
                $response = array(
                    'code' => 1,
                    'status' => 'success',
                    'message' => 'The customer has been saved.'
                );
                $this->set(compact('response'));
                $this->Session->setFlash(__('The customer has been saved.'), 'flash_success');
                
            } else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again.'), 'flash_error');
            }
		} else {
            $this->Customer->recursive = 2;
            $cities = $this->Customer->CustomerAddress->City->find('list');
            $this->set('cities', $cities);
        }
	}
        
	public function edit($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
            if ($this->Customer->save($this->request->data['Customer'])) {

                $customerAddress = array();
                foreach ( $this->request->data['CustomerAddress'] as $key => $value ) {
                    if(!empty($value['address'])) {
                        $customerAddress[] = array(
                            'CustomerAddress' => array(
                                'id' => $value['id'],
                                'customer_id' => $this->Customer->id,
                                'address_name' => $value['address_name'],
                                'type' => $value['type'],
                                'address' => $value['address'],
                                'city_id' => $value['city_id'],
                                'zip' => $value['zip'],
                                'country' => $value['country']
                            )
                        );
                    }
                }
                $this->Customer->CustomerAddress->saveMany($customerAddress, array('deep', true));
                
                $customerTelephone = array();
                foreach ( $this->request->data['CustomerTelephone'] as $key => $value ) {
                    if(!empty($value['number'])) {
                        if(empty($value["id"]))
                        {
                            $customerTelephone[] = array(
                                'CustomerTelephone' => array(
                                    'customer_id' => $this->Customer->id,
                                    'type' => $value['type'],
                                    'number' => $value['number']
                                )
                            );                            
                        }
                        else
                        {
                            $customerTelephone[] = array(
                                'CustomerTelephone' => array(
                                    'id' => $value['id'],
                                    'customer_id' => $this->Customer->id,
                                    'type' => $value['type'],
                                    'number' => $value['number']
                                )
                            );                            
                        }
                    }
                }
                $this->Customer->CustomerTelephone->saveMany($customerTelephone, array('deep', true));
                
                $this->Session->setFlash(__('The customer has been saved.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again.'), 'flash_error');
            }
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
            $this->Customer->recursive = 2;
			$this->request->data = $this->Customer->find('first', $options);
            $this->set('cities', $this->Customer->CustomerAddress->City->find('list'));
		}
	}
        
	public function delete($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}        
		$this->request->allowMethod('post', 'delete');
		if ($this->Customer->delete()) {
			$this->Session->setFlash(__('The customer has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The customer could not be deleted. Please, try again.'), 'flash_success');
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function isUniqueCustomerInfo($data) {
        $customer = $this->Customer->find('count', array('conditions' => array('Customer.company_name' => $data['Customer']['company_name'])));
        if($customer > 0) {
            $this->Session->setFlash(__('error'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
        return true;
    }
}

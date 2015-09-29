<?php
App::uses('AppController', 'Controller');

class CategoryAttributesController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
    
    public $components = array('RequestHandler');
    
    
    public function findAllByCategoryId() {
        if( $this->request->query['id'] > 0 ) {
            $Attributes = $this->CategoryAttribute->Attribute->find('all');
            $CategoryAttributes = $this->CategoryAttribute->findAllByCategoryId($this->request->query['id']);
            $hasAttribute = true;
            $this->set('data', compact('CategoryAttributes', 'Attributes', 'hasAttribute'));
        } else {
            $Attributes = $this->CategoryAttribute->Attribute->find('all');
            $hasAttribute = false;
            $this->set('data', compact('Attributes', 'hasAttribute'));
        }
    }
    
    public function findAttributeByCategoryId() {
        if( $this->request->query['id'] > 0 ) {
            $this->CategoryAttribute->recursive = 0;
            $CategoryAttributes = $this->CategoryAttribute->findAllByCategoryId($this->request->query['id']);
            $this->set('data', compact('CategoryAttributes'));
        }
    }
    
    public function edit() {
        if ($this->request->is('post') && !empty($this->request->data)) {
            $dataSource = $this->CategoryAttribute->getDataSource();
            try {
                if(empty($this->request->data['CategoryAttribute']['CategoryAttributeId'])) {
                    $dataSource->begin();
                    $result = $this->CategoryAttribute->deleteAll(array('category_id' => $this->request->data['CategoryAttribute']['category_id']), false, true);
                    if(!$result) { throw new Exception(); }
                    $dataSource->commit();
                    $response = array('status' => 'success', 'message' => 'All Attribute has been deleted.');
                    $this->set('data', compact('response'));
                } else {
                    
                    $total = $this->CategoryAttribute->find('count', array(
                            'conditions' => array(
                                'category_id' => $this->request->data['CategoryAttribute']['category_id']
                                )
                            )
                        );
                    if( $total > 0 ) {
                        $result = $this->CategoryAttribute->deleteAll(array('category_id' => $this->request->data['CategoryAttribute']['category_id']), false, true);
                        if(!$result) { throw new Exception(); }
                    }
                    
                    $CategoryAttributeObj = array();
                    foreach ( $this->request->data['CategoryAttribute']['CategoryAttributeId'] as $key => $value ) {
                        $CategoryAttributeObj[] = array(
                            'CategoryAttribute' => array(
                                'category_id' => $this->request->data['CategoryAttribute']['category_id'],
                                'attribute_id' => $value
                            )
                        );
                    }
                    if(!$this->CategoryAttribute->saveMany($CategoryAttributeObj, array('deep', true)))
                        throw new Exception();
                    
                    $dataSource->commit();
                    $response = array('status' => 'success', 'message' => 'All Attribute has been updated.');
                    $this->set('data', compact('response'));
                }
            }
            catch (Exception $ex) {
                $dataSource->rollback();
                $response = array('status' => 'fail', 'message' => 'The Category could not be delete. Please, try again.');
                $this->set('data', compact('response'));
            }
        } else {            
            $response = array('status' => 'fail', 'message' => 'The Category could not be delete. Please, try again.');
            $this->set('data', compact('response'));
        }
	}
}

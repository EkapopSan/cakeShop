<?php
App::uses('AppController', 'Controller');
/**
 * ProductAttributes Controller
 *
 */
class ProductAttributesController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
    
    public $components = array('RequestHandler');    
    
    public function pickup() {
        $productAttr = $this->ProductAttribute->find('all', array(
            'fields' => 'DISTINCT ProductAttribute.value',
            'conditions' => array('ProductAttribute.attribute_id' => $this->request->query['attr_id'])
            )
        );
        $this->set('data', compact('productAttr'));
    }
    
    public function autoPickup() {
        $productAttr = $this->ProductAttribute->find('all', array(
            'fields' => 'ProductAttribute.value',
            'conditions' => array('ProductAttribute.value LIKE' => '%' . $this->request->query['value'] . '%', 
                'AND' => array('ProductAttribute.attribute_id' => $this->request->query['attr_id']))
            )
        );
        $this->set('data', compact('productAttr'));
    }

}

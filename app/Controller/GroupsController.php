<?php
App::uses('AppController', 'Controller');
class GroupsController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';

	public $helpers = array('Text', 'Js', 'Time');
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');    
    
    public function beforeFilter() {
    }
    
	public function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->Paginator->paginate());
	}
    
	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}
    
	public function add() {
		if ($this->request->is('post')) {
            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $response = array(
                    'code' => 1,
                    'status' => 'success',
                    'message' => 'The user has been created sucessfully.'
                );
                $this->set(compact('response'));
            } else {
                $this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'flash_error');
            }
		}
	}
    
	public function edit($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Group->save($this->request->data)) {
                $response = array(
                        'code' => 1,
                        'status' => 'success',
                        'message' => 'The group has been updated.'
                    );
                $this->set(compact('response'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'flash_error');
				return $this->redirect(array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
		}
        $group = $this->Group->find('first', array('fields' => array('Group.id', 'Group.name'), 'conditions' => array('Group.id' => $id)));
        $this->set('group', $group);
	}

	/**
	 * Summary of delete
     * ก่อนลบ ควรตรวจสอบดูก่อนว่ามี User อยู่ภายใต้ Group ดังกล่าวหรือเปล่า
     * ไม่ควรลบ Group ทั้งๆ ที่ยังมี User อยู่
	 * @param mixed $id 
	 * @throws NotFoundException 
	 * @return mixed
	 */
	public function delete($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
        $users = $this->Group->User->find('count', array('conditions' => array('User.group_id' => $id)));
		if($users > 0) {
			$this->Session->setFlash(__('The group could not be deleted. because has an user in this group.'), 'flash_warning');
            return $this->redirect(array('action' => 'index'));
        }
        $this->request->allowMethod('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('The group has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The group could not be deleted. Please, try again.'), 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
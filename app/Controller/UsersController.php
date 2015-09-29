<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class UsersController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time', 'Link');    
	public $components = array('Paginator', 'Acl', 'Security', 'RequestHandler', 'Session');
        
    public function beforeFilter() {
        $this->Auth->allow('login','logout');
        $this->Security->unlockedActions = array('add', 'index', 'delete', 'edit', 'changePassword');
        $this->Security->unlockedFields = array('User.remember');

    }
    
    public function login() {
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash(__('Hi '.$this->Session->read('Auth.User.username').'. You are logged in!'), 'flash_success');
            return $this->redirect('/');
        }
        $this->layout = false;
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                // did they select the remember me checkbox?
                if ($this->request->data['User']['remember_me'] == 1) {
                    
                    // remove "remember me checkbox"
                    unset($this->request->data['User']['remember_me']);

                    // hash the user's password
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);

                    // write the cookie
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                }

                $this->Session->setFlash(__('Welcome ' . $this->Auth->user('username')), 'flash_success');
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'), 'flash_login_error');
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
        
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'recursive' => 1);
		$this->set('user', $this->User->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $response = array(
                        'code' => 1,
                        'status' => 'success',
                        'message' => 'The user has been created sucessfully.'
                    );
                $this->set(compact('response'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_error');
            }
		}
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
	}

	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}        
		if ($this->request->is(array('post', 'put'))) {
            
            if($this->request->data['User']['photo']['name'] !== '') {
                $dir = new Folder('files/system/user/photo/'.$id);
                $files = $dir->find('.*\.*');
                
                foreach ($files as $file) {
                    $file = new File($dir->pwd() . DS . $file);
                    //$contents = $file->read();
                    // $file->write('I am overwriting the contents of this file');
                    // $file->append('I am adding to the bottom of this file.');
                    $file->delete(); // I am deleting this file
                    $file->close(); // Be sure to close the file when you're done
                }            
            }
            
            if ($this->User->save($this->request->data)) {
                $response = array(
                        'code' => 1,
                        'status' => 'success',
                        'message' => 'The user has been updated.'
                    );
                $this->set(compact('response'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                return $this->redirect(array('action' => 'index'));
            }            
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
        $user = $this->User->find('first', array('fields' => array('User.id', 'User.photo', 'User.photo_dir', 'User.username'), 'conditions' => array('User.id' => $id)));
		$this->set(compact('groups', 'user'));
	}

	public function changePassword($id = null) {
        if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $response = array(
                        'code' => 1,
                        'status' => 'success',
                        'message' => 'The user has been updated.'
                    );
                $this->set(compact('response'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $user = $this->User->find('first', array('fields' => array('User.id', 'User.username'), 'conditions' => array('User.id' => $id)));
		$this->set(compact('user'));
	}
    
	public function delete($id = null) {        
        $this->User->id = $id;
        if($id == 1) {
            $this->Session->setFlash(__('The Administrator user could not be deleted.'), 'flash_error');
            return $this->redirect(array('action' => 'index'));
        }
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $folder = new Folder('files/system/user/photo/'.$id);
            $folder->delete();
            $this->Session->setFlash(__('The user has been deleted.'), 'flash_success');
        } else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'flash_error');
        }
        return $this->redirect(array('action' => 'index'));
	}
}

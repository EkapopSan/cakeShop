<?php
App::uses('AppController', 'Controller');
class RolesController extends AppController {
    
	public $view = 'Theme';
	public $theme = 'FLAT';
	public $layout = 'admin';
    
	public $helpers = array('Text', 'Js', 'Time');
	public $components = array('Paginator', 'Acl', 'Security', 'RequestHandler', 'Session');
    
    public function beforeFilter() {
        $this->Auth->allow('permission', 'AssignPermission');
        $this->Security->unlockedActions = 'AssignPermission';
    }
    
	public function index() {
        $aros = $this->Acl->Aro->find('all', array('recursive' => 0));
        if(isset($this->request->params['pass'][0])) {
            $alias = $this->request->params['pass'][0];
            $aro = $this->Acl->Aro->findByAlias($alias, array('recursive' => 0));
            $this->Acl->Aco->Behaviors->load('Containable');
            $acos = $this->Acl->Aco->find('threaded', array(
                'contain' => array(
                    'Aro' => array('conditions' => 'Aro.alias= "'.$alias.'"'), 
                    'Permission'),
                'conditions' => array(
                    'Aco.sorting !=' => null
                ),
                'order' => 'Aco.sorting'
            ));
            
            $this->loadModel('Group');
            $this->loadModel('User');
            $groupId = $this->Group->field('id', array('name' => $alias));
            $this->set('users', $this->User->find('all', array(
                        'conditions' => array('User.group_id' => $groupId),
                        'fields' => array('id', 'username', 'photo', 'photo_dir')
                    )
                ));
        }
        $this->set('acl', compact('aro', 'aros', 'acos'));
	}
    
    public function AssignPermission() {
        if(count($this->request->data['AssignPermission']['ARO'])) {
            $AROs = $this->request->data['AssignPermission']['ARO'];
            $group = $this->request->data['AssignPermission']['Group'];
            foreach ($AROs as $obj)
            {
                if($obj['permission'] == 1) {
                    $this->Acl->allow($group, $obj['Aco']);
                } else if ($obj['permission'] == -1) {
                    $this->Acl->deny($group, $obj['Aco']);
                }
            }
        }
        $response = array(
                'code' => 1,
                'status' => 'success',
                'message' => 'Role has been assigned.'
            );
        $this->set(compact('response'));
    }
    
    public function AcoSync() {
        $this->autoRender = false;
        try
        {
            App::uses('ShellDispatcher', 'Console');
            $command = '-app '.APP.' AclExtras.AclExtras aco_sync';
            $args = explode(' ', $command);
            $dispatcher = new ShellDispatcher($args, false);
            $result = $dispatcher->dispatch();
            if(is_null($result)) {
                $this->Session->setFlash(__('AcoSync Completed.'), 'flash_success');
                $this->redirect('./');
            } else {
                echo $result;
            }
        }
        catch (Exception $exception)
        {
            Debugger::dump($exception);
        }
    }
}
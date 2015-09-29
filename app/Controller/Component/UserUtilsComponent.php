<?php

App::uses('Component', 'Controller');

class UserUtilsComponent extends Component {
    
    public function getUsernameById($id) {
        if(isset($id))
        {
            $UserModel = ClassRegistry::init('User');
            $user = $UserModel->findById($id);
            return $user['User']['username'];
        }
        return false;
    }
}
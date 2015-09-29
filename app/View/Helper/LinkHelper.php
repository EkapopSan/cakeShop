<?php
App::uses('AppHelper', 'View/Helper');

class LinkHelper extends AppHelper {
    
    /**
     * Summary of userAvatar
     * @param mixed $user 
     * @param Integer or String $width 
     * @param String $size eg. 'thumb_', 'vga_', 'xvga_'
     * @return Img Html Tag
     */
    public function userAvatar($user = array(), $options) {
        
        $options['src'] = $this->webroot.'files/system/user/photo/default/avatar.jpg';
        $options['alt'] = $user['User']['username'];
        $options['title'] = $user['User']['username'];
        
        if(!isset($options['class'])) {
            $options['class'] = '';
        }
        
        if(!isset($options['size'])) {
            $options['size'] = '';
        }
        
        if(!isset($options['width'])) {
            $options['width'] = 'auto';
        }
        
        if($options['width'] > 0) {
            $options['width'] = $options['width'].'px';
        }
        
        if(count($user)) {
            if($user['User']['photo'] != null) {
                $options['src'] = $this->webroot.'files/system/user/photo/'.$user['User']['photo_dir'].'/'.$options['size'].$user['User']['photo'];
            }
        }
        
        return '<img src="'.$options['src'].'" class="'.$options['class'].'" alt="'.$options['alt'].'" title="'.$options['title'].'" width="'.$options['width'].'" />';
    }
    
}
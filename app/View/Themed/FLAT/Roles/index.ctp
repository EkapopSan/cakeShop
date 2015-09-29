<div class="row-fluid">
    <div class="box">
        <div id="acl-title" class="box-title">
            <?php echo $this->element('tab_setting'); ?>
            <h3><i class="icon-check"></i>Access Control List (Role)</h3>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <div id="group-list" class="span2">
                    <h4>Groups</h4>
                    <ul class="nav nav-list">
                        <?php
                        foreach ($acl['aros'] as $aros)
                        {
                            $isActive = '';
                            if(isset($this->request->params['pass'][0])){
                                $isActive = ($aros['Aro']['alias'] == $this->request->params['pass'][0] ? 'active':'');
                            }
                            echo '<li class="' . $isActive . '"><a href="'.$this->Html->url(array('controller' => 'roles', 'action' => 'index', $aros['Aro']['alias'])).'" onclick="ajaxPageLoader.show();">&raquo; '.$aros['Aro']['alias'].'</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                
                <div id="task-list" class="span8">
                    <ul class="nav nav-pills">
                        <li class="active"><a id="task-nav-pill" href="#task-tab-content" data-toggle="pill"><i class="icon-tags"></i> Tasks</a></li>
                        <li><a id="user-nav-pill" href="#user-tab-content" data-toggle="pill"><i class="glyphicon-group"></i> Users</a></li>
                        <li class="pull-right"><a id="toggleExplandBtn" href="#" class="btn-link"><i class="glyphicon-expand"></i> Expand All</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active in fade" id="task-tab-content">
                            <?php
                            echo $this->Form->create('AssignPermission', array(
                              'url' => array(
                                'controller' => 'roles',
                                'action' => 'AssignPermission'
                                )
                              ));
                            ?>

                            <?php 
                            if(isset($this->request->params['pass'][0])) {
                                echo $this->Form->hidden('Group', array('default' => $this->request->params['pass'][0])); 
                            }
                            ?>

                            <?php 
                            function RecursiveControllers($array) {
                                if (count($array)) {
                                    if( $array[0]['Aco']['parent_id'] == 1 || $array[0]['Aco']['alias'] == 'controllers') {
                                        echo "\n<ul class=\"controllers nav nav-list\">\n";
                                    } else {
                                        echo "\n<ul class=\"controllers nav nav-list hide\">\n"; 
                                    }
                                    foreach ($array as $vals) {                                
                                        echo '<li id="'.$vals['Aco']['id'].'">';
                                        if (count($vals['children'])) {
                                            echo '<a class="toggle-list" href="#" title="'.$vals['Aco']['alias'].'">&raquo; '.$vals['Aco']['title'];
                                            echo ' ('. count($vals['children']) . ')';
                                            //GeneratePermissions($vals['Aro'], $vals['Aco']);
                                            echo '</a>';
                                            if( $vals['Aco']['alias'] == 'controllers') {
                                                RecursiveControllers($vals['children']); 
                                            } else {
                                                RecursiveActions($vals['children'], $vals['Aco']);
                                            }
                                        } else {
                                            echo '<a class="inline" href="#" title="'.$vals['Aco']['alias'].'">'.$vals['Aco']['title'];
                                            $parentObj['alias'] = '';
                                            $vals['Aco']['parentObj'] = $parentObj;
                                            GeneratePermissions($vals['Aro'], $vals['Aco']);
                                            echo '</a>';
                                        }
                                        echo "</li>\n"; 
                                    }
                                    echo "</ul>\n"; 
                                }
                            }
                    
                            function RecursiveActions($array, $parentObj) {
                                if (count($array)) {
                                    echo "\n<ul class=\"actions nav nav-list hide\">\n"; 
                                    foreach ($array as $vals) {
                                        echo "<li id=\"".$vals['Aco']['id']."\">";
                                        echo '<a class="inline gray" href="#" title="'.$vals['Aco']['alias'].'">'.$vals['Aco']['title'];
                                        $vals['Aco']['parentObj'] = $parentObj;
                                        GeneratePermissions($vals['Aro'], $vals['Aco']);
                                        echo '</a>';
                                        echo "</li>\n"; 
                                    }
                                    echo "</ul>\n"; 
                                }
                            }
                    
                            function GeneratePermissions($ARO, $ACO)
                            {
                                if($ACO['parent_id'] == null) {
                                   echo '<div class="pull-right" style="margin-right:30px;">';
                                } else if ($ACO['parent_id'] == 1) {
                                    echo '<div class="pull-right" style="margin-right:15px;">';
                                } else {
                                    echo '<div class="pull-right">';
                                }
                                echo '<ul class="inline">';
                        
                                if(count($ARO)) {
                                    foreach ($ARO as $aro)
                                    {
                                        if($aro['Permission']['_create'] == 1) {
                                            echo '<li class="assign">';
                                            echo '<i class="icon-ok"></i>';
                                            echo '<input type="hidden" name="data[AssignPermission][ARO]['.$ACO['id'].'][Aco]" value="controllers/'.$ACO['parentObj']['alias'].'/'.$ACO['alias'].'" />';
                                            echo '<input type="hidden" class="permission" name="data[AssignPermission][ARO]['.$ACO['id'].'][permission]" value="1" />';
                                            echo '</li>';
                                        } else {
                                            echo '<li class="assign">';
                                            echo '<i class="icon-remove-circle"></i>';
                                            echo '<input type="hidden" name="data[AssignPermission][ARO]['.$ACO['id'].'][Aco]" value="controllers/'.$ACO['parentObj']['alias'].'/'.$ACO['alias'].'" />';
                                            echo '<input type="hidden" class="permission" name="data[AssignPermission][ARO]['.$ACO['id'].'][permission]" value="-1" />';
                                            echo '</li>';
                                        }
                                    }
                                } else {
                                    echo '<li class="assign">';
                                    echo '<i class="icon-remove-circle"></i>';
                                    echo '<input type="hidden" name="data[AssignPermission][ARO]['.$ACO['id'].'][Aco]" value="controllers/' . $ACO['parentObj']['alias'].'/'.$ACO['alias'].'" />';
                                    echo '<input type="hidden" class="permission" name="data[AssignPermission][ARO]['.$ACO['id'].'][permission]" value="-1" />';
                                    echo '</li>';
                                }
                                echo '</ul></div>';
                            }
                    
                            if(isset($acl['acos'])) {
                                RecursiveControllers($acl['acos']);
                            }
                            ?>

                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="tab-pane in fade" id="user-tab-content">
                            <table class="table table-hover table-nomargin table-condensed">
                                <tbody>
                                    <?php if(isset($this->request->params['pass'][0])) { ?>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td class="id"><span class="badge"><?php echo h($user['User']['id']); ?></span></td>
                                        <td class="img">
                                            <?php echo $this->Link->userAvatar($user, array('class' => 'circular', 'size' => 'thumb_', 'width' => 40)); ?>
                                        </td>
                                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                        <td class="action">
                                            <?php 
                                            echo $this->Html->link(
                                                __('<i class="icon-folder-open-alt"></i> View'), 
                                                $this->Html->url('/users/view/'.$user['User']['id'], true),
                                                array(
                                                    'class' => 'btn',
                                                    'onclick' => 'ajaxPageLoader.show();',
                                                    'escape' => false
                                                )
                                            ); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="control-nav" class="span2 pull-right">
                    <div class="control-group">
                        <h4>Tools</h4>
                        <p>Groups / Roles</p>
                        <a href="#" class="btn-block btn btn-primary" 
                            <?php 
                            if(isset($this->request->params['pass'][0])) {                                 
                                if($acl['aro']['Aro']['alias'] != 'Administrator' && $acl['aro']['Aro']['id'] != 1) { ?> 
                                    onclick="$('#AssignPermissionIndexForm').submit(); return false;"
                            <?php
                                } 
                            } 
                            ?>
                            ><i class="icon-save"></i> Save</a>
                        <a href="#" class="btn-block btn"><i class="icon-hdd"></i> Backup</a>
                        <a href="#" class="btn-block btn"><i class="icon-refresh"></i> Restore</a>
                        <a href="#" class="btn-block btn"><i class="icon-reply"></i> Load Default</a>
                        <br /><br />
                        <p>Session Users</p>
                        <a href="#" class="btn-block btn"><i class="icon-folder-open-alt"></i> Show All Session</a>
                        <a href="#" class="btn-block btn btn-warning"><i class="icon-trash"></i> Destroy Session</a>
                        <br /><br />
                        <p>ACOs Settings</p>
                        <a href="<?php echo $this->Html->url(array('controller' => 'roles', 'action' => 'AcoSync')); ?>" 
                            class="btn-block btn btn-success"><i class="icon-refresh"></i> AcoSync</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flash alert alert-success">
    <i class="icon-ok-circle"></i> <span class="msg"></span>
</div>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php if(isset($this->request->params['pass'][0])) { echo $this->Form->input('isAdminRole', array('type' => 'hidden', 'default' => ($acl['aro']['Aro']['alias'] == 'Administrators'?'1':'-1'))); } ?>
<?php echo $this->Html->css('role.index'); ?>
<?php echo $this->Html->script('role.index'); ?>
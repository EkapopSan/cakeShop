<div class="row-fluid">
    <div class="box">
        <div class="box-title">
            <?php $options = array(
                      'addBtn' => $this->Html->link(__('<i class="glyphicon-user_add"></i> New User'), 
                                    array('action' => 'add'),
                                    array(
                                        'type' => 'button', 
                                        'class' => 'btn btn-primary', 
                                        'role' => 'button',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#addModal',
                                        'escape' => false
                                    )
                                )
                      ); ?>
            <?php echo $this->element('tab_setting', array('options' => $options)); ?>
            <div class="title-bar">
                <h3><i class="glyphicon-user"></i>User List</h3>
                <div class="pull-left"><?php echo $this->element('search-form'); ?></div>
                <div class="pull-right"><?php echo $this->element('paginator'); ?></div>
                <div class="pull-right"><?php echo $this->element('page-counter'); ?></div>
            </div>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <table class="table table-hover table-nomargin table-condensed">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('image'); ?></th>
                            <th><?php echo $this->Paginator->sort('username'); ?></th>
                            <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><span class=""><?php echo h($user['User']['id']); ?></span></td>
                            <td>
                                <?php echo $this->Link->userAvatar($user, array('class' => 'circular', 'size' => 'thumb_', 'width' => 40)); ?>
                            </td>
                            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                            <td>
                                <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'roles', 'action' => 'index', $user['Group']['name'])); ?>
                            </td>
                            <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                            <td class="actions">
                                <div class="btn-group">
                                    <?php echo $this->Html->link(__('<i class="icon-folder-open-alt"></i> View'), array('action' => 'view', $user['User']['id']), array('class' => 'btn', 'escape' => false)); ?>
                                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <?php 
                                                echo $this->Html->link(__('<i class="icon-pencil"></i> Edit User'), 
                                                    array('controller' => 'users', 'action' => 'edit', $user['User']['id']),
                                                    array(
                                                        'type' => 'button', 
                                                        'class' => '', 
                                                        'role' => 'button',
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#editModal',
                                                        'escape' => false
                                                    )
                                                ); 
                                            ?>
                                        </li>
                                        <li>
                                            <?php 
                                              echo $this->Html->link(__('<i class="icon-trash"></i> Delete'),
                                                    '#',
                                                    array(
                                                      'type' => 'button', 
                                                      'class' => 'btnDeleteUser',
                                                      'role' => 'button',
                                                      'data-toggle' => 'modal',
                                                      'data-target' => '#deleteConfirm',
                                                      'onclick' => 'setUserDeleteFormURL(\''.$this->Html->url(array('controller' => 'users', 'action' => 'delete', $user['User']['id'])).'\');',
                                                      'escape' => false
                                                    )
                                                  );
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('modal_crud'); ?>
<?php echo $this->element('modal_change_password'); ?>
<?php echo $this->element('modal_ajax_message', array('icon' => 'icon-ok', 'status' => 'Success', 'message' => 'The user has been saved.')); ?>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->script('user.index'); ?>
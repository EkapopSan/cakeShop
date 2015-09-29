<div class="users view">
    <div class="row-fluid">
        <div class="span9">
            <fieldset>
                <legend>
                    <?php echo $this->Html->link('<i class="glyphicon-unshare"></i>', array('controller' => 'users', 'action' => 'index'), array('rel' => 'tooltip', 'title' => 'back', 'escape' => false)); ?>
                     User::<span class="gray-light"><?php echo h($user['User']['username']); ?></span>
                </legend>
                <div class="span3">
                    <div style="padding: 5px; border: 1px solid #ccc; display: inline-block;">
                        <?php echo $this->Link->userAvatar($user, array('width' => 200)); ?>
                    </div>
                </div>
                <div class="span8">
                    <p><span class="badge"><?php echo h($user['User']['id']); ?></span></p>
                    <p class="font-2x">
					    <?php echo h($user['User']['username']); ?> / 
                        <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id']), array('rel' => 'tooltip', 'title' => 'Group')); ?>
                    </p>
                    <ul class="breadcrumb">
                        <li><i class="icon-time"></i> </li>
						<li><a href="#" rel="tooltip" title="Created"><?php echo h($user['User']['created']); ?></a> 
                            <span class="divider">/</span></li>
						<li><a href="#" rel="tooltip" title="Modified"><?php echo h($user['User']['modified']); ?></a></li>
					</ul>
                    <hr />
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="glyphicon-home"></i> Home</a></li>
                            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="glyphicon-user"></i> Profile</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="glyphicon-flash"></i> Messages</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="glyphicon-cogwheel"></i> Settings</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade" id="home">Home</div>
                            <div role="tabpanel" class="tab-pane fade in active" id="profile">
                                <div class="font-2x"><span>Ekapop Sansuk</span></div>
                                <div><i>Web Developer</i></div>
                                <br />
                                <p>
                                    Lorem ipsum Sed eiusmod eiusmod eu dolore qui ut sit sit sint elit tempor irure. Lorem ipsum Irure veniam non ea aliqua laboris et voluptate. Lorem ipsum 
                                    Amet enim nisi pariatur sit consequat occaecat non. Lorem ipsum Reprehenderit dolor aliquip nostrud sunt deserunt dolor ad veniam.
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages">
                                <div class="clearfix">
                                    2015-01-02 12:29:41
                                    <div class="pull-right">Last Access time</div>
                                </div>
                                <div class="clearfix">
                                    2015-01-02 12:29:41
                                    <div class="pull-right">Print Purchase Order No. 10257</div>
                                </div>
                                <div class="clearfix">
                                    2015-01-02 12:29:41
                                    <div class="pull-right">Create Purchase Order No. 10257</div>
                                </div>
                                <div class="clearfix">
                                    <hr />
                                    <div class="pull-right"><a href="#" class="btn"><i class="icon-refresh"></i> Refresh</a></div>
                                    <div class="pull-right"><a href="#" class="btn"><i class="glyphicon-file_export"></i> Export</a></div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="settings">
                                <h5>Password</h5>
                                <div><i class="glyphicon-keys"></i> Password strength<div class="pull-right"><span class="badge badge-success">Great</span></div></div>
                                <div class="clearfix"><i class="icon-time"></i> Last Modified<div class="pull-right">2015-01-02 12:29:41</div></div>
                                <div class="clearfix"><a href="#"><i class="glyphicon-edit"></i> Change Password</a></div>
                                <h5>Access Control List</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="span3">
            <fieldset>
                <legend><?php echo __('Actions'); ?></legend>
                <div class="well">
                    <p>User</p>
                    <?php echo $this->Html->link(__('<i class="glyphicon-user"></i> List Users'), array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-default btn-block', 'escape' => false)); ?>
                    <?php echo $this->Html->link(__('<i class="glyphicon-user_add"></i> New User'), array('action' => 'add'), array('type' => 'button', 'class' => 'btn btn-default btn-block', 'escape' => false)); ?>
                    <?php 
                    echo $this->Html->link(__('<i class="glyphicon-pencil"></i> Edit User'), 
                            array('controller' => 'users', 'action' => 'edit', $user['User']['id']),
                            array(
                                'type' => 'button', 
                                'class' => 'btn btn-block', 
                                'role' => 'button',
                                'data-toggle' => 'modal',
                                'data-target' => '#editModal',
                                'escape' => false
                            )
                        ); 
                    ?>
                    <?php 
                    echo $this->Html->link(__('<i class="glyphicon-bin"></i> Delete'), 
                            '#',
                            array(
                                'type' => 'button', 
                                'class' => 'btn btn-danger btn-block', 
                                'role' => 'button',
                                'data-toggle' => 'modal',
                                'data-target' => '#deleteConfirm',
                                'escape' => false
                            )
                        ); 
                    ?>
                    <br />
                    <p>Group</p>
                    <?php echo $this->Html->link(__('<i class="glyphicon-group"></i> List Groups'), array('controller' => 'groups', 'action' => 'index'), array('type' => 'button', 'class' => 'btn btn-default btn-block', 'escape' => false)); ?> 
                    <?php echo $this->Html->link(__('<i class="icon-plus-sign"></i> New Group'), array('controller' => 'groups', 'action' => 'add'), array('type' => 'button', 'class' => 'btn btn-default btn-block', 'escape' => false)); ?>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<?php echo $this->element('modal_delete_confirm', array('id' => $user['User']['id'])); ?>
<?php echo $this->element('modal_edit'); ?>
<?php echo $this->element('modal_change_password'); ?>
<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<script>
    var pageVars = {
        hasUserUpdate: false,
        timeout: [],
        webroot: document.getElementById('WEBROOT').value
    }
</script>
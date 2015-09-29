<div class="users form">
    <div class="row-fluid">
        <div class="span12">
            <fieldset>
                <legend>
                    Edit::<span class="base-blue"><?php  echo $user['User']['username']; ?></span>
                </legend>
                <?php echo $this->Form->create('User', array('type' => 'file')); ?>
                    <div class="span4">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail">
                                <?php echo $this->Link->userAvatar($user, array('size' => 'vga_')); ?>
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-file">
                                    <span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                    <?php echo $this->Form->input('User.photo', array('type' => 'file', 'options' => array('accept' => 'image/*'), 'div' => false, 'label' => false)); ?>
                                    <?php echo $this->Form->input('User.photo_dir', array('type' => 'hidden')); ?>
                                </span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="span7">
                        <?php echo $this->Form->input('User.id'); ?>
                        <?php echo $this->Form->input('User.username', array('autocomplete' => 'off', 'class' => 'username')); ?>
                        <?php echo $this->Form->input('User.group_id', array('default'=>'8')); ?>
                        <p>
                            <?php 
                                echo $this->Html->link(__('<i class="icon-lock"></i> Change password'), 
                                    array('controller' => 'users', 'action' => 'changePassword', $user['User']['id']),
                                    array(
                                        'id' => 'changePassword',
                                        'type' => 'button', 
                                        'class' => 'btn-link', 
                                        'role' => 'button',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#changePasswordModal',
                                        'escape' => false
                                    )
                                ); 
                            ?>
                        </p>
                    </div>
                <?php echo $this->Form->end(); ?>
            </fieldset>
        </div>
    </div>
</div>

<?php echo $this->Html->script('user.edit'); ?>
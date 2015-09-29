<div class="users form">
    <div class="row-fluid">
        <div class="span12">
            <fieldset>
                <legend>
                    User::Create new user
                </legend>
                <?php echo $this->Form->create('User', array('type' => 'file')); ?>
                    <div class="span4">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" />
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
                        <?php echo $this->Form->input('User.username', array('autocomplete' => 'off')); ?>
                        <?php echo $this->Form->input('User.group_id', array('default'=>'8')); ?>
                        <?php echo $this->Form->input('User.password', array('type' => 'password')); ?>
                        <?php echo $this->Form->input('User.passwordConfirm', array('type' => 'password')); ?>
                        <?php
                        if(!$this->request->params['isAjax']) {
                            echo $this->Html->link(__('<i class="icon-save"></i> Save'), 
                                            '#',
                                            array(
                                                'type' => 'button', 
                                                'class' => 'btn btn-large', 
                                                'escape' => false
                                            )
                                        ); 
                        }
                        ?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </fieldset>
        </div>
    </div>
</div>

<input id="BaseURL" type="hidden" value="<?php echo $this->base; ?>" />
<?php echo $this->Html->script('user.add'); ?>
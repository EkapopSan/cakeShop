<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend>Group::<span class="gray-light"><?php echo __('Add Group'); ?></span></legend>
	    <?php echo $this->Form->input('name', array('autocomplete' => 'off')); ?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php echo $this->Html->script('group.add'); ?>
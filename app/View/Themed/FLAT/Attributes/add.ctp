<div class="attributes form">
<?php echo $this->Form->create('Attribute'); ?>
	<fieldset>
		<legend><?php echo __('Add Attribute'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
</div>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->script('attribute.add'); ?>
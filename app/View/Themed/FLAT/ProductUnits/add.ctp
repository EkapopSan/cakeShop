<div class="productLabels form">
<?php echo $this->Form->create('ProductUnit'); ?>
	<fieldset>
		<legend><?php echo __('Add Unit'); ?></legend>
	<?php
		echo $this->Form->input('name');
        echo $this->Form->input('description');
	?>
	</fieldset>
</div>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->script('productUnit.add'); ?>
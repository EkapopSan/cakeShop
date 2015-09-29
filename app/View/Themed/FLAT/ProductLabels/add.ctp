<div class="productLabels form">
<?php echo $this->Form->create('ProductLabel'); ?>
	<fieldset>
		<legend><?php echo __('Add Label'); ?></legend>
	<?php
		echo $this->Form->input('title');
        echo $this->Form->input('description');
	?>
	</fieldset>
</div>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->script('productLabel.add'); ?>
<div class="manufacturers form">
<?php echo $this->Form->create('Manufacturer'); ?>
	<fieldset>
		<legend><?php echo __('Add Manufacturer'); ?></legend>
	<?php
		echo $this->Form->input('name');
        echo $this->Form->input('description');
	?>
	</fieldset>
</div>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->script('manufacturer.add'); ?>
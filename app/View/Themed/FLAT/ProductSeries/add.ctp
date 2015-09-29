<div class="productSeries form">
<?php echo $this->Form->create('ProductSeries'); ?>
	<fieldset>
		<legend><?php echo __('Add Series'); ?></legend>
	<?php
        echo $this->Form->input('name');
		echo $this->Form->input('brand_id');
		echo $this->Form->input('information');
	?>
	</fieldset>
</div>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->script('productSeires.add'); ?>
<div class="attributes form">
<?php echo $this->Form->create('ProductSeries'); ?>
	<fieldset>
		<legend><?php echo __('Edit Product Series'); ?></legend>
	<?php
        echo $this->Form->input('id');
		echo $this->Form->input('name');
        echo $this->Form->input('brand_id');
		echo $this->Form->input('information');
	?>
	</fieldset>
</div>
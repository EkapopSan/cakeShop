<div class="productSeries view">
<h2><?php echo __('Product Series'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productSeries['ProductSeries']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productSeries['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $productSeries['Brand']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($productSeries['ProductSeries']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Information'); ?></dt>
		<dd>
			<?php echo h($productSeries['ProductSeries']['information']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product Series'), array('action' => 'edit', $productSeries['ProductSeries']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product Series'), array('action' => 'delete', $productSeries['ProductSeries']['id']), array(), __('Are you sure you want to delete # %s?', $productSeries['ProductSeries']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Series'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Series'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>

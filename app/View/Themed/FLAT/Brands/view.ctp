<div class="brands view">
<h2><?php echo __('Brand'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Information'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['information']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Brand'), array('action' => 'edit', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Brand'), array('action' => 'delete', $brand['Brand']['id']), array(), __('Are you sure you want to delete # %s?', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Series'), array('controller' => 'product_series', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Series'), array('controller' => 'product_series', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Product Series'); ?></h3>
	<?php if (!empty($brand['ProductSeries'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Brand Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Information'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($brand['ProductSeries'] as $productSeries): ?>
		<tr>
			<td><?php echo $productSeries['id']; ?></td>
			<td><?php echo $productSeries['brand_id']; ?></td>
			<td><?php echo $productSeries['name']; ?></td>
			<td><?php echo $productSeries['information']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'product_series', 'action' => 'view', $productSeries['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'product_series', 'action' => 'edit', $productSeries['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'product_series', 'action' => 'delete', $productSeries['id']), array(), __('Are you sure you want to delete # %s?', $productSeries['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Series'), array('controller' => 'product_series', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

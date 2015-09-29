<div class="productLabels view">
<h2><?php echo __('Product Label'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productLabel['ProductLabel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($productLabel['ProductLabel']['title']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product Label'), array('action' => 'edit', $productLabel['ProductLabel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product Label'), array('action' => 'delete', $productLabel['ProductLabel']['id']), array(), __('Are you sure you want to delete # %s?', $productLabel['ProductLabel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Labels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Label'), array('action' => 'add')); ?> </li>
	</ul>
</div>

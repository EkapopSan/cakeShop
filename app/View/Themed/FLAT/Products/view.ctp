<div class="products view">
    <div class="pull-left">
        <h2><?php echo h($product['Product']['name']); ?></h2>
    </div>
    <div class="pull-right">
        <div class="row">
            <div class="span2">
                <div class="actions">
                    <div class="btn-group dropdown">
                        <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id']), array('class' => 'active')); ?> </li>
                            <li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
                            <li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
                            <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
                            <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
                            <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
                            <li><?php echo $this->Html->link(__('List Attributes'), array('controller' => 'attributes', 'action' => 'index')); ?> </li>
                            <li><?php echo $this->Html->link(__('New Attribute'), array('controller' => 'attributes', 'action' => 'add')); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-hover table-nomargin table-condensed">
        <thead>
            <tr>
                <th>name</th>
                <th>value</th>
                <th>
                    <div class="actions">
                        <div class="btn-group dropdown">
                            <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id']), array('class' => 'active')); ?> </li>
                                <li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
                                <li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
                                <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
                                <li><?php echo $this->Html->link(__('List Attributes'), array('controller' => 'attributes', 'action' => 'index')); ?> </li>
                                <li><?php echo $this->Html->link(__('New Attribute'), array('controller' => 'attributes', 'action' => 'add')); ?> </li>
                            </ul>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr><td><?php echo __('Id'); ?></td><td><?php echo h($product['Product']['id']); ?></td><td></td></tr>
            <tr><td><?php echo __('Category'); ?></td><td><?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Product']['category_id'])); ?></td><td></td></tr>
            <tr><td><?php echo __('Name'); ?></td><td><?php echo h($product['Product']['name']); ?></td><td></td></tr>
            <tr><td><?php //echo __('Price'); ?></td><td><?php //echo h($product['Product']['price']); ?></td><td></td></tr>
        </tbody>
    </table>
</div>
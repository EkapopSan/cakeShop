<div class="products row-fluid">
    <div class="box">
        <div class="box-title">
            <h2>Edit Product</h2>
        </div>
        <div class="box-content">
            <div class="span6">
                <?php echo $this->Form->create('Product'); ?>
                <fieldset>
                    <legend><?php echo __('Product Information'); ?></legend>
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('name');
                    //echo $this->Form->input('price', array('type' => 'number', 'default' => '0'));
                    ?>
                </fieldset>
                <fieldset>
                    <legend>Properties of Product</legend>
                    <?php    
                    foreach ($categoryAttributes as $key => $obj) {
                        echo $this->Form->hidden('ProductAttributes.' . $obj['CategoryAttribute']['attribute_id'] . '.id', array('default' => $obj['ProductAttribute'][0]['id']));
                        echo $this->Form->hidden('ProductAttributes.' . $obj['CategoryAttribute']['attribute_id'] . '.category_attribute_id', array('default' => $obj['ProductAttribute'][0]['category_attribute_id']));
                        echo $this->Form->input('ProductAttributes.' . $obj['CategoryAttribute']['attribute_id'] . '.value', array('label' => $obj['Attribute']['name'], 'default' => $obj['ProductAttribute'][0]['value']));
                    }
                    ?>
                </fieldset>
                <button type="submit" class="btn btn-primary"><i class="icon icon-save"></i> Save</button>
                <?php echo $this->Form->end(); ?>
            </div>
            <div class="span5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'homes')); ?>">Home</a> <span class="divider">/</span></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">Product</a> <span class="divider">/</span></li>
                    <li class="active">Add</li>
                </ul>
                <h4>Related Link</h4>
                <p>
                    <ul class="nav nav-tabs nav-stacked">
                        <li>
                            <a href="#select-category"><i class="icon icon-home"></i>Select category</a>
                        </li>
                        <li>
                            <a href="#fill-info"><i class="icon-comment-alt"></i>Fill Product information</a>
                        </li>
                        <li>
                            <a href="#fill-attr"><i class="icon-heart-empty"></i>Fill Product Attribute</a>
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="editConfirm" class="modal hide fade" data-backdrop="static">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4>Confirm?</h4>
    </div>
    <div class="modal-body">
        Please confirm again!
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" data-loading-text="Saving..."><i class="icon icon-ok"></i> Submit</button>
    </div>
</div>

<input id="BaseURL" type="hidden" value="<?php echo $this->base; ?>" />
<?php echo $this->Html->script('product.edit'); ?>
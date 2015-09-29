<?php 
    $tab_options = array(
        'addBtn' => $this->Html->link(__('<i class="glyphicon-circle_plus"></i> New Series'), 
                    array('action' => 'add'),
                    array(
                        'type' => 'button', 
                        'class' => 'btn btn-primary', 
                        'role' => 'button',
                        'data-toggle' => 'modal',
                        'data-target' => '#addModal',
                        'escape' => false
                    )
                )
        );
      $table_options = array(
            'obj' => $productSeries,
            'columns' => array('id', 'name', 'brand', 'description'),
            'fields' => array('id', 'name', array('Brand' => 'name'), 'information'),
            'actions' => array('edit', 'delete')
        );
?>

<div class="row-fluid">
    <div class="box">
        <div class="box-title">
            <?php echo $this->element('tab_product', array('options' => $tab_options)); ?>
            <h3><i class="glyphicon-show_thumbnails"></i> Product Series</h3>
            <div class="pull-left"><?php echo $this->element('search-form'); ?></div>
            <div class="pull-right"><?php echo $this->element('paginator'); ?></div>
            <div class="pull-right"><?php echo $this->element('page-counter'); ?></div>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <?php echo $this->element('table_template', array('options' => $table_options)); ?>
                <div class="space-bottom"></div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('modal_crud'); ?>
<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->script('productSeries.index'); ?>
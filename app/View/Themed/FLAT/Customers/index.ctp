<?php
    $tab_options = array(
        'addBtn' => $this->Html->link(__('<i class="glyphicon-circle_plus"></i> New Contact'), 
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
            'obj' => $customers,
            'columns' => array('id', 'Name', 'Company', 'Email', 'Status'),
            'fields' => array('id', 'first_name', 'company_name', 'email', 'status'),
            'actions' => array('view', 'edit', 'delete')
        );
?>

<div class="row-fluid">
    <div class="box">
        <div class="box-title">
            <h3><i class="glyphicon-adress_book"></i>Contacts List</h3>
            <div class="pull-left">
                <?php echo $this->element('search-form'); ?>
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-filter"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#filterModal" role="button" data-toggle="modal">
                                <i class="icon-filter"></i> Filter Search
                            </a>
                        <li>
                            <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>">
                                <i class="icon-remove-circle"></i> Clear filter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pull-right">
            <ul class="nav nav-tabs">
                <?php echo $this->element('caption_settings', array('options' => (isset($tab_options)?$tab_options:null))); ?>
            </ul>
            <?php echo $this->Html->script('box-title-tab'); ?></div>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <?php echo $this->element('table_template', array('options' => $table_options)); ?>
                <div class="pull-right"><?php echo $this->element('paginator'); ?></div>
                <div class="pull-left"><?php echo $this->element('page-counter'); ?></div>
                <div class="space-bottom"></div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('modal_crud'); ?>
<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->script('customer.index'); ?>
<div id="filterModal" class="modal modal-lg hide fade">
    <div class="modal-header">
        <h3 class="gray">Filter Search<div class="pull-right"><i class="icon-filter"></i></div></h3>
    </div>
    <div class="modal-body">
        <?php echo $this->Form->create(false, array('type' => 'get', 'id' => 'CustomerSearchForm')); ?>
        <div class="row-fluid">
            <div class="span5">
                <?php
                
                $queries = $this->request->query;
                
                echo $this->Form->input('Customer.first_name', array('default' => empty($queries['first_name']) ? '' : $queries['first_name']));
                echo $this->Form->input('Customer.company_name', array('default' => empty($queries['company_name']) ? '' : $queries['company_name']));
                //echo $this->Form->input('CustomerAddress.city_id', array('default' => empty($queries['city_id']) ? 2 : $queries['city_id']));
                ?>
            </div>
            <div class="span5">
                <?php
                echo $this->Form->input('Customer.email', array('default' => empty($queries['email']) ? '' : $queries['email']));
                echo $this->Form->input('Customer.TaxId', array('default' => empty($queries['TaxId']) ? '' : $queries['TaxId']));
                //echo $this->Form->input('Customer.credit_term', array(
                //    'options' => array('0' => '0', '1' => '7', '2' => '15', '3' => '30', '4' => '45'), 
                //    'default' => empty($queries['credit_term']) ? 0 : $queries['credit_term']));
                ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="modal-footer">
        <div class="pull-left"></div>
        <button type="submit" class="btn btn-primary" onclick="$('#CustomerSearchForm').submit();"><i class="icon-ok-circle"></i> Submit</button>
        <button type="reset" data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>

<style>
    #filterModal,
    #filterModal .modal-body
    {
        width: 650px;
    }
</style>
<script>
    $('#CustomerSearchForm').submit(function (e) {
        ajaxPageLoader.show();
    });
</script>
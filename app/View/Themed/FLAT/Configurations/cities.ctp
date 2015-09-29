<div class="row-fluid">
    <div class="box">
        <div class="box-title">
            <?php echo $this->element('tab_setting'); ?>
            <div class="title-bar">
                <h3><i class="glyphicon-adjust_alt"></i>Cities</h3>
            </div>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <div class="span2">
                    <?php echo $this->element('nav_system_settings'); ?>
                </div>
                <div class="span10">
                    <h4>Thailand</h4>
                    <hr />
                    <?php $this->ConfigurationPage->citiesTable($cities); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->css('configuration.city'); ?>
<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
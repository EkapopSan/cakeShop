<div class="row-fluid">
    <div class="box">
        <div class="box-title">
            <?php echo $this->element('tab_setting'); ?>
            <div class="title-bar">
                <h3><i class="glyphicon-building"></i>Company Information</h3>
            </div>
        </div>
        <div class="box-content">
            <div class="row-fluid">
            </div>
        </div>
    </div>
</div>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<div id="wrapper" class="users form">
    <div class="row-fluid">
        <div class="span12">
            <fieldset>
                <legend>Edit::<span class="base-blue"><?php  echo $group['Group']['name']; ?></span></legend>
                <?php echo $this->Form->create('Group'); ?>
                <div class="span4">
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('name');
                    ?>
                </div>
                <?php echo $this->Form->end(); ?>
            </fieldset>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        // Disable caching of AJAX responses
        cache: true
    });
</script>
<?php echo $this->Html->script('group.edit'); ?>
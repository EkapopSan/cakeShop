<li class="dropdown pull-right" role="button" data-toggle="modal" rel="tooltip" data-placement="bottom" data-original-title="Settings.">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon-cogwheels"></i></a>
    <ul class="dropdown-menu pull-right">
        <li><a href="/cakeShop/attributes"><i class="glyphicon-show_thumbnails_with_lines"></i> Item Attribute</a></li>
        <li><a href="/cakeShop/labels"><i class="icon-tags"></i> Product Label</a></li>
        <li><a href="/cakeShop/units"><i class="glyphicon-cargo"></i> Unit Measure</a></li>
    </ul>
</li>
<li class="dropdown pull-right" role="button" data-toggle="modal" rel="tooltip" data-placement="bottom" data-original-title="Refresh.">
    <a href="#" onclick="$(this).find('i').addClass('icon-spin'); ajaxPageLoader.show(); location.reload();"><i class="glyphicon-refresh"></i></a>
</li>
<?php if(isset($options['addBtn'])) { ?>
<li class="pull-right">
    <?php echo $options['addBtn'] ?>
</li>
<?php } ?>

<style>
    .box .box-title
    {
        padding-bottom: 0px !important;
    }
    .box .box-title .pull-right > .nav-tabs
    {
        margin-bottom: 0;
        border-bottom: none;
    }
</style>
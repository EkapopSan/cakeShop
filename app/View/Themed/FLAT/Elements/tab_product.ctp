<?php
$nav_product = array('Products');
$nav_category = array('Categories', 'Series', 'Brands', 'Manufacturer');
$nav_product_relation = array('CrossProducts', 'RelationProduct');
$nav_more = array('Attributes', 'Labels', 'Units');
?>
<ul class="nav nav-tabs">
    <li class="<?php echo (in_array($this->name, $nav_product) ? 'active':''); ?>">
        <a href="<?php echo (!in_array($this->name, $nav_product) ? $this->Html->url(array('controller' => 'products')) : '#'); ?>"><i class="icon-barcode"></i> Products</a>
    </li>
    <li class="dropdown<?php echo (in_array($this->name, $nav_category) ? ' active':''); ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sitemap"></i> Category <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'categories')); ?>"><i class="icon-sitemap"></i> Categories</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'productseries')); ?>"><i class="glyphicon-show_thumbnails"></i> Product Series</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'brands')); ?>"><i class="glyphicon-certificate"></i> Brands</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'manufacturers')); ?>"><i class="glyphicon-global"></i> Manufacturer</a></li>
        </ul>
    </li>
    <li class="dropdown<?php echo (in_array($this->name, $nav_product_relation) ? ' active':''); ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon-share_alt"></i> Product Relations <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'crossproduct')); ?>"><i class="glyphicon-random"></i> Cross Product</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'relatedproduct')); ?>"><i class="glyphicon-share_alt"></i> Related Product</a></li>
        </ul>
    </li>
    <li class="dropdown<?php echo (in_array($this->name, $nav_more) ? ' active':''); ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-plus-sign"></i> More... <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'attributes')); ?>"><i class="glyphicon-show_thumbnails_with_lines"></i> Item Attribute</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'productLabels')); ?>"><i class="icon-tags"></i> Product Label</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'productUnits')); ?>"><i class="glyphicon-cargo"></i> Unit Measure</a></li>
        </ul>
    </li>
    <?php echo $this->element('caption_settings', array('options' => (isset($options)?$options:null))); ?>
</ul>
<?php echo $this->Html->script('box-title-tab'); ?>
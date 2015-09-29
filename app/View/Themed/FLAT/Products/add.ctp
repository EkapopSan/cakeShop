<div class="products row-fluid">
    <div class="box">
        <div class="box-title">
            <?php echo $this->element('tab_product'); ?>
            <h3><i class="icon-barcode"></i>Add New Product</h3>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <div class="span8">
                    <?php echo $this->Form->create('Product'); ?>
                    <div id="select-category" class="well">
                        <fieldset>
                            <legend>1. Select category</legend>
                            <blockquote><div id="CategoryName"></div></blockquote>
                            <?php echo $this->Form->hidden('category_id', array('type' => 'number', 'default' => '0')); ?>
                            <button type="button" role="button" class="btn btn-primary" data-toggle="modal" data-target="#modalChooseCategory">
                                Choose Category <i class="glyphicon-more"></i>
                            </button>
                        </fieldset>
                    </div>
                    <div id="fill-info" class="well">
                        <fieldset>
                            <legend>2. Fill Product information</legend>
                            <div class="span5">                                
                                <?php
                                echo $this->Form->input('name');
                                echo $this->Form->input('series_id');
                                echo $this->Form->input('brand_id');
                                ?>
                            </div>
                            <div class="span3">
                                <?php
                                echo $this->Form->input('manufacturer_id');
                                echo $this->Form->input('label_id');
                                ?>
                            </div>
                            <div class="span8">
                                <br />
                                <p><i>*สัญลักษณ์ - (ขีดกลาง) คือ ไม่ระบุ</i></p>
                            </div>
                        </fieldset>
                    </div>
                    <div id="pricing" class="well">
                        <fieldset>
                            <legend>3. Pricing <div class="pull-right"><p style="font-size:small"><i>ราคาต่อ 1 หน่วยบรรจุ</i></p></div></legend>

                            <div class="base-price-wrapper">                            
                                <?php 
                                echo $this->Form->input('ProductPricing.0.amount', array('id' => false, 'label' => 'Base price', 'type' => 'number', 'default' => '1', 'class' => 'inp-amount'));
                                echo $this->Form->input('MOQ', array('id' => 'MOQ', 'type' => 'number', 'default' => '1'));
                                echo $this->Form->input('unit_id');
                                ?>
                            </div>
                            <hr />
                            <table id="pricing-table">
                                <thead>
                                    <td>Amount</td>
                                    <td>Value</td>
                                    <td>Disc. Type</td>
                                    <td>Unit</td>
                                    <td>Amount/Packet</td>
                                </thead>
                                <tbody>
                                    <?php
                                    for($i = 1; $i < 2; $i++) {
                                        echo '<tr>';
                                        echo '<td>' . $this->Form->input('ProductPricing.'.$i.'.amount', array('id' => false, 'label' => false, 'type' => 'number', 'default' => '1', 'class' => 'inp-amount')) . '</td>';
                                        echo '<td>' . $this->Form->input('ProductPricing.'.$i.'.value', array('id' => false, 'label' => false, 'type' => 'number', 'default' => '0', 'class' => 'inp-value')) . '</td>';                            
                                        echo '<td>' . $this->Form->input('ProductPricing.'.$i.'.type', array('id' => false, 'label' => false, 'options' => array('percent' => '%','Baht' => '฿'), 'class' => 'disc-type')) . '</td>';
                                        echo '<td>' . $this->Form->input('unit_id', array('id' => false, 'label' => false, 'class' => 'packet-type')) . '</td>';
                                        echo '<td>' . $this->Form->input('qty_per_unit', array('id' => false, 'label' => false, 'class' => 'qty-per-packet')) . '</td>';
                                        echo '<td><button type="button" class="btn btn-danger" role="button" onclick="removePriceStep(this);"><i class="icon-minus"></i></button></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <input type="button" class="btn btn-default" role="button" value="+ More price step..." onclick="morePriceStep();" />
                            <style>
                                .base-price-wrapper div.input
                                {
                                    display: inline-block;
                                }
                                div.input > input,
                                div.input > select
                                {
                                    margin: 0;
                                    max-width: 100px;
                                }
                                select.disc-type,
                                select.packet-type,
                                input.qty-per-packet
                                {
                                    width: 70px;
                                }
                            </style>
                            <script>
                                function morePriceStep() {
                                    $('#pricing-table tbody > tr:last').clone('tr').appendTo("#pricing-table tbody");
                                    reorderPricing();
                                }

                                function removePriceStep(btn) {
                                    $('#pricing-table tbody tr').size() > 1 ? $(btn).closest('tr').remove() : false;
                                    reorderPricing();
                                }

                                function reorderPricing() {
                                    $('#pricing-table tbody tr').each(function (index, tr) {
                                        $(tr).find('input.inp-amount').prop('name', 'data[ProductPricing][' + index + '][amount]');
                                        $(tr).find('input.inp-value').prop('name', 'data[ProductPricing][' + index + '][value]');
                                        $(tr).find('select.disc-type').prop('name', 'data[ProductPricing][' + index + '][type]');
                                    });
                                }
                            </script>
                        </fieldset>
                    </div>
                    <div id="fill-attr" class="well">
                        <fieldset>
                            <legend>4. Fill Product Attributes</legend>
                            <div class="row-fluid">
                                <div id="attribute-list" class="form-horizontal form-column form-bordered"></div>
                            </div>
                        </fieldset>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="icon icon-save"></i> Save</button>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modalChooseCategory" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4>Categories</h4>
            </div>
            <div class="modal-body">
                <div id="tree">
                    <ul>
                        <li id="0" class="folder expanded" title="Root Categories">Root Categories
				        <?php
                        function recursive($categories, $id = 0) {
                            echo '<ul>';
                            foreach ( $categories as $category ) {
                                $pid = $category ['Category'] ['parent_id'];
                                $name = $category ['Category'] ['name'];
                                if ($pid == $id) {
                                    $class = "folder";
                                    echo '<li id="' . $category ['Category'] ['id'] . '" class="' . $class 
                                        . '" title="' . $category ['Category'] ['description'] . '">' . $category ['Category'] ['name'];
                                    recursive ( $categories, $category ['Category'] ['id'] );
                                    echo '</li>';
                                }
                            }
                            echo '</ul>';
                        }
                        recursive ( $categories, 0);
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true" onclick="modalCategoryOnSubmit();">OK</button>
                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="modalAttrPickup" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4>Pickup</h4>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>


<div id="addConfirm" class="modal hide fade">
    <div class="modal-body">
    Please confirm again!
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" data-loading-text="Saving..." autocomplete="off"><i class="icon icon-ok"></i> Submit</button>
    </div>
</div>

<input id="BaseURL" type="hidden" value="<?php echo $this->base; ?>" />
<?php echo $this->Html->script('product.add'); ?>
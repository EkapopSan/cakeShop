<div class="row-fluid">
    <div class="box">
        <div class="box-title">
            <?php $options = array(
                      'addBtn' => $this->Html->link(__('<i class="glyphicon-circle_plus"></i> New Product'), 
                            array('action' => 'add'), 
                            array('class' => 'btn btn-block btn-primary', 'escape' => false))
                      ); 
                  ?>
            <?php echo $this->element('tab_product', array('options' => $options)); ?>
            <h3><i class="icon-barcode"></i>Products</h3>
            <div class="pull-left"><?php echo $this->element('search-form'); ?></div>
            <div class="pull-right"><?php echo $this->element('paginator'); ?></div>
            <div class="pull-right"><?php echo $this->element('page-counter'); ?></div>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <div class="span2">
                    <div class="btn-group btn-block">
                        <a href="#" data-toggle="dropdown" class="btn btn-block dropdown-toggle">
                            <i class="icon-sitemap"></i> Product Cagories <span class="caret"></span>
                        </a>
                        <?php                        
                
                        function RecursiveCategories($array) {
                            echo '<ul class="dropdown-menu">';
                            foreach ($array as $vals) {
                                if (count($vals['children'])) {
                                    echo '<li class="dropdown-submenu">';
                                    echo '<a id="'.$vals['Category']['uuid'].'" tabindex="-1" href="./products/#category/'.$vals['Category']['uuid'].'/">'.$vals['Category']['name'].'</a>';
                                    RecursiveCategories($vals['children']);
                                    echo '</li>';
                                } else {                            
                                    echo '<li><a id="'.$vals['Category']['uuid'].'" href="./products/#category/'.$vals['Category']['uuid'].'/">'.$vals['Category']['name'].'</a></li>';
                                }
                            }
                            echo '</ul>';
                        }
                
                        RecursiveCategories($categories);
                
                        ?>
                    </div>
                    <script>
                        var a = $('div.btn-group.btn-block').find('ul > li > a').on('click', function (e) {
                            var url = 'products/index/' + $(this).attr('id') + '/ #productList';
                            //alert(url);
                            //e.preventDefault();
                            $('#productList').load(url);
                        });
                    </script>
                </div>
                <div id="productList" class="span10">
                    <table class="table table-hover table-nomargin table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('name'); ?></th>
                                <th><?php echo $this->Paginator->sort('price'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
                                <td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
                                <td><?php //echo h($product['Product']['price']); ?>&nbsp;</td>
                                <td class="actions">
                                    <div class="btn-group">
                                        <?php echo $this->Html->link(__('<i class="icon-folder-open-alt"></i> View'), array('action' => 'view', $product['Product']['id']), array('class' => 'btn', 'escape' => false)); ?>
                                        <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <?php echo $this->Html->link(__('<i class="icon-pencil"></i> Edit'), array('action' => 'edit', $product['Product']['id']), array('class' => '', 'escape' => false)); ?>
                                            </li>
                                            <li>
                                                <?php echo $this->Form->postLink(__('<i class="icon-trash"></i> Delete'), array('action' => 'delete', $product['Product']['id']), array('class' => '', 'escape' => false), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="page-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Form->input('WEBROOT', array('type' => 'hidden', 'default' => $this->webroot)); ?>
<?php echo $this->Html->css('product.index'); ?>
<?php echo $this->Html->script('product.index'); ?>
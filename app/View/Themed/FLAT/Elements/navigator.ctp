<div id="left">
	<div class="subnav">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Sales</span></a>
		</div>
		<ul class="subnav-menu">
			<li>
                <a href="http://www.igetpart.com/roundcube/" target="_blank" data-page-loader="0">
                    <i class="icon icon-envelope"></i> Email
                </a>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-adress_book"></i> Contacts',
						array('controller' => 'customers', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-usd"></i> Price Table',
						array('controller' => 'pricing', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-dislikes"></i> Promotions',
						array('controller' => 'promotions', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
		</ul>
	</div>
	<div class="subnav">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Documents</span></a>
		</div>
		<ul class="subnav-menu">
			<li>
			<?php
				echo $this->Html->link(
						'<i class="icon-file-alt"></i> Quotations',
						array('controller' => 'quotations', 'action' => 'index'),
						array('escape' => false),
						array()
					);
			?>
			</li>
			<li><a href="#"><i class="icon-file"></i> Purchase Order</a></li>
			<li><a href="#"><i class="glyphicon-notes_2"></i> Invoices</a></li>
			<li><a href="#"><i class="glyphicon-notes"></i> Credit Note</a></li>
			<li><a href="#"><i class="icon-list-alt"></i> Delivery Sheet</a></li>
		</ul>
	</div>
	<div class="subnav">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Reports</span></a>
		</div>
		<ul class="subnav-menu">
			<li><a href="#"><i class="icon-calendar"></i> Daily Report</a></li>
			<li><a href="#"><i class="icon-bar-chart"></i> Sales Report</a></li>
			<li><a href="#"><i class="glyphicon-pie_chart"></i> Product Report</a></li>
			<li><a href="#"><i class="glyphicon-charts"></i> Customer Report</a></li>
			<li><a href="#"><i class="glyphicon-stats"></i> Traffic Report</a></li>
		</ul>
	</div>
	<div class="subnav subnav-hidden">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Product Categories</span></a>
		</div>
		<ul class="subnav-menu">
			<li>
			<?php
				echo $this->Html->link(
						'<i class="icon-barcode"></i> Products',
						array('controller' => 'products', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="icon-sitemap"></i> Categories',
						array('controller' => 'categories', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
            <?php
                echo $this->Html->link(
                    '<i class="glyphicon-show_thumbnails"></i> Product Series',
					array('controller' => 'productseries', 'action' => 'index'),
					array('escape' => false),
					array()
			    );
            ?>
            </li>
			<li><a href="#"><i class="glyphicon-random"></i> Cross Product</a></li>
			<li><a href="#"><i class="glyphicon-share_alt"></i> Releted Product</a></li>
			<li>                
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-certificate"></i> Brands',
						array('controller' => 'brands', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-global"></i> Manufacturer',
						array('controller' => 'manufacturers', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
            </li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-cargo"></i> Product Unit',
						array('controller' => 'productUnits', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="icon-tags"></i> Product Label',
						array('controller' => 'productLabels', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-show_thumbnails_with_lines"></i> Attribute',
						array('controller' => 'attributes', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
		</ul>
	</div>
	<div class="subnav subnav-hidden">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Tools</span></a>
		</div>
		<ul class="subnav-menu">
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-comments"></i> Articles',
						array('controller' => 'articles', 'action' => 'add'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li><a href="#"><i class="icon-desktop"></i> Web Site</a></li>
			<li><a href="#"><i class="glyphicon-google_maps"></i> Map Find</a></li>
			<li>
            <?php
				echo $this->Html->link(
						'<i class="icon-hdd"></i> Files Menager',
						array('controller' => 'FilesManagers'),
						array('escape' => false),
						array()
				);
			?>
            </li>
			<li><a href="#"><i class="glyphicon-database_plus"></i> Database Import</a></li>
			<li><a href="#"><i class="icon-sitemap"></i> Sitemap Generator</a></li>
		</ul>
	</div>
	<div class="subnav subnav-hidden">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Settings</span></a>
		</div>
		<ul class="subnav-menu">
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-user"></i> Users',
						array('controller' => 'users', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-group"></i> Group and Role',
						array('controller' => 'groups', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-building"></i> Company Settings',
						array('controller' => 'companies', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
			</li>
			<li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-adjust_alt"></i> System Settings',
						array('controller' => 'configurations', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
            </li>
			<li><a href="#"><i class="icon-book"></i> Help / Manual</a></li>
            <li>
			<?php
				echo $this->Html->link(
						'<i class="glyphicon-circle_info"></i> About',
						array('controller' => 'abouts', 'action' => 'index'),
						array('escape' => false),
						array()
				);
			?>
            </li>
		</ul>
	</div>
</div>
<script>
    $(function () {
        $('#left').find('.subnav-menu > li > a').one('click', function () {
            var page = $(this).attr('data-page-loader');
            if (page == undefined || page == 1) {
                ajaxPageLoader.show();
            }
        });
    });
</script>
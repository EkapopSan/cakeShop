<div class="customers form">
    <div class="span8">
        <fieldset>
            <legend>
            <a onclick="window.history.back();" href="#" rel="tooltip" title="" data-original-title="back"><i class="glyphicon-unshare"></i></a>
                <?php echo __('Customer::'); ?>
                <span class="gray-light"><?php echo $customer['Customer']['first_name'] .' / ' .$customer['Customer']['company_name']; ?></span>
            </legend>

            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#login-details" aria-controls="login-details" role="tab" data-toggle="tab"><i class="glyphicon-building"></i> Informations</a></li>
                    <li role="presentation"><a href="#quotationList" aria-controls="company-informations" role="tab" data-toggle="tab"><i class="icon-file-alt"></i> Quotations</a></li>
                    <li role="presentation"><a href="#orderList" aria-controls="billing-address" role="tab" data-toggle="tab"><i class="icon-file"></i> Order List</a></li>
                    <li role="presentation"><a href="#reportList" aria-controls="shipping-address" role="tab" data-toggle="tab"><i class="glyphicon-pie_chart"></i> Report / Analysis</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="login-details">

                        <h5>User Details</h5>
                        <table id="user" class="table table-bordered table-striped table-force-topborder" style="clear: both">
                            <tbody>
                                <tr>
                                    <td width="15%">Fullname</td>
                                    <td width="30%"><?php echo $customer['Customer']['first_name'].' '.$customer['Customer']['last_name'] ; ?></td>
                                    <td width="20%">Username/Email</td>
                                    <td width="35%"><?php echo $customer['Customer']['email'] ; ?></td>
                                </tr>
                                <tr>
                                    <td>Email Verified</td>
                                    <td>
                                        <?php echo $customer['Customer']['email_verified'] > 0 ? 
                                                  '<div class="badge badge-success">Successfully</div>' : 
                                                  '<div class="badge badge-error">No</div>'; ?>
                                    </td>
                                    <td>Registration Date</td>
                                    <td>
                                        <?php echo empty($customer['Customer']['registration_date']) ? '-' : $customer['Customer']['registration_date']; ?></td>
                                </tr>
                                <tr>
                                    <td>Verified Code</td>
                                    <td><?php echo empty($customer['Customer']['verified_code']) ? '-' : $customer['Customer']['verified_code']; ?></td>
                                    <td>IP</td>
                                    <td><?php echo empty($customer['Customer']['IP']) ? '-' : $customer['Customer']['IP']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?php echo $customer['Customer']['status'] > 0 ? 
                                                  '<div class="badge badge-success">Successfully</div>' : 
                                                  '<div class="badge badge-error">No</div>'; ?>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Created by</td>
                                    <td><?php echo $customer['Customer']['created_by'] ; ?></td>
                                    <td>Created date</td>
                                    <td><?php echo $customer['Customer']['created_date'] ; ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <h5>Company Info</h5>
                        <table id="Table1" class="table table-bordered table-striped table-force-topborder" style="clear: both">
                            <tbody>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%"><?php echo $customer['Customer']['email']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%">
                                        <?php 
                                        echo $customer['Customer']['status'] > 0 ? 
                                        '<div class="badge badge-info">Actived <i class="icon-lock"></i></div>' : 
                                        '<div class="badge">Deactivated <i class="icon-lock"></i></div>';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%"><?php echo $customer['Customer']['email']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%">
                                        <?php 
                                        echo $customer['Customer']['status'] > 0 ? 
                                        '<div class="badge badge-info">Actived <i class="icon-lock"></i></div>' : 
                                        '<div class="badge">Deactivated <i class="icon-lock"></i></div>';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%"><?php echo $customer['Customer']['email']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%">
                                        <?php 
                                        echo $customer['Customer']['status'] > 0 ? 
                                        '<div class="badge badge-info">Actived <i class="icon-lock"></i></div>' : 
                                        '<div class="badge">Deactivated <i class="icon-lock"></i></div>';
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h5>Address</h5>
                        <table id="Table2" class="table table-bordered table-striped table-force-topborder" style="clear: both">
                            <tbody>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%"><?php echo $customer['Customer']['email']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%">
                                        <?php 
                                        echo $customer['Customer']['status'] > 0 ? 
                                        '<div class="badge badge-info">Actived <i class="icon-lock"></i></div>' : 
                                        '<div class="badge">Deactivated <i class="icon-lock"></i></div>';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%"><?php echo $customer['Customer']['email']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%">
                                        <?php 
                                        echo $customer['Customer']['status'] > 0 ? 
                                        '<div class="badge badge-info">Actived <i class="icon-lock"></i></div>' : 
                                        '<div class="badge">Deactivated <i class="icon-lock"></i></div>';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%"><?php echo $customer['Customer']['email']; ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Username</td>
                                    <td width="85%">
                                        <?php 
                                        echo $customer['Customer']['status'] > 0 ? 
                                        '<div class="badge badge-info">Actived <i class="icon-lock"></i></div>' : 
                                        '<div class="badge">Deactivated <i class="icon-lock"></i></div>';
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="well">
                                <?php pr($customer) ?>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="quotationList">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Quotation List'); ?>
                                    <div class="pull-right"><i class="icon-file-alt"></i></div>
                                </legend>
                                <?php pr($customer['Quotation']); ?>
                            </fieldset>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="orderList">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Order List'); ?>
                                    <div class="pull-right"><i class="icon-file"></i></div>
                                </legend>
                                <?php pr($customer['Order']); ?>
                            </fieldset>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="reportList">
                        <fieldset class="hide">
                            <legend><?php echo __('Analysis'); ?>
                                <div class="pull-right"><i class="glyphicon-pie_chart"></i></div>
                            </legend>
                        </fieldset>
                        <fieldset>
                            <legend><?php echo __('Report'); ?>
                                <div class="pull-right"><i class="icon-file-alt"></i></div>
                            </legend>
                            <div class="row-fluid">
                                <div class="span3">
                                    <p><a href="#">Contacts</a></p>
                                    <p><a href="#">Price Table</a></p>
                                    <p><a href="#">Promotions</a></p>
                                    <p><a href="#">Documents</a></p>
                                    <p><a href="#">Quotations</a></p>
                                    <p><a href="#">Purchase Order</a></p>
                                </div>
                                <div class="span3">
                                    <p><a href="#">Invoices</a></p>
                                    <p><a href="#">Credit Note</a></p>
                                    <p><a href="#">Delivery Sheet</a></p>
                                    <p><a href="#">Daily Report</a></p>
                                    <p><a href="#">Sales Report</a></p>
                                    <p><a href="#">Product Report</a></p>
                                </div>
                                <div class="span3">
                                    <p><a href="#">Customer Report</a></p>
                                    <p><a href="#">Traffic Report</a></p>
                                    <p><a href="#">Product Categories</a></p>
                                    <p><a href="#">Product Series</a></p>
                                    <p><a href="#">Cross Product</a></p>
                                    <p><a href="#">Releted Product</a></p>
                                </div>
                                <div class="span3">
                                    <p><a href="#">Manufacturer</a></p>
                                    <p><a href="#">Product Unit</a></p>
                                    <p><a href="#">Product Label</a></p>
                                    <p><a href="#">Map Find</a></p>
                                    <p><a href="#">Database Import</a></p>
                                    <p><a href="#">Sitemap Generator</a></p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="span3">
        <fieldset>
            <legend><?php echo __('Actions'); ?></legend>
            <div class="well">
                <p>User</p>
                <?php echo $this->Html->link(__('<i class="glyphicon-user"></i> List Customer'), array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-default btn-block', 'escape' => false)); ?>
                <?php //echo $this->Html->link(__('<i class="glyphicon-user_add"></i> New Customer'), array('action' => 'add'), array('type' => 'button', 'class' => 'btn btn-default btn-block', 'escape' => false)); ?>
                <?php 
                echo $this->Html->link(__('<i class="glyphicon-pencil"></i> Edit User'), 
                        array('controller' => 'customers', 'action' => 'edit', $customer['Customer']['id']),
                        array(
                            'type' => 'button', 
                            'class' => 'btn btn-block', 
                            'role' => 'button',
                            //'data-toggle' => 'modal',
                            //'data-target' => '#editModal',
                            'escape' => false
                        )
                    ); 
                ?>
                <?php 
                echo $this->Html->link(__('<i class="glyphicon-bin"></i> Delete'), 
                        '#',
                        array(
                            'type' => 'button', 
                            'class' => 'btn btn-danger btn-block', 
                            'role' => 'button',
                            'data-toggle' => 'modal',
                            'data-target' => '#deleteConfirm',
                            'escape' => false
                        )
                    ); 
                ?>
            </div>
        </fieldset>
    </div>
</div>

<?php echo $this->Html->css('customer.view'); ?>
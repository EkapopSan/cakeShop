<div class="customers form">
    <div class="span<?php echo $this->request->params['isAjax'] ? '7': '8' ?>">
        <input style="display:none">
        <input type="password" style="display:none">
        <?php echo $this->Form->create('Customer', array("class" => "form-horizontal")); ?>
        <?php echo $this->Form->input('id'); ?>
	    <fieldset>
		    <legend>
                <?php if(!$this->request->params['isAjax']) { ?>
                    <a 
                        href="<?php echo $this->Html->url(array('controller' => 'customers','action' => 'index')); ?>" 
                        rel="tooltip" title="" data-original-title="back"><i class="glyphicon-unshare"></i></a>
                <?php echo __('Customer::'); ?>
                <span class="gray-light"><?php echo $this->request->data['Customer']['first_name'] . ' / ' . $this->request->data['Customer']['company_name']; ?></span>
                <?php } else { echo __('Edit Customer Informations'); } ?>
                <div class="pull-right">
                    <?php if($this->request->params['isAjax']) { ?>
                        <h6>
                            <a
                                href="<?php echo $this->Html->url(array('controller' => 'customers','action' => 'edit', $this->request->params['pass'][0])); ?>" 
                                class="btn-link" role="button" rel="tooltip" data-placement="bottom" data-original-title="open in new tab.">
                                <i class="glyphicon-resize_full"></i>
                            </a>
                        </h6>
                    <?php } ?>
                </div>
		    </legend>
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="#edit-login-details" aria-controls="login-details" role="tab" data-toggle="tab"><i class="icon-lock"></i> Login Details</a></li>
                    <li role="presentation" class="active"><a href="#edit-company-informations" aria-controls="company-informations" role="tab" data-toggle="tab"><i class="glyphicon-building"></i> Company Informations</a></li>
                    <li role="presentation"><a href="#edit-billing-address" aria-controls="billing-address" role="tab" data-toggle="tab"><i class="icon-file-alt"></i> Billing Address</a></li>
                    <li role="presentation"><a href="#edit-shipping-address" aria-controls="shipping-address" role="tab" data-toggle="tab"><i class="icon-truck"></i> Shipping Address</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade" id="edit-login-details">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Login Details'); ?> <div class="pull-right"><i class="icon-lock"></i></div></legend>
                                <div class="control-group">
                                    <label for="CustomerEmail" class="control-label">Email</label>
                                    <div class="controls">
	                                    <?php echo $this->Form->input('Customer.email', array( "autocomplete" => "off", "div" => false, "label" => false)); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="CustomerChangePassword" class="control-label">Password</label>
                                    <div class="controls">
                                        <?php 
                                            echo $this->Html->link(__('<i class="icon-lock"></i> Change password'), 
                                                array('controller' => 'users', 'action' => 'changePassword', $this->request->params['pass'][0]),
                                                array(
                                                    'id' => 'CustomerChangePassword',
                                                    'type' => 'button', 
                                                    'class' => 'btn-link', 
                                                    'role' => 'button',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#changePasswordModal',
                                                    'escape' => false
                                                )
                                            ); 
                                        ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User is Active</label>
                                    <div class="controls">
                                        <div class="check-line">
                                            <?php 
                                                echo $this->Form->checkbox('Customer.status', 
                                                    array(
                                                        'class' => 'icheck-me', 
                                                        'data-skin' => 'minimal',
                                                        'data-color' => 'blue',
                                                        'div' => false,
                                                        'label' => false
                                                        )
                                                    );
                                                ?> 
                                            <label for="CustomerStatus">User is Active?</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in active" id="edit-company-informations">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Company Informations'); ?> <div class="pull-right"><i class="glyphicon-building"></i></div></legend>
                                <?php
		                        echo $this->Form->input('Customer.first_name');
		                        echo $this->Form->input('Customer.last_name');
		                        echo $this->Form->input('Customer.company_name');
		                        echo $this->Form->input('Customer.tax_id', array('type'=>'text', 'label' => 'Tax ID'));
		                        echo $this->Form->input('Customer.credit_term', array('default' => 0, 'label' => 'Credit Term/Days'));
                                echo '<h6>Telephone</h6>';
                                echo '<hr style="margin:0"/>';
                                
                                $telephones = $this->request->data["CustomerTelephone"];                                
                                foreach ($telephones as $key => $telephone) {
                                    echo $this->Form->hidden('CustomerTelephone.'.$key.'.id');
                                    echo $this->Form->hidden('CustomerTelephone.'.$key.'.type', array('class' => 'CustomerTelephoneNumber', 'label' => $telephone['type']));
                                    echo $this->Form->input('CustomerTelephone.'.$key.'.number', array('label' => $telephone['type']));
                                }
                                ?>
                                <hr />
                                <a id="addMoreNumber" role="button" class="btn btn-default" onclick="addMoreNumber();">
                                    <i class="icon-plus-sign"></i> add new number
                                </a>
                                <br />
                                <div class="number-list"></div>
                            </fieldset>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="edit-billing-address">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Billing Address'); ?> <div class="pull-right"><i class="icon-file-alt"></i></div></legend>
                                <?php
                                echo $this->Form->input('CustomerAddress.0.id');
                                echo $this->Form->hidden('CustomerAddress.0.type', array('value' => 'billing'));
		                        echo $this->Form->input('CustomerAddress.0.address_name', array('placeholder' => 'ออฟฟิต บางรัก'));
                                echo '<br/>'; ?>
                                <?php
                                
                                echo $this->Form->input('CustomerAddress.0.address', 
                                        array(
                                        'class' => 'input-block-level', 
                                        'type' => 'textarea',
                                        'rows' => '3',
                                        'id' => 'CustomerBillingAddress',
                                        'placeholder' => '...'
                                        )
                                    );
                                
                                ?>
                                <?php
                                echo '<br/>';
		                        echo $this->Form->input('CustomerAddress.0.zip');
                                echo '<br/>';
		                        echo $this->Form->input('CustomerAddress.0.city_id', array('class' => 'select2-me', 'data-placeholder' => 'Please select something', 'default' => 2));
                                echo $this->Form->input(
                                    'CustomerAddress.0.country', 
                                        array(
                                            'options' => array('ประเทศไทย' => 'ประเทศไทย'), 
                                            'default' => $this->request->data['CustomerAddress'][0]['country']
                                        )
                                    );
                                ?>
                            </fieldset>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="edit-shipping-address">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Shipping Address'); ?> <div class="pull-right"><i class="icon-truck"></i></div></legend>
                                <?php
                                echo $this->Form->input('CustomerAddress.1.id');
                                echo $this->Form->hidden('CustomerAddress.1.type', array('value' => 'shipping'));
		                        echo $this->Form->input('CustomerAddress.1.address_name', array('placeholder' => 'ออฟฟิต บางรัก'));
                                echo '<br/>'; 
                                ?>
                                <?php                                
                                echo $this->Form->input('CustomerAddress.1.address', 
                                        array(
                                        'class' => 'input-block-level', 
                                        'type' => 'textarea',
                                        'rows' => '3',
                                        'id' => 'CustomerBillingAddress',
                                        'placeholder' => '...'
                                        )
                                    );
                                
                                ?>
                                <?php
                                echo '<br/>';
		                        echo $this->Form->input('CustomerAddress.1.zip');
                                echo '<br/>';
		                        echo $this->Form->input(
                                    'CustomerAddress.1.city_id', 
                                        array(
                                                'default' => isset($this->request->data['CustomerAddress'][1]) ? $this->request->data['CustomerAddress'][1]['city_id'] : 78
                                            )
                                        );
                                echo $this->Form->input(
                                    'CustomerAddress.1.country', 
                                        array(
                                            'options' => array('0' => '-', 'ประเทศไทย' => 'ประเทศไทย'), 
                                            'default' => isset($this->request->data['CustomerAddress'][1]) ? $this->request->data['CustomerAddress'][1]['country'] : 0
                                        )
                                    );
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
	    </fieldset>
        <?php echo $this->request->params['isAjax'] ? $this->Form->end(): $this->Form->end(); ?>
        <div class="space-bottom"></div>
    </div>
    <?php if(!$this->request->params['isAjax']) { ?>    
    <div class="span3 actions">
        <fieldset>
            <legend><?php echo __('Actions'); ?></legend>
            <div class="well">
                <a href="#" class="btn btn-primary btn-block" onclick="$('#CustomerEditForm').submit(); return false;"><i class="icon-save"></i> Update</a>
                <h5>Links</h5>
                <?php echo $this->Html->link(__('<i class="icon-file-alt"></i> View more details'), array('action' => 'view', $this->request->params['pass'][0]), array('type' => 'button', 'class' => 'btn btn-default btn-block', 'escape' => false)); ?>
                <?php echo $this->Html->link(__('<i class="glyphicon-user"></i> List Customer'), array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-default btn-block', 'escape' => false)); ?>
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
    <?php } ?>
</div>

<?php echo $this->element('modal_change_password'); ?>

<?php echo $this->Html->css('customer.edit'); ?>
<?php echo $this->Html->script('customer.edit'); ?>
<?php echo $this->Html->script('jquery-validator-with-tabbed'); ?>
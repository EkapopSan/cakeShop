<div class="customers form">
    <div class="span7">
        <input style="display:none">
        <input type="password" style="display:none">
        <?php echo $this->Form->create('Customer'); ?>
	    <fieldset>
		    <legend>
                <?php if(!$this->request->params['isAjax']) { ?>
                <a href="<?php echo $this->Html->url(array('controller' => 'customers','action' => 'index')); ?>" rel="tooltip" title="" data-original-title="back"><i class="glyphicon-unshare"></i></a>
                <?php } ?>
                <?php echo __('Add Customer'); ?>
                <div class="pull-right hide">
                    <?php if($this->request->params['isAjax']) { ?>
                        <h6>
                            <a 
                                href="<?php echo $this->Html->url(array('controller' => 'customers','action' => 'add')); ?>" 
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
                    <li role="presentation"><a href="#login-details" aria-controls="login-details" role="tab" data-toggle="tab"><i class="icon-lock"></i> Login Details</a></li>
                    <li role="presentation" class="active"><a href="#company-informations" aria-controls="company-informations" role="tab" data-toggle="tab"><i class="glyphicon-building"></i> Company Informations</a></li>
                    <li role="presentation"><a href="#billing-address" aria-controls="billing-address" role="tab" data-toggle="tab"><i class="icon-file-alt"></i> Billing Address</a></li>
                    <li role="presentation"><a href="#shipping-address" aria-controls="shipping-address" role="tab" data-toggle="tab"><i class="icon-truck"></i> Shipping Address</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade" id="login-details">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Login Details'); ?> <div class="pull-right"><i class="icon-lock"></i></div></legend>
	                            <?php 
                                echo $this->Form->input('Customer.email', array( "autocomplete" => "off"));
                                echo $this->Form->input('Customer.password', array( "autocomplete" => "off"));
                                echo '<br/><br/>';
                                echo $this->Form->input('Customer.status', 
                                    array(
                                        'type' => 'checkbox', 
                                        'label' => '<div class="badge badge-info">User is Active <i class="icon-lock"></i></div>'
                                        )
                                    );
                                ?>
                            </fieldset>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in active" id="company-informations">
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
                                echo $this->Form->input('CustomerTelephone.0.number', array('label' => 'Telephone'));
                                echo $this->Form->input('CustomerTelephone.1.number', array('label' => 'Telephone'));
                                echo $this->Form->input('CustomerTelephone.2.number', array('label' => 'Fax'));
                                echo $this->Form->input('CustomerTelephone.3.number', array('label' => 'Mobile'));                    
                    
		                        echo $this->Form->hidden('CustomerTelephone.0.type', array('value' => 'telephone'));
		                        echo $this->Form->hidden('CustomerTelephone.1.type', array('value' => 'telephone'));
		                        echo $this->Form->hidden('CustomerTelephone.2.type', array('value' => 'fax'));
		                        echo $this->Form->hidden('CustomerTelephone.3.type', array('value' => 'mobile'));
                                ?>
                            </fieldset>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="billing-address">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Billing Address'); ?> <div class="pull-right"><i class="icon-file-alt"></i></div></legend>
                                <?php
                                echo $this->Form->hidden('CustomerAddress.0.type', array('value' => 'billing'));
		                        echo $this->Form->input('CustomerAddress.0.address_name', array('placeholder' => 'ออฟฟิต บางรัก'));
                                echo '<br/>'; ?>
                                <div class="input full-width">
                                    <label for="CustomerAddress0Address">Address</label>
                                    <textarea name="data[CustomerAddress][0][address]" class="input-block-level" rows="3" id="CustomerAddress0Address" placeholder="..."></textarea>
                                </div>
                                <?php
                                echo '<br/>';
		                        echo $this->Form->input('CustomerAddress.0.zip');
                                echo '<br/>';
		                        echo $this->Form->input('CustomerAddress.0.city_id', array('default' => 78)); //default 78 = '-'
		                        echo $this->Form->input('CustomerAddress.0.country', array('options' => array('ประเทศไทย' => 'ประเทศไทย')));
                                ?>
                            </fieldset>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="shipping-address">
                        <div class="well">
                            <fieldset>
                                <legend><?php echo __('Shipping Address'); ?> <div class="pull-right"><i class="icon-truck"></i></div></legend>
                                <?php
                                echo $this->Form->hidden('CustomerAddress.1.type', array('value' => 'shipping'));
		                        echo $this->Form->input('CustomerAddress.1.address_name', array('placeholder' => 'โกดัง บางนา'));
                                echo '<br/>'; ?>
                                <div class="input full-width">
                                    <label for="CustomerAddess1Address">Address</label>
                                    <textarea name="data[CustomerAddress][1][address]" class="input-block-level" rows="3" id="CustomerAddess1Address" placeholder="..."></textarea>
                                </div>
                                <?php
                                echo '<br/>';
		                        echo $this->Form->input('CustomerAddress.1.zip');
                                echo '<br/>';
		                        echo $this->Form->input('CustomerAddress.1.city_id', array('default' => 78)); //default 78 = '-'
		                        echo $this->Form->input('CustomerAddress.1.country', array('options' => array('ประเทศไทย' => 'ประเทศไทย')));
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
	    </fieldset>
        <?php if($this->request->params['isAjax']) { $this->Form->end(); } else { ?> 
        <button type="submit" class="btn btn-primary" onclick="$('#CustomerAddForm').submit();"><i class="icon-save"></i> Save</button>
        <?php $this->Form->end(); ?>
        <?php } ?>
        <div class="space-bottom"></div>
    </div>
</div>
<?php echo $this->Html->css('customer.add'); ?>
<?php echo $this->Html->script('customer.add'); ?>
<?php echo $this->Html->script('jquery-validator-with-tabbed'); ?>
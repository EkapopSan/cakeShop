<div id="navigation">
	<div class="container-fluid">
		<a href="<?php echo $this->Html->url(array('controller' => 'homes', 'action' => 'index')); ?>" id="brand">CakeShop</a> <a href="#" class="toggle-nav"
			rel="tooltip" data-placement="bottom" title="Toggle navigation"><i
			class="icon-reorder"></i></a>
		<ul class="main-nav">
			<li><a href="#"><span><i class="glyphicon-dashboard"></i> Dashboard</span></a></li>
			<li><a href="#"><span><i class="glyphicon-headset"></i> Console</span></a></li>
			<li>
                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-calendar"></i> <span> Calendar</span> <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="forms-basic.html">Basic forms</a></li>
					<li><a href="forms-extended.html">Extended forms</a></li>
					<li><a href="forms-validation.html">Validation</a></li>
					<li><a href="forms-wizard.html">Wizard</a></li>
				</ul>
			</li>
		</ul>
		<div class="user">
            <ul class="icon-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope"></i><span class="label label-lightred">4</span></a>
                    <ul class="dropdown-menu pull-right message-ul">
                        <li>
                            <a href="#">
                                <?php echo $this->Html->image('demo/user-1.jpg'); ?>
                                <div class="details">
                                    <div class="name">Jane Doe</div>
                                    <div class="message">
                                        Lorem ipsum Commodo quis nisi ...
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?php echo $this->Html->image('demo/user-2.jpg'); ?>
                                <div class="details">
                                    <div class="name">John Doedoe</div>
                                    <div class="message">
                                        Ut ad laboris est anim ut ...
                                    </div>
                                </div>
                                <div class="count">
                                    <i class="icon-comment"></i>
                                    <span>3</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?php echo $this->Html->image('demo/user-3.jpg'); ?>
                                <div class="details">
                                    <div class="name">Bob Doe</div>
                                    <div class="message">
                                        Excepteur Duis magna dolor!
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="components-messages.html" class="more-messages">Go to Message center <i class="icon-arrow-right"></i></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="icon-bell"></i><span class="label label-lightred">7</span></a></li>
            </ul>
			<div class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php
                        if ($this->Session->read('Auth.User')) {
                            echo $this->Session->read('Auth.User.username');
                        }
                        
                        $photo = $this->Session->read('Auth.User.photo');
                        $photo_dir = $this->Session->read('Auth.User.photo_dir');
                        if($photo != null) {
                            $user_photo = $this->webroot.'files/system/user/photo/'.$photo_dir.'/thumb_'.$photo;
                        } else {
                         	$user_photo = $this->webroot.'files/system/user/photo/default/thumb_avatar.jpg';
                        }
                    ?>
                    <img class="circular" width="27px" src="<?php echo $user_photo; ?>" />
				</a>
				<ul class="dropdown-menu pull-right">
					<li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id'))); ?>">Edit profile</a></li>
					<li><a href="#">Account settings</a></li>
					<li><?php echo $this->Html->link('Sign out', array('controller' => 'users', 'action' => 'logout'), array('onclick' => 'ajaxPageLoader.show();')); ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
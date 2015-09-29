<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>CakeShop - Login</title>

	<!-- Bootstrap -->
    <?php echo $this->Html->css("bootstrap.min"); ?>
	<!-- Bootstrap responsive -->
    <?php echo $this->Html->css("bootstrap-responsive.min"); ?>
	<!-- icheck -->
    <?php echo $this->Html->css("plugins/icheck/all"); ?>
	<!-- Theme CSS -->
    <?php echo $this->Html->css("style"); ?>
	<!-- Color CSS -->
    <?php echo $this->Html->css("themes"); ?>


	<!-- jQuery -->
    <?php echo $this->Html->script("jquery.min"); ?>
	
	<!-- Nice Scroll -->
    <?php echo $this->Html->script("plugins/nicescroll/jquery.nicescroll.min"); ?>
	<!-- Validation -->
    <?php echo $this->Html->script("plugins/validation/jquery.validate.min"); ?>
    <?php echo $this->Html->script("plugins/validation/additional-methods.min"); ?>
	<!-- icheck -->
    <?php echo $this->Html->script("plugins/icheck/jquery.icheck.min"); ?>
	<!-- Bootstrap -->
    <?php echo $this->Html->script("bootstrap.min"); ?>
    <?php echo $this->Html->script("eakroko"); ?>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
    

	<!-- Favicon -->
	<?php 
		echo $this->Html->meta(
				'favicon.ico',
				'img/favicon.ico',
				array('type' => 'icon')
		);
	?>
	<!-- Apple devices Homescreen icon -->
	<?php 
		echo $this->Html->meta(
			array(
			'rel' => 'apple-touch-icon-precomposed',
			'link' => 'img/apple-touch-icon-precomposed.png'
			)
		);
	?>

    <style>
        .alert
        {
            margin-bottom: 0px;
        }
        .forget
        {
            margin-top: 0px;
        }
    </style>
    <script>
        $(function () {
            $('#UserUsername').focus();
        });
    </script>
</head>

<body class='login'>
	<div class="wrapper">
		<h1><a href="#"><?php echo $this->Html->image('logo-big.png', array('alt' => 'CakeShop', 'class' => 'retina-ready', 'width' => '59', 'height' => '49')); ?> CakeShop</a></h1>
		<div class="login-body">
			<h2>SIGN IN <?php echo $_SERVER['SERVER_ADDR'] ?></h2>
            <?php echo $this->Form->create('User',array('inputDefaults' => array('label' => false, 'div' => false))); ?>
				<div class="control-group">
					<div class="controls">
                        <?php echo $this->Form->input('username', array('placeholder' => 'Username', 'class' => 'input-block-level', 'data-rule-required' => 'true')); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
                        <?php echo $this->Form->input('password', array('placeholder' => 'Password', 'class' => 'input-block-level', 'data-rule-required' => 'true')); ?>
					</div>
				</div>
				<div class="submit">
					<div class="remember">
                        <?php 
                            echo $this->Form->checkbox('remember_me', 
                                array(
                                    'name' => '[User][remember]', 
                                    'class' => 'icheck-me', 
                                    'data-skin' => 'square',
                                    'data-color' => 'blue',
                                    'id' => 'remember',
                                    'checked' => 'checked'
                                    )
                                );
                            ?> 
                        <label for="remember">Remember me</label>
					</div>
					<input type="submit" value="Sign me in" class='btn btn-primary'>
				</div>
            <?php echo $this->Form->end(); ?>
            <?php echo $this->Session->flash(); ?>
			<div class="forget" style="margin-top: 0px;">
				<a href="#"><span>Forgot password?</span></a>
			</div>
		</div>
	</div>
</body>
</html>
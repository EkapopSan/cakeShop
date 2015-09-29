<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>CakeShop - Error page</title>

	<!-- Bootstrap -->
    <?php echo $this->Html->css('bootstrap.min'); ?>
	<!-- Bootstrap responsive -->
    <?php echo $this->Html->css('bootstrap-responsive.min'); ?>
	<!-- Theme CSS -->
    <?php echo $this->Html->css('style'); ?>
	<!-- Color CSS -->
    <?php echo $this->Html->css('themes'); ?>


	<!-- jQuery -->
    <?php echo $this->Html->script('jquery.min'); ?>
	
	<!-- Nice Scroll -->
    <?php echo $this->Html->script('plugins/nicescroll/jquery.nicescroll.min'); ?>
	<!-- Bootstrap -->
    <?php echo $this->Html->script('bootstrap.min'); ?>

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

</head>

<body class='error'>
	<div class="wrapper">
		<div class="code"><span>404</span><i class="icon-warning-sign"></i></div>
		<div class="desc">Oops! Sorry, that page could'nt be found.</div>
		<form action="more-searchresults.html" class='form-horizontal'>
			<div class="input-append">
				<input type="text" name="search" placeholder="Search a site..">
				<button type='submit' class='btn'><i class="icon-search"></i></button>
			</div>
		</form>
		<div class="buttons">
            <div class="pull-left">
                <a href="<?php echo $this->Html->url(array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>" class="btn"><i class="icon-arrow-left"></i> Back</a>
            </div>
		</div>
	</div>
</body>

</html>

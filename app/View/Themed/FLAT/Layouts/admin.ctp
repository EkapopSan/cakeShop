<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- Apple devices fullscreen -->
<meta names="apple-mobile-web-app-status-bar-style"	content="black-translucent" />

<title>FLAT - Dashboard</title>

<!-- FLAT - Template -->
<?php echo $this->element('flat'); ?>
</head>

<body data-layout-sidebar="fixed" data-layout-topbar="fixed" class="theme-satblue">

	<!-- Header -->
	<?php echo $this->element('header'); ?>

	<div class="container-fluid" id="content">
		<!-- Header -->
		<?php echo $this->element('navigator'); ?>

		<div id="main">
			<div class="container-fluid">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
</body>
</html>
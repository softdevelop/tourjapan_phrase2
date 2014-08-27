
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 3.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>MyActivity | ログイン画面</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
	<?php echo $this->Html->css('font-awesome.min.css');?>
	<?php echo $this->Html->css('simple-line-icons.min.css');?>
	<?php echo $this->Html->css('bootstrap.min.css');?>
	<?php echo $this->Html->css('uniform.default.css');?>
	<?php echo $this->Html->css('select2.css');?>
	<?php echo $this->Html->css('login.css');?>
	<?php echo $this->Html->css('components.css');?>
	<?php echo $this->Html->css('plugins.css');?>
	<?php echo $this->Html->css('layout.css');?>
	<?php echo $this->Html->css('default.css');?>
	<?php echo $this->Html->css('custom.css');?>

	<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="index-2.html">
			<?php echo $this->Html->image('logo-big.png');?>		
		</a>
	</div>
	<!-- END LOGO -->
	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	<div class="menu-toggler sidebar-toggler">
	</div>
	<!-- END SIDEBAR TOGGLER BUTTON -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<?php
			echo $this->Form->create('User', array(
				'id' => 'signin-form_id',
				'class' => 'panel',
				'action' => 'edit',
				'url' => $this->request->here(false),
				'type' => 'post',
				'inputDefaults' => array('label' => false, 'div' => false)));
		?>
		
		<form class="login-form" action="" method="post">
			<h5 class="form-title"><?php echo __('ログインフォーム'); ?></h5>
			<?php echo $this->Session->flash(); ?>
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>
					<?php echo __('Enter any username and password.'); ?>
				</span>
			</div>
			<div class="form-group">

				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">ID</label>
				<div class="input-icon">
					<i class="fa fa-user"></i>
					<?php
						echo $this->Form->input('username', array(
							'type' => 'text',
							'class' => 'form-control placeholder-no-fix',
							'placeholder' => 'Username',
							'placeholder' => __('ID'),
							'default' => @$username
						));
					?> 
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">パスワード</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
					<?php
						echo $this->Form->input('password', array(
							'type' => 'password',
							'class' => 'form-control placeholder-no-fix',
							'placeholder' => 'Username',
							'placeholder' => __('パスワード'),
						));
					?> 
				</div>
			</div>
			<div class="form-actions">
				<input type="checkbox" name="remember" value="1"/> パスワードを保存 </label>

				<button type="submit" class="btn green pull-right">
				ログイン <i class="m-icon-swapright m-icon-white"></i>
				</button>
			</div>
		<?php echo $this->Form->end(); ?>
		<!-- END LOGIN FORM -->
	</div>
	<!-- END LOGIN -->
	<!-- BEGIN COPYRIGHT -->
	<div class="copyright">
		 
	</div>
	<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
		<script src="../../assets/global/plugins/respond.min.js"></script>
		<script src="../../assets/global/plugins/excanvas.min.js"></script> 
		<![endif]-->
	<?php 
		echo $this->Html->script('jquery-1.11.0.min.js');
		echo $this->Html->script('jquery-migrate-1.2.1.min.js');
		echo $this->Html->script('bootstrap.min.js');
		echo $this->Html->script('bootstrap-hover-dropdown.min.js');
		echo $this->Html->script('jquery.slimscroll.min.js');
		echo $this->Html->script('jquery.blockui.min.js');
		echo $this->Html->script('jquery.uniform.min.js');
		echo $this->Html->script('jquery.validate.min.js');
		echo $this->Html->script('select2.min.js');
		echo $this->Html->script('metronic.js');
		echo $this->Html->script('layout.js');
		echo $this->Html->script('login.js');
	?>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
			jQuery(document).ready(function() {     
			  Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
			  Login.init();
			});
		</script>
</body>
<!-- END BODY -->
</html>
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
<title>MyActiviy | 管理画面</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
<?php echo $this->Html->css(array(
				'font-awesome.min.css',
				'simple-line-icons.min.css',
				'bootstrap.min.css',
				'uniform.default.css',
				'daterangepicker-bs3.css',
				'fullcalendar.css',
				'components.css',
				'plugins.css',
				'layout.css',
				'default.css',
				'custom.css',
				'jquery.fileupload.css',
				'jquery.fileupload-ui.css',
				'datepicker.css',
				'custom.css',
                'blueimp-gallery.min.css',
                'jquery.fileupload-noscript.css',
                'jquery.fileupload-ui-noscript.css'
				));?>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo $this->Html->url("/", true);?>">
			<?php echo $this->Html->image('logo.png', array(
								'class' => 'logo-default'
							));
			?>			
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<div class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</div>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<a href="<?php echo $this->Html->url('/admin/logout', true); ?>" style="margin-top: 13px;margin-right: 20px;display: block;">
				<i class="fa fa-key"></i> Log Out </a>
			</a>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="false" data-auto-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
			
				<li class="start">
					<a href="javascript:;">
					<i class="fa fa-home"></i>
					<span class="title"><?php echo __('マスター管理'); ?></span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo $this->Html->url('/admin/categories');?>">
							<i class="fa fa-folder-open-o"></i>
							<?php echo __('ジャンル'); ?></a>
						</li>
						<li>
							<a href="<?php echo $this->Html->url('/admin/areas');?>">
							<i class="fa fa-globe"></i>
							<?php echo __('エリア'); ?></a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title"><?php echo __('ツアー・主催者'); ?></span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo $this->Html->url('/admin/sponsors');?>">
							<i class="fa fa-users"></i>
							主催者</a>
						</li>
						<li>
							<a href="<?php echo $this->Html->url('/admin/tourpackages');?>">
							<i class="fa fa-plane"></i>
							ツアー</a>
						</li>
					</ul>
				</li>
			
				<li>
					<a href="<?php echo $this->Html->url('/admin/featured');?>">
						<i class="fa fa-bookmark-o"></i>
						<span class="title"><?php echo __('注目ツアー'); ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url('/admin/news');?>">
						<i class="fa fa-comment"></i>
						<span class="title"><?php echo __('News'); ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url('/admin/applications');?>">
						<i class="fa fa-tags"></i>
						<span class="title"><?php echo __('申し込み管理'); ?></span>
					</a>
				</li>
                <li>
					<a href="<?php echo $this->Html->url('/admin/staticpages');?>">
						<i class="fa fa-tags"></i>
						<span class="title"><?php echo __('静的ページ管理'); ?></span>
					</a>
				</li>
                <li>
					<a href="<?php echo $this->Html->url('/admin/contacts');?>">
						<i class="fa fa-tags"></i>
						<span class="title"><?php echo __('問い合わせ管理'); ?></span>
					</a>
				</li>
				
				 <li>
					<a href="<?php echo $this->Html->url('/admin/contactpartners');?>">
						<i class="fa fa-tags"></i>
						<span class="title"><?php echo __('企業問い合わせ管理'); ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url('/admin/profile/password');?>">
						<i class="fa fa-tags"></i>
						<span class="title"><?php echo __('パスワード変更'); ?></span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
		
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					 
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<?php echo $this->Html->getCrumbs(' > ', array(
							    'url' => array('plugin' => 'admin', 'controller' => 'tourpackages', 'action' => 'index'),
							    'escape' => false
							));?>						
						</li>
					</ul>

					<!-- Session flash -->
					<?php echo $this->Session->flash('success');?>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<?php 
	echo $this->Html->script(array(
			'jquery-1.11.0.min.js',
			'jquery-migrate-1.2.1.min.js',
			//'jquery-ui-1.10.3.custom.min.js',
			'bootstrap.min.js',
			'bootstrap-hover-dropdown.min.js',
			'jquery.slimscroll.js',
			'jquery.blockui.min.js',
			'jquery.cokie.min.js',
			'jquery.uniform.min.js',
			'moment.min.js',
			'daterangepicker.js',
			'UploadImage/jquery.ui.widget.js',
			'metronic.js',
			'layout.js',
			'bootstrap-datepicker.js',
            'ckeditor/ckeditor.js',
            'UploadImage/tmpl.min.js',
            'UploadImage/canvas-to-blob.min.js',
            'UploadImage/load-image.min.js',
            'UploadImage/canvas-to-blob.min.js',
            'UploadImage/jquery.blueimp-gallery.min.js',
            'UploadImage/jquery.fileupload.js',
            'UploadImage/jquery.iframe-transport.js',
            'UploadImage/jquery.fileupload-process.js',
            'UploadImage/jquery.fileupload-image.js',
            'UploadImage/jquery.fileupload-validate.js',
            'UploadImage/jquery.fileupload-ui.js',
            'UploadImage/main.js'
		));

?>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {    
	   Metronic.init(); // init metronic core componets
	   Layout.init(); // init layout
	  	$('.date-picker').datepicker();
	});
</script>
		<script>
				jQuery('#pref').change(function(){
			var val = jQuery(this).val();
			
				jQuery.ajax({
					url : 'https://<?php echo $_SERVER["SERVER_NAME"];?>/areas/getArea/' + val,
					type: 'POST',
					'data' : {id : val},
					dataType: 'json',
					success: function(data) {
						var st = '<option value="0" selected>▼エリア</option>';
						jQuery.each(data, function(i, v){
							st += "<option value='" + i + "'> " + v + "</option>"
						});
						jQuery('#area').empty();
						jQuery('#area').append(st);
					}

				});
			
		});
		
				


</script>
	<script>
	
		
			jQuery('#prf').change(function(){
			var val = jQuery(this).val();
			
				jQuery.ajax({
					url : 'https://<?php echo $_SERVER["SERVER_NAME"];?>/areas/getSponsor/' + val,
					type: 'POST',
					'data' : {id : val},
					dataType: 'json',
					success: function(data) {
						var st = '<option value="0" selected>▼スポンサー</option>';
						jQuery.each(data, function(i, v){
							st += "<option value='" + i + "'> " + v + "</option>"
						});
						jQuery('#spnsr').empty();
						jQuery('#spnsr').append(st);
					}

				});
			
		});

	

</script>
</html>
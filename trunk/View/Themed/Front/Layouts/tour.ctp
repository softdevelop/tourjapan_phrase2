<!doctype html>

<html>
	<head>
		<title>日本全国体験プログラム・オプショナルツアー検索サイト　｜　My Activity　－マイ・アクティビティ－</title>
	
		<meta charset="utf-8" />
		
		<meta name="keywords" content="マイアクティビティ、MyActivity、体験プログラム、着地型旅行、オプショナルツアー、街歩き、アクティビティ、観光プログラム">
		<meta name="description" content="日本全国ココでしかできない！体験プログラム・オプショナルツアー・着地型旅行情報検索サイト。ドコに行って何をするを実現します。">
		<link rel="shortcut icon" href="/favicon.ico" />  
		<!--[if lt IE 9]> 
			<script src="js/html5shiv.js"></script>
		<![endif]-->
		<!-- tour tmplat -->
		<?php echo $this->Html->css(array(
				'simplegrid.css',
				'style.css?ver=20140822',
                'galleriffic-3.css',
                'datepicker.css',
				'custom_h.css'
			));?>
        <?php  
            echo $this->Html->script(array(
                'jquery-1.11.1.min.js',
                'jquery.galleriffic.js',
                'jquery.opacityrollover.js',
                'jquery.imagemapster.js',
                'bootstrap.min.js',
                'bootstrap-datepicker.js',
                'locale/bootstrap-datepicker.ja.js',
                'jqueryEasing.js',
                'map.js'
            ));
			
        ?>
	</head>

	<body>
	<header id="top">
		<div id="tophead">
			<span id="topmassage">体験プログラム・オプショナルツアー・着地型旅行情報検索サイト「My Activity -マイ・アクティビティ－」</span>
			<h1>
				<a href="<?php echo $this->Html->url("/", true);?>">
					<?php echo $this->Html->image('logo.png', array(
									'id' => 'logo',
									'height' => 70
								));
					?>
				</a>
			</h1>
			<span id="sitemessage">ニッポン全国「ココでしかできない！」体験プログラムやツアーの情報検索サイト<br />
				「My Activity -マイ・アクティビティ－」</span>
			<ul class="toplk">
				<li>
					<a href="<?php echo $this->Html->url("/", true);?>page/about">MyActivityについて</a>
				</li>
				
			</ul>
			<ul class="login">
			
			</ul>

		</div>
	</header>
	<!-- トップイメージ -->
	<div id="navbox">
		<nav class="topnav">
			<form method="get" action="/searchs/search" id="search_s">
				<input name="keywords" id="keywords_s" value="" placeholder="サーチ..." type="text" /> 
				<input type="image" src="/theme/Front/img/s_btn.jpg" alt="検索" id="search_btn_s">
			</form>
		</nav>
	</div>
	
	<div id="main">
	
    	<article id="toplist">
    		  <div id="breadcrumb">
    		<?php if(!isset($staticpage)){ ?>
		          <?php echo $this->Html->getCrumbs(' > ', 'TOP'); ?>
            <?php } ?>
             <?php echo $this->fetch('content');?>				
    	</article>
	</div>
	
	<footer>
	 <div id="footernav">
		<ul>
		<li><a href="http://www.f-ness.com/company" target="_blank">運営会社</a>
		<li><a href="<?php echo $this->Html->url("/", true);?>page/termofuse">利用規約</a>
		<li><a href="http://www.f-ness.com/privacy/" target="_blank">プライバシーポリシー</a>
		<li><a href="<?php echo $this->Html->url(array('controller'=>'Contacts','action'=>'index'));?>">お問い合わせ</a>
		<li><a href="<?php echo $this->Html->url(array('controller'=>'Contactpartners','action'=>'index'));?>">掲載企業・パートナー募集</a>
		</ul>
		
		</div>
	
	<div id="copy"><small>Copyright &copy; F-ness Corporation. All Rights Reserved.</small></div>
		
	</footer>
	
	
		<script>
jQuery('document').ready(function(){
    jQuery('#smap').mapster({
    render_highlight : { altImage : 'theme/Front/img/map_on.jpg' },
    fillOpacity : 1,
    fill : false,
    mapKey: 'region'
});
});



</script>

	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53115254-1', 'auto');
  ga('send', 'pageview');

</script>
	
	
	</body>

</html>

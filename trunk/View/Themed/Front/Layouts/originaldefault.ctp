<!doctype html>
<html lang="ja">
	<head>
		<title>My Activity</title>
		<meta charset="utf-8" />
		<!--[if lt IE 9]> 
			<script src="js/html5shiv.js"></script>
		<![endif]-->
		<?php echo $this->Html->css(array(
                'bootstrap.min.css',
                'datepicker.css',
				'simplegrid.css',
				'style.css',
				'custom_h.css'
			));?>
		<?php  
            echo $this->Html->script(array(
                'jquery-1.11.1.min.js',
                'jquery.japan-map.min.js',
                'map-custom.js',
                'bootstrap.min.js',
                'bootstrap-datepicker.js',
                'jqueryEasing.js'
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
					<a href="">MyActivityについて</a>
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
				<input type="image" src="/theme/Front/img/s_btn.jpg" alt="検索" name="searchBtn_s" id="search_btn_s">
			</form>
		</nav>
	</div>

	<!-- BEGIN CONTENT -->
	<?php echo $this->fetch('content');?>
	<!-- END CONTENT -->
	
	<footer>
	 	<div id="footernav">
			<ul class="fix-bootstrap">
				<li><a class="fix-bootstrapa" href="#">運営会社</a>
				<li><a class="fix-bootstrapa" href="#">利用規約</a>
				<li><a class="fix-bootstrapa" href="#">プライバシーポリシー</a>
				<li><a class="fix-bootstrapa" href="<?php echo $this->Html->url(array('controller'=>'Contacts','action'=>'sendcontact'));?>">お問い合わせ</a>
				<li><a class="fix-bootstrapa" href="#">掲載企業・パートナー募集</a>
			</ul>
		</div>
		<div id="copy"><small class="fix-small">Copyright &copy; F-ness Corporation. All Rights Reserved.</small></div>
	</footer>
	</body>
    
</html>

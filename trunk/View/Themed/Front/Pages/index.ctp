	<div id="mainimg">
		<div id="copyarea">
			<h1 id="maincopy">「ココでしかできない！」と出会える<br />ニッポン全国の素晴らしい体験プログラム</h1>
			</div>
		<div id="slide">
		<?php echo $this->Html->image('/theme/Front/img/top.jpg', array('id' => 'topimage'));?>
		<?php echo $this->Html->image('/theme/Front/img/top1.jpg', array('id' => 'topimage2'));?>
		<?php echo $this->Html->image('/theme/Front/img/top2.jpg', array('id' => 'topimage3'));?>
		<?php echo $this->Html->image('/theme/Front/img/top3.jpg', array('id' => 'topimage4'));?>
		<?php echo $this->Html->image('/theme/Front/img/top4.jpg', array('id' => 'topimage5'));?>
		</div>
		<div id="searchbox_l">
			<?php echo $this->element('filter2');?>
		</div>
	
	</div>
		
	<div id="main">
	
		<div id="searchbox">
			<?php echo $this->element('map'); ?>	
			<?php echo $this->element('categories'); ?>
		</div>
		<article id="toplist">
			<h1><img src="theme/Front/img/title_featured.jpg"></h1>
			<div class="grid grid-pad">
				<?php echo $this->element('featured');?>
			</div>			
			<div class="linknext">
				<a href="/featureds"><img src="theme/Front/img/linknext.jpg"></a>
			</div>
		</article>
		<div id="news">
			<?php echo $this->element('topnews'); ?>
		</div>
	</div>
<!doctype html>
<html lang="ja">
	<head>
		<title>日本全国体験プログラム・オプショナルツアー検索サイト　｜　My Activity　－マイ・アクティビティ－</title>
		<meta charset="utf-8" />
		<meta name="keywords" content="マイアクティビティ、MyActivity、体験プログラム、着地型旅行、オプショナルツアー、街歩き、アクティビティ、観光プログラム">
		<meta name="description" content="日本全国ココでしかできない！体験プログラム・オプショナルツアー・着地型旅行情報検索サイト。ドコに行って何をするを実現します。">
		<link rel="shortcut icon" href="/favicon.ico" />  
		<!--[if lt IE 9]> 
			<script src="js/html5shiv.js"></script>
		<![endif]-->
	<link rel="stylesheet" type="text/css" href="/theme/Front/css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="/theme/Front/css/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="/theme/Front/css/style.css">
	<link rel="stylesheet" type="text/css" href="/theme/Front/css/custom_h.css">
	<link rel="stylesheet" type="text/css" href="/theme/Front/css/galleriffic-3.css">
	<script type="text/javascript" src="/theme/Front/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/theme/Front/js/jquery.imagemapster.js"></script>
	<script type="text/javascript" src="/theme/Front/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/theme/Front/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/theme/Front/js/map.js"></script>
	<script type="text/javascript" src="/theme/Front/js/jqueryEasing.js"></script>
	<script type="text/javascript" src="/theme/Front/js/locale/bootstrap-datepicker.ja.js"></script>
	<script type="text/javascript" src="/theme/Front/js/jquery.opacityrollover.js"></script>
	<script type="text/javascript" src="/theme/Front/js/jquery.galleriffic.js"></script>

	</head>
	<body>
	<header id="top">
		<div id="tophead">
			<span id="topmassage">体験プログラム・オプショナルツアー・着地型旅行情報検索サイト「My Activity -マイ・アクティビティ－」</span>
			<h1>
				<a href="<?php echo $this->Html->url("/", true);?>">
					<img src="/theme/Front/img/logo.png" id="logo" height="70" alt="">
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
				<input type="image" src="/theme/Front/img/s_btn.jpg" alt="検索" name="searchBtn_s" id="search_btn_s">
			</form>
		</nav>
	</div>
	
	<!-- BEGIN CONTENT -->
	<?php if(!isset($_POST)){?>
    <h1 class="error">お探しのツアーは見つかりませんでした</h1>
<?php }else{ ?>
	
	
	
	<div id="main">
		<article id="toplist">
			<div id="breadcrumb">
				 <?php echo $this->Html->getCrumbs(' > ', 'TOP'); ?>
            <?php
                       
				 echo $this->Html->addCrumb('プレビュー', $referer);
							
								 ?></div>	
		<h1><img src="/theme/Front/img/detail_info.jpg" alt=""></h1>
		
	
        <p class="cond_s"><?php echo __('エリア/'); echo __($area['Area']['name']);?> 
        <p class="cond_s"><?php echo __('ジャンル/');
            foreach($cat as $category_name)
            {
               
				if ($category_name === end($cat)) {
					 echo __($category_name);
				}else{
					 echo __($category_name);
				echo __("・");
				}
					
            }?>
        </p>
        <div class="details_tour">
		<div class="title_tour"><?php echo __($detail['TourPackage']['tour_name']); ?></div>
		<div class="short_description clearfx">
				<?php echo __($detail['TourPackage']['title']); ?>
			</div>
		
			<div class="category_area clearfx"><?php echo __($prefname);?>/<?php echo __($area['Area']['name']); echo __('エリア'); ?></div>
			
			<div class="category_tour">
		 <?php echo __('ジャンル/');
            foreach($cat as $category_name)
            {
               
				if ($category_name === end($cat)) {
					 echo __($category_name);
				}else{
					 echo __($category_name);
				echo __("・");
				}
					
            }?>
        </div>
			<div class="fee_tour"><?php echo __('1名');echo __($detail['TourPackage']['fee_adult']);?></div>
			<hr class="hrline">
				<div class="tourcontent clearfx">
				<?php echo __($detail['TourPackage']['content']); ?>
			</div>
			
			<hr class="hrline">
		<!-- スライドショー -->
        
		<div class="slidegallery">
            <div id="gallery" class="contentgallery">
    			<div class="slideshow-container">
    				<div id="loading" class="loader"></div>
    				<div id="slideshow" class="slideshow"></div>
    			</div>
    		</div>
            <div id="thumbs" class="navigation">
            	
    			<ul class="thumbs noscript">
    				<?php if(isset($details)){
    					foreach($details['Image'] as $det){
						?>
						 	
    				<li>
    					<a class="thumb" name="leaf" href="<?php echo $this->webroot;?>files/<?php echo $det['name']; ?>" title="Title #0">
    						<img src="<?php echo $this->webroot;?>files/thumbnail/<?php echo $det['name']; ?>"/>
    					</a>
    					<div class="caption">
    						<div class="download">
    							<a href="<?php echo $this->webroot;?>files/<?php echo $det['name']; ?>">Download Original</a>
    						</div>
    					</div>
    				</li>
    				<?php }
    				}
					?>
                    <?php foreach($images as $image){
                    	if($image !==NULL) {?>
                    	
    				<li>
    					<a class="thumb" name="leaf" href="<?php echo $this->webroot;?>files/<?php echo $image; ?>" title="Title #0">
    						<img src="<?php echo $this->webroot;?>files/thumbnail/<?php echo $image; ?>"/>
    					</a>
    					<div class="caption">
    						<div class="download">
    							<a href="<?php echo $this->webroot;?>files/<?php echo $image; ?>">Download Original</a>
    						</div>
    					</div>
    				</li>
                    <?php }} ?> 
    			</ul>
    		</div> 
        </div>       
		<div class="clearfx">
			<hr class="hrline">
		
			
			<div class="description_tour clearfx"><?php echo __($detail['TourPackage']['long_description']);?></div>
				
            <table border="0" cellspacing="1" cellpadding="1" bgcolor="#eeeeee" class="table_menu" style="font: 12px; ">
            	 <tr>
                	<th width="240"><?php  echo __('催行日'); ?></th><td><?php echo __($detail['TourPackage']['open_date']);?></td>
                </tr>
            
                <tr>
                	
                	<th width="240"><?php  echo __('最少催行人数'); ?></th><td><?php if($detail['TourPackage']['min_passenger'] !== NULL){echo __($detail['TourPackage']['min_passenger']),'名';}
					if($detail['TourPackage']['remarks_min'] !== ''){ echo " *";}                	
					 echo __($detail['TourPackage']['remarks_min']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('定員'); ?></th><td><?php if($detail['TourPackage']['max_passenger'] !== NULL){echo __($detail['TourPackage']['max_passenger']),'名';}
                	if($detail['TourPackage']['remarks_max'] !== ''){ echo " *";}                	
                	echo __($detail['TourPackage']['remarks_max']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('集合場所'); ?></th><td><?php echo __($detail['TourPackage']['meeting_place']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('集合時間'); ?></th><td><?php echo __($detail['TourPackage']['meeting_time']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('催行場所'); ?></th><td><?php echo __($detail['TourPackage']['place']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('所要時間'); ?></th><td><?php echo __($detail['TourPackage']['estimate_time']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('対象年齢'); ?></th><td><?php echo __($detail['TourPackage']['target_age']);?></td>
                </tr>
                 <tr>
                	<th width="240"><?php  echo __('大人料金'); ?></th><td><?php echo __($detail['TourPackage']['fee_adult']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('子供料金'); ?></th><td><?php echo __($detail['TourPackage']['fee_child']);?></td>
                </tr>
                <tr>
                	<th width="240" height="110"><?php  echo __('ツアー内容'); ?></th><td>
                	   <ul class="schedule">
                		<li><?php echo __($detail['TourPackage']['short_description']); ?></li>
                	</ul></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('予約締切'); ?></th><td><?php if($detail['TourPackage']['reservation_end'] !== "") { echo __($detail['TourPackage']['reservation_end']);
                		 ?>日前 <?php } ?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('備考'); ?></th><td><?php echo __($detail['TourPackage']['remark']);?></td>
                </tr>
            </table>

            <table border="0" cellspacing="1" cellpadding="1" bgcolor="#eeeeee" class="table_organizer" style="font: 12px; ">
                <tr>
                	<th width="240"><?php  echo __('提供社名'); ?></th><td><?php echo __($sponsor['Sponsor']['sponsor_name']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('住所'); ?></th><td><?php echo __($sponsor['Sponsor']['address']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('電話番号'); ?></th><td><?php echo __($sponsor['Sponsor']['phone_number']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('お問い合わせ先'); ?></th><td><?php echo __($sponsor['Sponsor']['email']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('営業時間'); ?></th><td><?php echo __($sponsor['Sponsor']['business_hour']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('URL'); ?></th><td><a href="<?php echo __($sponsor['Sponsor']['url']);?>" target="_blank"><?php echo __($sponsor['Sponsor']['url']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('定休日'); ?></th><td><?php echo __($sponsor['Sponsor']['holiday']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('旅行業者'); ?></th>
                    <td>
                        <?php 
                        	if(isset($sponsor['Sponsor']['agency_flag'])){
                        		if(($sponsor['Sponsor']['agency_flag'])=='1'){
                        			echo '有';
                        		}
                        		if(($sponsor['Sponsor']['agency_flag'])=='0'){
                        			echo '-';
                        		}
                        	}
                        ?>
                    </td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('旅行業登録番号'); ?></th><td><?php echo __($sponsor['Sponsor']['license_number_1']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('旅行業務取扱管理者'); ?></th><td><?php echo __($sponsor['Sponsor']['license_number_2']);?></td>
                </tr>
                
                <?php if($details['TourPackage']['pdfcontent'] !== NULL) {if($details['TourPackage']['pdfcontent'] !== "") { ?>
                 <tr>
                	<th width="240"><?php  echo __('資料ダウンロード'); ?></th><td><a href="<?php echo $this->webroot;?>tours/view_data/<?php echo $details['TourPackage']['id']; ?>" target="new">ダウンロードはこちら</a></td>
                </tr>
                <?php }} ?>
                 <?php if($detail['TourPackage']['pdfcontent'] !== NULL) {if($detail['TourPackage']['pdfcontent'] !== "") { ?>
                 <tr>
                	<th width="240"><?php  echo __('資料ダウンロード'); ?></th><td><a href="<?php echo $this->webroot;?>tours/view_data/<?php echo $detail['TourPackage']['id']; ?>" target="new">ダウンロードはこちら</a></td>
                </tr>
                <?php }} ?>
            </table>


		</div>
		</div>
				
		<div id="placeinfo" class="clearfx">
		    <h1><?php echo __($detail['TourPackage']['place']);?></h1>
			<address>
			<?php echo __($detail['TourPackage']['address_google']);?>
			</address>	
		   
         <div id="googlemap">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script>
		var geocoder;
		var map;
		<?php isset($address) ? $address : '渋谷';?>

		function initialize() {
		  geocoder = new google.maps.Geocoder();
		  var latlng = new google.maps.LatLng(35.681382, 139.766084);
		  var mapOptions = {
		    zoom: 16,
		    center: latlng
		  }
		  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		  codeAddress();
		}

		function codeAddress() {
		  //var address = document.getElementById('address').value;
		  geocoder.geocode( { 'address': '<?php echo $detail['TourPackage']['address_google']?>'}, function(results, status) {
		    if (status == google.maps.GeocoderStatus.OK) {
		      map.setCenter(results[0].geometry.location);
		      var marker = new google.maps.Marker({
		          map: map,
		          position: results[0].geometry.location
		      });
		    } else {
		     
		    }
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	  </script>
	<div id="map-canvas"></div>
</div>
            
		</div>

    	<div id="charge">
        	<div id="title_charge"><strong>料金</strong></div>
        	<div id="decs_charge">
            	<p>	<?php echo __($detail['TourPackage']['fee_adult']);?></p>
            		<?php if($detail['TourPackage']['remark_for_fee'] == ""){ ?>
            		
            	<?php }else{ ?>
            		<p class="comment_charge"><?php echo __($detail['TourPackage']['remark_for_fee']); ?></p>
            		<?php } ?>     
            	
        	</div>	
    	</div>
    	
    	<div id="including">
        	<div id="title_including"><strong><?php  echo __('料金に含まれるもの'); ?></strong></div>
        	<div id="decs_including">
        	   <?php echo __($detail['TourPackage']['includings']);?>
        	</div>
    	</div>

    		
     
<?php } ?>        
<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '500', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				

				

				/****************************************************************************************/
			});
		</script> 

	<!-- END CONTENT -->
	
	<footer>
	 	<div id="footernav">
			<ul class="fix-bootstrap">
				<li><a class="fix-bootstrapa" href="http://www.f-ness.com/company" target="_blank">運営会社</a>
				<li><a class="fix-bootstrapa" href="<?php echo $this->Html->url("/", true);?>page/termofuse">利用規約</a>
				<li><a class="fix-bootstrapa" href="http://www.f-ness.com/privacy/" target="_blank">プライバシーポリシー</a>
				<li><a class="fix-bootstrapa" href="<?php echo $this->Html->url(array('controller'=>'Contacts','action'=>'index'));?>">お問い合わせ</a>
				<li><a class="fix-bootstrapa" href="<?php echo $this->Html->url(array('controller'=>'Contactpartners','action'=>'index'));?>">掲載企業・パートナー募集</a>
			</ul>
		</div>
		<div id="copy"><small class="fix-small">Copyright &copy; F-ness Corporation. All Rights Reserved.</small></div>
	</footer>



	<script>
jQuery('document').ready(function(){
    jQuery('#smap').mapster({	
    fillOpacity : 1,
    singleSelect : true,
    clickNavigate : true,
    render_highlight :{ altImage :'/theme/Front/img/map_on.jpg'},
    mapKey: 'region'
});
});

</script>
	


	</body>
    
</html>

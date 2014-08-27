<?php if(!isset($detail)){?>
    <h1 class="error">お探しのツアーは見つかりませんでした</h1>
<?php }else{ ?>
            <?php
                        
						if(strstr($referer, "filter") || strstr($referer, "search"))
						{
						
							$this->Html->addCrumb('ツアー一覧', $referer);
							$this->Html->addCrumb($detail['TourPackage']['tour_name'], array('controller' => 'tours', 'action' => 'detail',$detail['TourPackage']['id']));
							
						}else{
						$this->Html->addCrumb('ツアー一覧', array('controller'=>'Filters','action'=>'index'));
                        $this->Html->addCrumb($detail['TourPackage']['tour_name'], array('controller' => 'tours', 'action' => 'detail',$detail['TourPackage']['id']));
						
						}
			 ?></div>	
		<h1><?php echo $this->Html->image('detail_info.jpg'); ?></h1>

		<p class="cond_s"><?php echo __('参加予定日／指定なし');?> </p>
        <p class="cond_s"><?php echo __('エリア/'); echo __($detail['Area']['name']);?> 
        <p class="cond_s"><?php echo __('ジャンル/');
            foreach($detail['Category'] as $category_name)
            {
               
				if ($category_name === end($detail['Category'])) {
					 echo __($category_name['name']);
				}else{
					 echo __($category_name['name']);
				echo __("・");
				}
					
            }?>
        </p>
        <div class="details_tour">
		<div class="title_tour"><?php echo __($detail['TourPackage']['tour_name']); ?></div>
		<div class="short_description clearfx">
				<?php echo __($detail['TourPackage']['title']); ?>
			</div>
		
			<div class="category_area clearfx"><?php echo __($detail['Prefecture']['name']);?>/<?php echo __($detail['Area']['name']); echo __('エリア'); ?></div>
			
			<div class="category_tour">
                        <?php foreach($detail['Category'] as $category_name){
                           if ($category_name === end($detail['Category'])) {
					 echo __($category_name['name']);
				}else{
					 echo __($category_name['name']);
				echo __("・");
				}
                        }?></div>
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
                    <?php foreach($detail['Image'] as $image){
                    	if($image['name'] !==NULL) {?>
                    	
    				<li>
    					<a class="thumb" name="leaf" href="<?php echo $this->webroot;?>files/<?php echo $image['name']; ?>" title="Title #0">
    						<img src="<?php echo $this->webroot;?>files/thumbnail/<?php echo $image['name']; ?>"/>
    					</a>
    					<div class="caption">
    						<div class="download">
    							<a href="<?php echo $this->webroot;?>files/<?php echo $image['name']; ?>">Download Original</a>
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
                	<th width="240"><?php  echo __('提供社名'); ?></th><td><?php echo __($detail['Sponsor']['sponsor_name']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('住所'); ?></th><td><?php echo __($detail['Sponsor']['address']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('電話番号'); ?></th><td><?php echo __($detail['Sponsor']['phone_number']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('お問い合わせ先'); ?></th><td><?php echo __($detail['Sponsor']['email']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('営業時間'); ?></th><td><?php echo __($detail['Sponsor']['business_hour']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('URL'); ?></th><td><a href="<?php echo __($detail['Sponsor']['url']);?>" target="_blank"><?php echo __($detail['Sponsor']['url']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('定休日'); ?></th><td><?php echo __($detail['Sponsor']['holiday']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('旅行業者'); ?></th>
                    <td>
                        <?php 
                        	if(isset($detail['Sponsor']['agency_flag'])){
                        		if(($detail['Sponsor']['agency_flag'])=='1'){
                        			echo '有';
                        		}
                        		if(($detail['Sponsor']['agency_flag'])=='0'){
                        			echo '-';
                        		}
                        	}
                        ?>
                    </td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('旅行業登録番号'); ?></th><td><?php echo __($detail['Sponsor']['license_number_1']);?></td>
                </tr>
                <tr>
                	<th width="240"><?php  echo __('旅行業務取扱管理者'); ?></th><td><?php echo __($detail['Sponsor']['license_number_2']);?></td>
                </tr>
                <?php if($detail['TourPackage']['pdfcontent'] !== NULL) {if($detail['TourPackage']['pdfcontent'] !== "") { ?>
                 <tr>
                	<th width="240"><?php  echo __('資料ダウンロード'); ?></th><td><a href="../view_data/<?php echo $detail['TourPackage']['id']; ?>" target="new">ダウンロードはこちら</a></td>
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
		   
            <?php echo $this->element('map_details');?>
            
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
    	<?php if($detail['TourPackage']['application_url'] == ""){ ?>
    		 <div class="button-detail"><a href="../../Applications/register/<?php echo $detail['Prefecture']['id']; ?>/<?php echo $detail['TourPackage']['id']; ?>" target="_blank">
        	<img src="<?php echo $this->webroot . 'theme/Front/img/linkapply.jpg' ?>" alt="申し込み"></a>
        </div> 
    		<?php }else{ ?>  
    		
        <div class="button-detail"><a href="<?php echo $detail['TourPackage']['application_url']; ?>" target="_blank"><img src="<?php echo $this->webroot . 'theme/Front/img/linkapply.jpg' ?>" alt="申し込み"></a></div> 

<?php }} ?>        
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

<article id="toplist">
		<h1><img src="<?php echo $this->webroot . 'theme/' . $this->theme . '/img/sub/results_title.jpg' ?>" id="result"></h1>
		<?php if (!empty($tours)) :?>
		<!-- <p class="cond_s">参加予定日／指定なし　　エリア／首都圏-東京-指定なし　　ジャンル／指定なし</p> -->
		<?php 
			if (isset($map_details) && $map_details)
			{				
				echo $this->element('map_details');
			}
		?>
		<?php foreach ($tours as $key => $tour) :?>
			<div class="grid result_s <?php echo $tour['TourPackage']['id'];?>">
				<section class="col-1-1 sub_s">
					<div class="results">
						<div class="imgtitle"><?php echo __($tour['Prefecture']['name']);?>/<?php echo __($tour['Area']['name']);?></div>
						<?php if (!empty($tour["Image"][0]["name"])) :?>
							<a href="/tours/detail/<?php echo $tour['TourPackage']['id'];?>">
							<img src='<?php echo $this->webroot .  "files/" . $tour["Image"][0]["name"]; ?>' width="250" height="250"  class="img_tour" />
							</a>
						<?php else : ?>
							<a href="/tours/detail/<?php echo $tour['TourPackage']['id'];?>">
							<img src="<?php echo $this->webroot . 'img/noimage.jpg' ?>" width="250" height="250" class="img_tour"/>
							</a>
						<?php endif;?>
					
						<div class="description">
							<div class="title_tour"><a href="/tours/detail/<?php echo $tour['TourPackage']['id'];?>"><?php echo __($tour['TourPackage']['tour_name']);?></a></div>
								<div class="short_description clearfx">
				<?php echo __($tour['TourPackage']['title']); ?></div>
							<div class="category_area clearfx"><?php echo __($tour['Prefecture']['name']);?>/<?php echo __('%s', $tour['Area']['name']);?></div>
							<div class="category_tour"><?php 
								 foreach($tour['Category'] as $category_name)
            {
               
				if ($category_name === end($tour['Category'])) {
					 echo __($category_name['name']);
				}else{
					 echo __($category_name['name']);
				echo __("/");
				}
					
            }?>
							
				</div>
							<div class="fee_tour"><?php echo __('1名');echo __($tour['TourPackage']['fee_adult']);?></div>
							<hr class="hrline"><div class="tourcontent clearfx">
					
				<?php 
				
				$tid = $tour['TourPackage']['id'];
				$continue = "・・・・・<a href='/tours/detail/". $tid . "' class='listlink'>続きを読む</a>";
				$desc = strip_tags($tour['TourPackage']['content']);
				echo mb_strimwidth($desc, 0, 200, $continue, 'UTF-8'); ?>
			</div>
						</div>
					</div>
				</section>
			</div>
		<?php endforeach;?>	
		<?php else: ?>
			<p> <?php echo __('お探しのツアーは見つかりませんでした。');?>
		<?php endif;?>		
		<div class="paginator">
			<div class="number">
				<ul>
                    <?php
                                    
    print $this->Paginator->counter('{:count}件中{:start}-{:end}件({:pages}ページ中{:page}ページ)
');
    if($this->Paginator->hasPrev()) print $this->Paginator->prev('≪' , array('class'=>'block'));
    print $this->Paginator->numbers(array(
    'class'=>'block',
    'modules' => 6 ,
    'first'=>2,
    'last'=>2,
    'currentClass'=>'red',
    'separator'=>null
    ));
    if($this->Paginator->hasNext()) print $this->Paginator->next(' ≫' , array('class'=>'block'));
                   // echo $this->Paginator->hasPage($model = null , $page = 1);
                   //     $page = $this->Paginator->param('page');
                    //    if($page >= 2){
                     //       echo $this->Paginator->prev(__('<<　'), array('tag' => 'li'));
                      //      echo $this->Paginator->numbers(array('separator' => ' ','tag'=>'li'));
                       //     echo $this->Paginator->next(__('　>>'), array('tag' => 'li'));
                       // }
				    ?>
                </ul>
			</div>
		</div>
	</article>
	<script>
    	jQuery('document').ready(function(){
            jQuery('.datepicker').datepicker();
            var t = jQuery('#result').position().top;
            jQuery('html,body').stop().animate({scrollTop: t },700);
        });
    </script>
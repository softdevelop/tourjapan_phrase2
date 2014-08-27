
<!--
<section   class="col-1-3 large first">
	
	

	<div class="content">
		
		<div class="coltitle">
			<?php
				echo __('%s', $toursFeatured[0]['Area']['name']);
			?>
		</div>
		<?php if (!empty($toursFeatured[0]['Image'][0]['name'])) :?>
			<div class="first-img">
				<img src=' <?php echo $this->webroot .  "files/" . $toursFeatured[0]["Image"][0]["name"]; ?>' height="600"> 
			</div>
		<?php else : ?>
			<img src="<?php echo $this->webroot . 'img/noimage.jpg' ?>" width="307" height="471">
		<?php endif;?>
		<div class="caption">
			<a href="/tours/detail/<?php echo $toursFeatured[0]['TourPackage']['id'];?>">
				<?php echo __('%s', $toursFeatured[0]['TourPackage']['tour_name'])?>
			</a>
		</div>
	</div>
</section>
-->
<?php for ($i = 0; $i < 6; $i++) {?>
	
	<section   class="col-1-3 small lasts">
		
		<div class="content">
			<div class="coltitle"><?php echo $toursFeatured[$i]['Prefecture']['name'];?>/<?php echo __('%s', $toursFeatured[$i]['Area']['name']);?>
			</div>
			<?php if (!empty($toursFeatured[$i]['Image'][0]['name'])) :?>
				<a href="/tours/detail/<?php echo $toursFeatured[$i]['TourPackage']['id'] ?>">
				<img src='<?php echo $this->webroot .  "files/" . $toursFeatured[$i]["Image"][0]["name"]; ?>' width="310" height="310">
				</a>
			<?php else : ?>
				<a href="/tours/detail/<?php echo $toursFeatured[$i]['TourPackage']['id'] ?>">
				<img src="<?php echo $this->webroot . 'img/noimage.jpg' ?>" width="310" height="310">
				</a>
			<?php endif;?>
			<div class="caption">
			<a href="/tours/detail/<?php echo $toursFeatured[$i]['TourPackage']['id'] ?>">
				<?php echo __('%s', $toursFeatured[$i]['TourPackage']['tour_name'])?>
			</a>
		</div>
		</div>
	</section>
<?php } ?>
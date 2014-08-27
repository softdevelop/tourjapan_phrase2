<form method="post" action="/filters" id="search_l">
	<div id="caldate">
		<label for="date"><?php echo __("参加希望日"); ?></label>
		<input type="text" name="data[schedule]" class="search-head datepicker" data-date-format="yyyy-mm-dd" size="20">
		<?php echo $this->Html->image('/theme/Front/img/icon/icon_cal.png');?>
	</div>

	<div id="calcate">
		<label for="category"><?php echo __("ジャンル"); ?></label>
		<?php $categories = $this->requestAction('/categories/listAll');?>
		<select name="data[cat]">
			<option value="" selected>▼ジャンル</option>
			<?php foreach ($categories as $key => $cat) : ?>
				<option value="<?php echo $key;?>"><?php echo $cat;?></option>
			<?php endforeach;?>
		</select>
	</div>

	<div id="calcate" class="clearfx">
		<label for="area">><?php echo __("開催エリア"); ?></label>
		<select id="region">
			<option value="" selected="">▼地方</option>
			<?php 
				$regions = $this->requestAction('/areas/getRegion');
				foreach ($regions as $key => $region) {
			?>
				<option value="<?php echo $key?>"><?php echo __('%s', $region);?></option>		
			<?php
				}
			?>
		</select>


		<select id="prefecture">
			<option value="default" selected="">▼都道府県</option>
		</select>

		<select id="area" name="data[area]">
			<option value="" selected="">▼エリア</option>
		</select>
	</div>
	
	<div id="submit">
		<input type="image" src="/theme/Front/img/s_btn.jpg" alt="検索" name="searchBtn_l" id="search_btn_l" class="filter_submit">
	</div>
</form>

<script type="text/javascript">
	jQuery('document').ready(function(){
		jQuery('#region').change(function(){
			var val = jQuery(this).val();
			if (val != '')
			{
				jQuery.ajax({
					url : 'http://<?php echo $_SERVER["SERVER_NAME"];?>/areas/getPref/' + val,
					type: 'POST',
					'data' : {id : val},
					dataType: 'json',
					success: function(data) {
						var st = "<option value='' selected>▼都道府県</option>";
						jQuery.each(data, function(i, v){
							st += "<option value='" + i + "'> " + v + "</option>"
						});
						jQuery('#prefecture').empty();
						jQuery('#prefecture').append(st);
					}

				});
			}
		});


		jQuery('#prefecture').change(function(){
			var val = jQuery(this).val();
			if (val != '')
			{
				jQuery.ajax({
					url : 'http://<?php echo $_SERVER["SERVER_NAME"];?>/areas/getArea/' + val,
					type: 'POST',
					'data' : {id : val},
					dataType: 'json',
					success: function(data) {
						var st = '<option value="" selected>▼エリア</option>';
						jQuery.each(data, function(i, v){
							st += "<option value='" + i + "'> " + v + "</option>"
						});
						jQuery('#area').empty();
						jQuery('#area').append(st);
					}

				});
			}
		});
	});
</script>
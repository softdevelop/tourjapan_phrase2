<form method="get" action="/filters" id="search_l">



	<div id="calarea" >
		<label for="area"><?php echo __("開催エリア"); ?></label>
		<select id="region" name="data[region]">
			<?php 
			if(isset($postdata)){
				$rg=$postdata['region'];
				$ar=$postdata['area'];
				$pr=$postdata['prefecture']; 
			}else{
				
				$rg="no";
				$ar="no";
				$pr="no";
			}

?>
			<option value="default" selected="">▼地方</option>
			<?php 
				$regions = $this->requestAction('/areas/getRegion');
				foreach ($regions as $key => $region) {
			?>
				<option value="<?php echo $key?>" <?php 
				if(isset($postdata['region']) && $postdata['region'] !== "default"){
						if($postdata['region'] == $key){
							
						echo "selected='selected'";		
						}
						
					} ?>><?php echo __('%s', $region);?></option>		
			<?php
				}
			?>
		</select>
	

		<select id="prefecture" name="data[prefecture]">
			<option value="default" selected="">▼都道府県</option>
		</select>

		<select id="area" name="data[area]">
			<option value="default" selected="">▼エリア</option>
		</select>
	</div>
	
	<div id="calcate" class="clearfx" >
		<label for="category"><?php echo __("ジャンル"); ?></label>
		<?php $categories = $this->requestAction('/categories/listAll');?>
		<select name="data[cat]">
			<option value="" selected>▼ジャンル</option>
			<?php foreach ($categories as $key => $cat) : ?>
				<option value="<?php echo $key;?>"><?php echo $cat;?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div id="submit" >
		<input type="image" src="/theme/Front/img/s_btn.jpg" alt="検索" name="searchBtn_l" id="search_btn_l" class="filter_submit">
	</div>
</form>

<script>

		



	jQuery('document').ready(function(){
		jQuery('#region').ready(function(){
			
			var val="<?php echo $rg; ?>";
			
			if (val != 'no')
			{
				
				var pref="<?php echo $pr; ?>";
				jQuery.ajax({
					url : 'http://<?php echo $_SERVER["SERVER_NAME"];?>/areas/getPref/' + val,
					type: 'POST',
					'data' : {id : val},
					dataType: 'json',
					success: function(data) {
						var st = "<option value='default' selected>▼都道府県</option>";
						jQuery.each(data, function(i, v){
							if (pref == i){
								alert("koko");
							st += "<option value='" + i + "' selected='selected' > " + v + "</option>"
							}else{
								alert(i);
							st += "<option value='" + i + "'> " + v + "</option>"
							}
						});
						jQuery('#prefecture').empty();
						jQuery('#prefecture').append(st);
					}

				});
			}
		});
		
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
						var st = "<option value='default' selected>▼都道府県</option>";
						jQuery.each(data, function(i, v){
							st += "<option value='" + i + "'> " + v + "</option>"
						});
						jQuery('#prefecture').empty();
						jQuery('#prefecture').append(st);
					}

				});
			}
		});
		jQuery('#prefecture').ready(function(){
			
			var ar="<?php echo $ar; ?>";
			var val="<?php echo $pr; ?>";
			
			if (area != 'no')
			{
				
				jQuery.ajax({
					url : 'http://<?php echo $_SERVER["SERVER_NAME"];?>/areas/getArea/' + val,
					type: 'POST',
					'data' : {id : val},
					dataType: 'json',
					success: function(data) {
						var st = '<option value="default" selected>▼エリア</option>';
						jQuery.each(data, function(i, v){
							if ( ar == i){
							st += "<option value='" + i + "' selected='selected' > " + v + "</option>"
							}else{
							st += "<option value='" + i + " '> " + v + "</option>"
							}
						});
						jQuery('#area').empty();
						jQuery('#area').append(st);
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
						var st = '<option value="default" selected>▼エリア</option>';
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
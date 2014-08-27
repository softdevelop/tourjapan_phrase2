<?php $categories = $this->requestAction('/categories/listAll');?>
<div id="catsearch">
	<form method="get" action="/categories/filter" id="cats">
		<p>絞り込みたいジャンルを選んでください（複数選択可）</p>
		
		<table id="chkbox">
			<tbody>
				<tr>
					<?php $i = 0; foreach ($categories as $key => $category) {
					
						
						?>
						
						<td class="fix-cat"><input type="checkbox" name="catId[]" <?php 
						
						
						if(isset($postdata['catId'])){
							if(is_array($postdata['catId'])){
						foreach ($postdata['catId'] as $value){
							if($value==$key){ echo "checked='checked'"; } 
						}}else{
							
							if($key==$postdata['catId']){ echo "checked='checked'";}
						}
							
						} ?> value="<?php echo $key;?>"><strong><?php echo $category;?></strong></td>
					<?php 
						
						$i++; 
						if ($i % 3 == 0) echo "</tr><tr>"; 
					} ?>					
				</tr>
			</tbody>
		</table>
		<div id="submit_cat">
			<input type="image" src="/theme/Front/img/s_btn.jpg" alt="検索" name="searchBtn_l" id="search_btn_l" class="filter_submit">
		</div>
	</form>
</div>	
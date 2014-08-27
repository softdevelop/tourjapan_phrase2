<form action="/admin/news" method="get">
	<div class="table-scrollable">
		<?php echo var_dump($cond); ?>
		<table class="table table-striped table-bordered table-hover dataTable" id="datatable_orders" aria-describedby="datatable_orders_info">
			<thead>
				<tr role="row" class="heading">
					<th width="5%" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="Order&amp;nbsp;#: activate to sort column ascending">
						ステータス
					</th>
					<th width="10%" class="sorting" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
						 Actions
					: activate to sort column ascending">
						 Actions
					</th>
				</tr>
				<tr role="row" class="filter">
					<td rowspan="1" colspan="1">
				
						<select name="status">
						<option value="default">選択してください</option>
						<option value="hidden"> 非公開 </option>
						<option value="publish"> 公開 </option>
						<option value="reserved"> 予約 </option>
						<option value="finished"> 終了 </option>
						</select>
						</td>
					<td rowspan="1" colspan="1">
						<div class="margin-bottom-5">
							<button class="btn btn-sm yellow filter-submit margin-bottom" type="submit"><i class="fa fa-search"></i> 検索</button>
						</div>
						<button class="btn btn-sm red filter-cancel" type="reset"><i class="fa fa-times"></i> リセット</button>
					</td>
				</tr>
			</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
		</tbody>
	</table>
	</div>
</form>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-edit"></i>
					<?php echo __('ニュース一覧');?>
				</div>
			
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group" style="float: right;margin-bottom: 10px;">
						<?php 
							echo $this->Html->link(
							    '新規追加',
							    array('controller' => 'news', 'action' => 'add'),
							    array('class' => 'btn green')
							);

						?>
					</div>
					
				</div>
				<div id="sample_editable_1_wrapper" class="dataTables_wrapper" role="grid">
					<div class="table-scrollable">
						<table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info">
						<thead>
							<tr role="row">
								<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="
									 ID" style="width: 169px;">
									<?php echo __('ID');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 228px;">
									 <?php echo __('タイトル');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 228px;">
									 <?php echo __('表示期間');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php echo __('状態');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php echo __('編集');?>
								</th>
								<!-- <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php // echo __('Delete');?>
								</th> -->
							</tr>
						</thead>
						
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<?php
								$i = 1;
								foreach ( $news  as $new ) :
							?>
								<tr class="<?php if ( $i % 2 != 0 ): ?> odd <?php else: ?> even <?php endif;?>">
									<td class="sorting_1">
										<?php echo $new['News']['id'];?>
									</td>
									<td class=" ">
										<?php echo $new['News']['title'];?>
									</td>
									<td class=" ">
										<?php echo $new['News']['schedule_start'] . ' / ' . $new['News']['schedule_end']; ?>
									</td>
									<td class=" ">
										<?php 
										    $today = strtotime(date('Y-m-d'));
											$res = strtotime($new['News']['schedule_start']);
											$end =  strtotime($new['News']['schedule_end']);
											if($new['News']['status'] == '0'){
												echo "非公開";}elseif($res >= $today){echo "予約";}elseif($end <= $today){
													echo "終了";}else{echo"公開";}
											
										?>
									</td>
									<td class=" ">
										<?php 
											echo $this->Html->link(
											    '編集',
											    array('controller' => 'news', 'action' => 'edit', $new['News']['id'])
											);
										?>
									</td>
									<!-- <td class=" ">
										<?php 
											/* echo $this->Html->link(
											    'Delete',
											    array('controller' => 'news', 'action' => 'delete', $new['News']['id']),
											    array(),
											    "Are you sure you wish to delete this news?" 
											);*/
										?>
									</td> -->
								</tr>
							<?php $i++; endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-5 col-sm-12">
						<div class="dataTables_info" id="sample_editable_1_info">
							<?php
								echo $this->Paginator->counter(array(
											'format' => __('Page {:page} of {:pages}')
							));?>
						</div>
					</div>
					<div class="col-md-7 col-sm-12">
						<div class="dataTables_paginate paging_bootstrap">
							<ul class="pagination" style="visibility: visible;">
								<?php
									echo $this->Paginator->numbers(array('separator' => ''));
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
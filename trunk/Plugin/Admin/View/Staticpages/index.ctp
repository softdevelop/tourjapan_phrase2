<form action="/admin/staticpages" method="post">
	<div class="table-scrollable">
		<table class="table table-striped table-bordered table-hover dataTable" id="datatable_orders" aria-describedby="datatable_orders_info">
			<thead>
				<tr role="row" class="heading">
					<th width="5%" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="Order&amp;nbsp;#: activate to sort column ascending">
						フィルター
					</th>
					<th width="10%" class="sorting" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
						 Actions
					: activate to sort column ascending">
					
					</th>
				</tr>
				<tr role="row" class="filter">
					<td rowspan="1" colspan="1">
						<input type="checkbox" class="form-control form-filter input-sm" name="data[status][]" value="0"> 非公開 <br/>
						<input type="checkbox" class="form-control form-filter input-sm" name="data[status][]" value="1"> 公開 <br/>
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
					<?php echo __('静的ページ一覧');?>
				</div>
			
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">
						<?php 
							echo $this->Html->link(
							    '新規追加',
							    array('controller' => 'Staticpages', 'action' => 'add'),
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
									 <?php echo __('作成日/修正日');?>
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
								foreach ( $staticpage  as $item ) :
							?>
								<tr class="<?php if ( $i % 2 != 0 ): ?> odd <?php else: ?> even <?php endif;?>">
									<td class="sorting_1">
										<?php echo $item['Staticpage']['id'];?>
									</td>
									<td class=" ">
										<?php echo $item['Staticpage']['title'];?>
									</td>
									<td class=" ">
										<?php echo $item['Staticpage']['created_date'] . ' / ' . $item['Staticpage']['modified_date']; ?>
									</td>
									<td class=" ">
										<?php 
											switch ($item['Staticpage']['status']) {
												case '1':
													# code...
													echo '公開';
													break;
												case '0':
													# code...
													echo '非公開';
													break;	
											}
										?>
									</td>
									<td class=" ">
										<?php 
											echo $this->Html->link(
											    '編集',
											    array('controller' => 'Staticpages', 'action' => 'edit', $item['Staticpage']['id'])
											);
										?>
									</td>
									<!-- <td class=" ">
										<?php 
											/* echo $this->Html->link(
											    'Delete',
											    array('controller' => 'Staticpages', 'action' => 'delete', $item['Staticpage']['id']),
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
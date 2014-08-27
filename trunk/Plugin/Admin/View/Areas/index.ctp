<form action="/admin/areas" method="post">
	<div class="table-scrollable">
		<table class="table table-striped table-bordered table-hover dataTable" id="datatable_orders" aria-describedby="datatable_orders_info">
			<thead>
				<tr role="row" class="heading">
					<th width="50%" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="Order&amp;nbsp;#: activate to sort column ascending">
						都道府県
					</th>
					
					<th width="50%" class="sorting" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
						 Actions
					: activate to sort column ascending">
						
					</th>
				</tr>
				
			<td rowspan="1" colspan="1">
						<?php 
							echo $this->Form->input('p_id', array(
									'label' => false,
									'options' => $prefectures, 
									'class'   => 'form-control',
									'empty'   => '都道府県を選択'
								));
						?>
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
					<?php echo __('エリア一覧');?>
				</div>
			
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group" style="float: right; margin-bottom: 10px;">
						<?php 
							echo $this->Html->link(
							    '新規追加',
							    array('controller' => 'areas', 'action' => 'add'),
							    array('class' => 'btn green')
							);

						?>
					</div>
					
				</div>
				<div id="sample_editable_1_wrapper" class="dataTables_wrapper" role="grid">
					<div class="table-scrollable">
						<table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info" width="100%">
						<thead >
							<tr role="row">
								<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="
									 ID" width="10%">
									<?php echo __('ID');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" width="30%">
									 <?php echo __('エリア名');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" width="15%">
									 <?php echo __('都道府県');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" width="15%">
									<?php echo __('順番');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" width="15%">
									<?php echo __('状態');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" width="15%">
									 <?php echo __('編集');?>
								</th>
								<!-- <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 129px;">
									<?php // echo __('Delete');?>
								</th> -->
							</tr>
						</thead>
						
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<?php
								$i = 1;
								foreach ( $areas  as $area ) :
							?>
								<tr class="<?php if ( $i % 2 != 0 ): ?> odd <?php else: ?> even <?php endif;?>">
									<td class="sorting_1">
										<?php echo $area['Area']['id'];?>
									</td>
									<td class=" ">
										<?php echo $area['Area']['name'];?>
									</td>
									<td class=" ">
										<?php echo $area['Prefecture']['name'];?>
									</td>
									<td class=" ">
										<?php echo $area['Area']['order'];?>
									</td>
									<td class="center ">
										<?php if ($area['Area']['is_visibility']) :
												 echo __('有効'); 
											 else : 
											 	echo __('無効');
										 	endif;?>
									</td>
									<td class=" ">
										<?php 
											echo $this->Html->link(
											    '編集',
											    array('controller' => 'areas', 'action' => 'edit', $area['Area']['id'])
											);
										?>
									</td>
									<!-- <td class=" ">
										<?php 
											// echo $this->Html->link(
											//     'Delete',
											//     array('controller' => 'areas', 'action' => 'delete', $area['Area']['id']),
											//     array(),
											//     "Are you sure you wish to delete this recipe?"
											// );
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
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-edit"></i>
					<?php echo __('ジャンル一覧');?>
		</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group" style="float: right;margin-bottom: 10px;">
						<?php 
							echo $this->Html->link(
							    '新規追加',
							    array('controller' => 'categories', 'action' => 'add'),
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
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 228px;">
									 <?php echo __('ジャンル名');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 127px;">
									<?php echo __('順番');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 156px;">
									<?php echo __('状態');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 90px;">
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
								foreach ( $categories  as $categorie ) :
							?>
								<tr class="<?php if ( $i % 2 != 0 ): ?> odd <?php else: ?> even <?php endif;?>">
									<td class="sorting_1">
										<?php echo $categorie['Category']['id'];?>
									</td>
									<td class=" ">
										<?php echo $categorie['Category']['name'];?>
									</td>
									<td class=" ">
										<?php echo $categorie['Category']['order'];?>
									</td>
									<td class="center ">
										<?php if ($categorie['Category']['is_visibility']) :
												 echo __('有効'); 
											 else : 
											 	echo __('無効');
										 	endif;?>
									</td>
									<td class=" ">
										<?php 
											echo $this->Html->link(
											    '編集',
											    array('controller' => 'categories', 'action' => 'edit', $categorie['Category']['id'])
											);
										?>
									</td>
									<!-- <td class=" ">
										<?php 
											// echo $this->Html->link(
											//     'Delete',
											//     array('controller' => 'categories', 'action' => 'delete', $categorie['Category']['id']),
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
									echo $this->Paginator->numbers(array('separator' => '　|　'));
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
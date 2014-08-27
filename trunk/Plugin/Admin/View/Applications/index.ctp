<form action="/admin/applications" method="post">
	<div class="table-scrollable">
		<table class="table table-striped table-bordered table-hover dataTable" id="datatable_orders" aria-describedby="datatable_orders_info">
			<thead>
				<tr role="row" class="heading">
					<th width="5%" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="Order&amp;nbsp;#: activate to sort column ascending">
						日付
					</th>
					<th width="5%" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="Order&amp;nbsp;#: activate to sort column ascending">
						名前 
					</th>
					<th width="5%" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="Order&amp;nbsp;#: activate to sort column ascending">
						メールアドレス
					</th>
					<th width="10%" class="sorting" role="columnheader" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
						 Actions
					: activate to sort column ascending">
						
					</th>
				</tr>
				<tr role="row" class="filter">
					<td rowspan="1" colspan="1">
						<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
							<input type="text" class="form-control form-filter input-sm" readonly="" name="data[date_s]" placeholder="From">
							<span class="input-group-btn">
							<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
							</span>
						</div>
						<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
							<input type="text" class="form-control form-filter input-sm" readonly="" name="data[date_e]" placeholder="To">
							<span class="input-group-btn">
							<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
							</span>
						</div>
					</td>
					<td rowspan="1" colspan="1">
						<input type="text" class="form-control form-filter input-sm" name="data[name]">
					</td>
					<td rowspan="1" colspan="1">
						<input type="text" class="form-control form-filter input-sm" name="data[email]">
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
					<?php echo __('申し込み一覧');?>
				</div>
			
			</div>
			<div class="portlet-body">
				</div>
				<div id="sample_editable_1_wrapper" class="dataTables_wrapper" role="grid">
					<div class="table-scrollable">
						<table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info">
						<thead>
							<tr role="row">
								<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="
									 ID" style="width: 69px;">
									<?php echo __('ID');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 100px;">
									 <?php echo __('申込日');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">
									 <?php echo __('種別');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 188px;">
									 <?php echo __('氏名');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 228px;">
									 <?php echo __('メールアドレス');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 280px;">
									 <?php echo __('ツアー名');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 260px;">
									 <?php echo __('主催者名');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 70px;">
									 <?php echo __('都道府県');?>
								</th>
							
								<!-- <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php // echo __('');?>
								</th> -->
							</tr>
						</thead>
						
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<?php
								$i = 1;
								foreach ( $applications  as $application ) :
							?>
								<tr class="<?php if ( $i % 2 != 0 ): ?> odd <?php else: ?> even <?php endif;?>">
									<td class="sorting_1">
									
										<a href="/admin/applications/view/<?php echo $application['Application']['id'] ?>">
											<?php echo $application['Application']['id'];?>
										</a>
									</td>
									<td class=" ">
										<?php $timestamp = strtotime($application['Application']['created_date']); echo date('Y/m/d',$timestamp); ?>
									</td>
									<td class=" ">
										<?php if($application['Application']['type'] == "0"){echo "申込み";}else{echo "お問合せ";}?>
									</td>
									<td class=" ">
										<?php echo $application['Application']['name'];?>
									</td>
									<td class=" ">
										<?php echo $application['Application']['email']; ?>
									</td>
									<td class=" ">
										<?php echo $application['TourPackage']['tour_name']; ?>
									</td>
									<td class=" ">
										<?php echo $application['TourPackage']['Sponsor']['sponsor_name']; ?>
									</td>
									<td class=" ">
										<?php
											$pref = $this->requestAction('/admin/applications/getNamePref/' . $application['Application']['pref']);
											
											echo $pref['Prefecture']['name']; 
										?>
									</td>
									
									<!-- <td class="">
										<?php 
											// echo $this->Html->link(
											//     'Edit',
											//     array('controller' => 'applications', 'action' => 'edit', $application['Application']['id'])
											// );
										?>
									</td> -->
									<!-- <td class=" ">
										<?php 
											// echo $this->Html->link(
											//     'Delete',
											//     array('controller' => 'applications', 'action' => 'delete', $application['Application']['id']),
											//     array(),
											//     "Are you sure you wish to delete this tour application?"
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
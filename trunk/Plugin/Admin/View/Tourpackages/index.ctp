<div class="row">
	<div class="col-md-12">
        <?php if(!empty($tourPackages)){ ?>
		      <?php echo "Sponsor Name : " . $tourPackages[0]['Sponsor']['sponsor_name'] . "<br/>"; echo "Sponsor ID : " . $tourPackages[0]['Sponsor']['id'];
        }?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-edit"></i>
					<?php echo __('ツアー　一覧');?>
				</div>
		
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group" style="float: right; margin-bottom: 10px;">
						<?php 
							echo $this->Html->link(
							    '新規ツアー追加',
							    array('controller' => 'tourpackages', 'action' => 'add'),
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
									 <?php echo __('Tour Name');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 228px;">
									 <?php echo __('Schedule to display');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php echo __('Status');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php echo __('');?>
								</th>
								<!-- <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php //echo __('');?>
								</th> -->
							</tr>
						</thead>
						
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<?php
								$i = 1;
								foreach ( $tourPackages  as $tourPackage ) :
							?>
								<tr class="<?php if ( $i % 2 != 0 ): ?> odd <?php else: ?> even <?php endif;?>">
									<td class="sorting_1">
										<?php echo $tourPackage['TourPackage']['id'];?>
									</td>
									<td class=" ">
										<?php echo $tourPackage['TourPackage']['tour_name'];?>
									</td>
									<td class=" ">
										<?php echo $tourPackage['TourPackage']['schedule_start'] . ' / ' . $tourPackage['TourPackage']['schedule_end'];?>
									</td>
									<td class=" ">
										<?php 
											switch ($tourPackage['TourPackage']['status']) {
												case '1':
													# code...
													echo 'Open';
													break;
												case '0':
													# code...
													echo 'Hide';
													break;
									
											}
										?>
									</td>
									<td class=" ">
										<?php 
											echo $this->Html->link(
											    'Edit',
											    array('controller' => 'tourpackages', 'action' => 'edit', $tourPackage['TourPackage']['id'],'?'=>array('id' => $tourPackage['TourPackage']['id']))
											);
										?>
									</td>
									<!-- <td class=" ">
										<?php 
											 echo $this->Html->link(
											    'Delete',
											    array('controller' => 'tourpackages', 'action' => 'delete', $tourPackage['TourPackage']['id']),
											    array(),
											    "Are you sure you wish to delete this tour package?"
											);
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
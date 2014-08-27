<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-edit"></i>
					<?php echo __('お問い合わせ履歴');?>
				</div>
			
			</div>
			<div class="portlet-body">
				<div class="table-toolbar" style="float:right;">

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
									 <?php echo __('氏名');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 228px;">
									 <?php echo __('メールアドレス');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php echo __('電話番号');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php echo __('内容');?>
								</th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php echo __('お問い合わせ日時');?>
								</th>
								<!-- <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 90px;">
									 <?php // echo __('');?>
								</th> -->
							</tr>
						</thead>
						
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<?php
								$i = 1;
								foreach ( $contacts  as $contact ) :
							?>
								<tr class="<?php if ( $i % 2 != 0 ): ?> odd <?php else: ?> even <?php endif;?>">
									<td class="sorting_1">
										<a href="/admin/contacts/view/<?php echo $contact['Contact']['id'] ?>">
											<?php echo $contact['Contact']['id'];?>
										</a>
									</td>
									<td class=" ">
										<?php echo $contact['Contact']['name'];?>
									</td>
									<td class=" ">
										<?php echo $contact['Contact']['email']; ?>
									</td>
									<td class=" ">
										<?php echo $contact['Contact']['phone']; ?>
									</td>
									<td class=" ">
										<?php echo $contact['Contact']['content']; ?>
									</td>
									<td class="">
										<?php echo $contact['Contact']['created_date'];?>
									</td>
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
<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('予約詳細') ?>
		</div>
	
	</div>
	<td class=" ">
									
									</td>
	<div class="portlet-body form">
		<div class="form-body">
			
			<div class="form-body">
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('種別');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
								<?php if($application['Application']['type'] == "0"){echo "申込み";}else{echo "お問合せ";}?>
						</div>
					</div>
				</div>
					<div class="form-body">
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('申込日');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
								<?php $timestamp = strtotime($application['Application']['created_date']); echo date('Y年m月d日',$timestamp); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('氏名');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $application['Application']['name'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('メールアドレス');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $application['Application']['email'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('電話番号');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $application['Application']['phone_number'];?>
						</div>
					</div>
				</div>
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('都道府県');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php $pref = $this->requestAction('/admin/applications/getNamePref/' . $application['Application']['pref']);
											
											echo $pref['Prefecture']['name']; ?>
						</div>
					</div>
				</div>
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('年齢');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $application['Application']['age'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('利用希望日');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $application['Application']['applied_date'];?>
						</div>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('参加予定人数');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							大人：<?php echo $application['Application']['number_of_applicants'];?> 子供：<?php echo $application['Application']['number_kids'];?>
						</div>
					</div>
				</div>
				
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('内容');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $application['Application']['content'];?>
						</div>
					</div>
				</div>
			
				
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
<style>
	.form-group {
		margin-bottom: 15px;
		display: inline-block;
		width: 100%;
	}
</style>
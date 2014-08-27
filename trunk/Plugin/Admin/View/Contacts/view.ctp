<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('詳細確認') ?>
		</div>
	
	</div>
	<div class="portlet-body form">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('氏名');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contact['Contact']['name'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('所属');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contact['Contact']['belongto'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('メールアドレス');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contact['Contact']['email'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('電話番号');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contact['Contact']['phone'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('内容');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contact['Contact']['content'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('Created');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contact['Contact']['created_date'];?>
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
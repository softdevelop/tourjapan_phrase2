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
					<label class="col-md-3 control-label"><?php echo __('会社名');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contactpartner['Contactpartner']['companyname'];?>
						</div>
					</div>
				</div>
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('部署');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contactpartner['Contactpartner']['division'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('氏名');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contactpartner['Contactpartner']['name'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('メールアドレス');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contactpartner['Contactpartner']['email'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('電話番号');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contactpartner['Contactpartner']['phone'];?>
						</div>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('お問い合わせ内容');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contactpartner['Contactpartner']['content'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('お問い合わせ日時');?></label>
					<div class="col-md-9">
						<div style="width:100%;">
							<?php echo $contactpartner['Contactpartner']['created_date'];?>
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
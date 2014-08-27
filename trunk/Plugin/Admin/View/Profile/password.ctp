<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('パスワード変更') ?>
		</div>
	
	</div>
	<div class="portlet-body form">
		<?php echo $this->Form->create('User', array(
							'id' => 'new-add', 
							'class' => 'form-horizontal', 
							'novalidate' => 'novalidate', 
						));?>
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">現在のパスワード</label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('oldpassword', array(
									'type' => 'password',
									'placeholder' => '現在のパスワード',
									'name' => "oldpassword", 
									'label' => false,
									'div' => '', 
									'class' => 'form-control')) 
						?>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('新しいパスワード');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('password', array(
									'placeholder' => '新しいパスワード',
									'name' => "password", 
									'label' => false,
									'div' => '', 
									'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('新しいパスワード(確認)');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('repassword', array(
									'type' => 'password',
									'name' => "repassword", 
									'placeholder' => '新しいパスワード（確認）', 
									'label' => false,
									'div' => '', 
									'class' => 'form-control')) 
						?>
					</div>
				</div>
			</div>
			<div class="form-actions right1">
				<button type="button" class="btn default" onclick="parent.location='../tourpackages'">戻る</button>
				<button type="submit" class="btn green">更新</button>
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('Change password') ?>
		</div>
		<div class="tools">
			<a href="#" class="collapse">
			</a>
			<a href="#portlet-config" data-toggle="modal" class="config">
			</a>
			<a href="#" class="reload">
			</a>
			<a href="#" class="remove">
			</a>
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
					<label class="col-md-3 control-label">Old password</label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('oldpassword', array(
									'type' => 'password',
									'placeholder' => 'Old password',
									'name' => "oldpassword", 
									'label' => false,
									'div' => '', 
									'class' => 'form-control')) 
						?>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('New password');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('password', array(
									'placeholder' => 'Password',
									'name' => "password", 
									'label' => false,
									'div' => '', 
									'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('Confirm new password');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('repassword', array(
									'type' => 'password',
									'name' => "repassword", 
									'placeholder' => 'Re-password', 
									'label' => false,
									'div' => '', 
									'class' => 'form-control')) 
						?>
					</div>
				</div>
			</div>
			<div class="form-actions right1">
				<button type="button" class="btn default" onclick="parent.location='index'">Cancel</button>
				<button type="submit" class="btn green">Submit</button>
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
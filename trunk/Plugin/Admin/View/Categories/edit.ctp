<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('Edit Category') ?>
		</div>
	</div>
	<div class="portlet-body form">
		<?php echo $this->Form->create('Category', array(
							'id' => 'signup-form_id', 
							'class' => 'form-horizontal', 
							'novalidate' => 'novalidate', 
						));?>
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('ジャンル名');?></label>
					<div class="col-md-9">
						<?php echo $this->Form->input('name', array(
						'placeholder' => 'Name', 
						'label' => false,
						'div' => '', 
						'class' => 'form-control')) ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('順番');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('order', array(
							'placeholder' => 'Order', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('状態'); ?></label>
					<div class="col-md-9">
						<?php $optionsVisibility = array('0' => '無効', '1' => '有効');?>

						<?php 
							echo $this->Form->input('is_visibility', array(
									'label' => false,
									'options' => $optionsVisibility, 
									'class'   => 'form-control'
								));

						?>
						
					</div>
				</div>
			</div>
			<div class="form-actions right1">
				<button type="button" class="btn default" onclick="parent.location='../index'">キャンセル</button>
				<button type="submit" class="btn green">更新</button>
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
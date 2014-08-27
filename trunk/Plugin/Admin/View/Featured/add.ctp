<?php $this->Html->addCrumb('Featured', '/admin/featured');?>
<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('注目ツアー追加') ?>
		</div>
		
	</div>
	<div class="portlet-body form">
		<?php echo $this->Form->create('Featured', array(
							'id' => 'featured-add', 
							'class' => 'form-horizontal', 
							'novalidate' => 'novalidate', 
						));?>
			<div class="form-body">
				
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('ツアー');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('tour_package_id', array(
									'label' => false,
									'options' => $tourPackages, 
									'default' => '1',
									'class'   => 'form-control'
								));
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('状態'); ?></label>
					<div class="col-md-9">
						<?php $optionsVisibility = array('0' => '非公開', '1' => '公開');?>

						<?php 
							echo $this->Form->input('is_visibility', array(
									'label' => false,
									'options' => $optionsVisibility, 
									'default' => '1',
									'class'   => 'form-control'
								));

						?>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('順番');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('order', array(
							'placeholder' => '順番', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
			</div>
			<div class="form-actions right1">
				<button type="button" class="btn default" onclick="parent.location='index'">キャンセル</button>
				<button type="submit" class="btn green">登録</button>
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('ニュース追加') ?>
		</div>
	
	</div>
	<div class="portlet-body form">
		<?php echo $this->Form->create('News', array(
							'id' => 'new-add', 
							'class' => 'form-horizontal', 
							'novalidate' => 'novalidate', 
						));?>
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('タイトル');?></label>
					<div class="col-md-9">
						<?php echo $this->Form->input('title', array(
						'placeholder' => 'Title', 
						'label' => false,
						'div' => '', 
						'class' => 'form-control')) ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('内容');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('content', array(
							'placeholder' => 'Content', 
							'label' => false,
							'div' => '', 
							'class' => 'ckeditor　form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('表示開始');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('schedule_start', array(
										'dateFormat' => 'YMD',
										'placeholder' => 'Schedule start', 
										'label' => false,
										'div' => '', 
										'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('表示終了');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('schedule_end', array(
								'dateFormat' => 'YMD',
								'placeholder' => 'Schedule end', 
								'label' => false,
								'div' => '', 
								'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('状態'); ?></label>
					<div class="col-md-9">
						<?php $optionsStatus = array(
								'0' => 'Hide', 
								'1' => 'Active', 
								'2' => 'Expired', 
								'3' => 'Reserved'
							);?>

						<?php 
							echo $this->Form->input('status', array(
									'label' => false,
									'options' => $optionsStatus, 
									'default' => '1',
									'class'   => 'form-control'
								));

						?>
						
					</div>
				</div>
			</div>
			<div class="form-actions right1">
				<button type="button" class="btn default" onclick="parent.location='index'">キャンセル</button>
				<button type="submit" class="btn green">追加</button>
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
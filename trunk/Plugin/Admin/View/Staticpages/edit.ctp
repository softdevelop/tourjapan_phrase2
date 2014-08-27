<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('静的ページ編集') ?>
		</div>
	
	</div>
	<div class="portlet-body form">
		<?php echo $this->Form->create('Staticpage', array(
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
					<label class="col-md-3 control-label"><?php echo __('スラッグ（URL名）');?></label>
					<div class="col-md-9">
						<?php echo $this->Form->input('slug', array(
						'placeholder' => 'Slug', 
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
							'class' => 'ckeditor form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('状態'); ?></label>
					<div class="col-md-9">
						<?php $optionsStatus = array(
								'0' => '非公開', 
								'1' => '公開'
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
				<button type="button" class="btn default" onclick="parent.location='../index'">キャンセル</button>
				<button type="submit" class="btn green">更新</button>
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
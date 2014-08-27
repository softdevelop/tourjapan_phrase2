<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('Add new sponsor') ?>
		</div>
	
	</div>
	<div class="portlet-body form">
		<?php echo $this->Form->create('Sponsor', array(
							'id' => 'signup-form_id', 
							'class' => 'form-horizontal', 
							'novalidate' => 'novalidate', 
						));?>
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('主催者名');?></label>
					<div class="col-md-9">
						<?php echo $this->Form->input('sponsor_name', array(
						'placeholder' => 'Name', 
						'label' => false,
						'div' => '', 
						'class' => 'form-control')) ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('都道府県');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('prefecture_id', array(
									'label' => false,
									'options' => $prefectures, 
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
							echo $this->Form->input('is_active', array(
									'label' => false,
									'options' => $optionsVisibility, 
									'default' => '1',
									'class'   => 'form-control'
								));

						?>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('ユーザーネーム');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('user_id', array(
									'label' => false,
									'options' => $users, 
									'default' => '1',
									'class'   => 'form-control'
								));
						?>
					</div>
				</div>
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('郵便番号');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('postal_code', array(
							'placeholder' => '郵便番号', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('住所');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('address', array(
							'placeholder' => 'Address', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('電話番号');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('phone_number', array(
							'placeholder' => 'Phone Number', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('メールアドレス');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('email', array(
							'placeholder' => 'Email Address', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('URL');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('url', array(
							'placeholder' => 'Url', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('営業時間');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('business_hour', array(
							'placeholder' => 'Business Hours', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('祝日');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('holiday', array(
							'placeholder' => 'Holiday', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('旅行代理店');?></label>
					<div class="col-md-9">
						<?php 
                                $options = array('0' => '無', '1' => '有');
                                $attributes = array('legend' => false);
                                echo $this->Form->radio('agency_flag', $options, $attributes);

						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('旅行業登録番号');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('license_number_1', array(
							'placeholder' => '旅行業登録番号', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('旅行業取扱管理者');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('license_number_2', array(
							'placeholder' => '旅行業取扱管理者', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('担当者');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('person_in_charge', array(
							'placeholder' => '担当者', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('管理用電話番号');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('phone_for_admin', array(
							'placeholder' => 'Phone number for admin', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('管理用メールアドレス');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('email_for_admin', array(
							'placeholder' => 'Email address for admin', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('Reply for admin');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('reply_for_admin', array(
							'placeholder' => 'Reply for admin', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('備考');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('remark_for_admin', array(
							'placeholder' => 'Remark for admin', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
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
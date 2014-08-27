<div class="portlet box purple ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>
			<?php echo __('ツアー新規追加') ?>
			
			
		</div>
		
		</div>
		
	</div>
	<?php if(isset($err)){ ?>
	<div class='err'><?php echo $err?></div>
	<?php } ?>
	<div class="portlet-body form">
		<?php echo $this->Form->create('TourPackage', array(
							'id'         => 'tour', 
							'class'      => 'form-horizontal', 
							'novalidate' => 'novalidate',
							'enctype'    => "multipart/form-data"
						));?>
			<div class="form-body">
				<div class="form-group">	
		
					<label class="col-md-3 control-label"><?php echo __('主催者');?></label>
					<div class="col-md-9">
						<select id="prf" class="form-control">
							<option>都道府県絞り込み</option>
								<?php 
								foreach ($prefectures as $key => $prefecture) {
									echo "<option value='".$key."'>".$prefecture."</option>";
								}
							
						?>
						</select>
						
						<select name='data[TourPackage][sponsor_id]' id='spnsr' class='form-control'>
						<option value="0" selected="">▼主催者</option>
						<?php foreach ($sponsors as $key => $sponsor) {
							echo "<option value='".$key."'>".$sponsor."</option>";
							
						}
						?>
						</select>
						<?php echo $this->Form->error('TourPackage.sponsor_id'); ?>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('ツアー名');?></label>
					<div class="col-md-9">
						<?php echo $this->Form->input('tour_name', array(
						'placeholder' => 'ツアー名', 
						'label' => false,
						'div' => '', 
						'class' => 'form-control')) ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('ジャンル');?></label>
					<div class="col-md-9">
						<select multiple name="data[category][]">
							<?php
								$selected = false; 
								foreach ($categories as $key => $category) 
								{
							?>
								<option <?php if (!$selected) : echo 'selected'; $selected = true; endif;?> value="<?php echo $key?>"><?php echo $category?></option>
							<?php									
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('エリア');?></label>
					<div class="col-md-9">
						<select id="pref" class="form-control">
													<option>都道府県絞り込み</option>
	
								<?php 
								foreach ($prefectures as $key => $prefecture) {
									echo "<option value='".$key."'>".$prefecture."</option>";
								}
							
						?>
						</select>
						
						<select name='data[TourPackage][area_id]' id='area' class='form-control'>
						<option value="0" selected="">▼エリア</option>
						<?php foreach ($areas as $key => $area) {
							echo "<option value='".$key."'>".$area."</option>";
							
						}
						?>
						</select>
						<?php echo $this->Form->error('TourPackage.area_id'); ?>
					</div>
				</div>
		
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('ツアーサブタイトル');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('title', array(
							'placeholder' => 'サブタイトル', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('催行場所');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('place', array(
							'placeholder' => '催行場所', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				
				  <div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('催行場所(googlemap用）');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('address_google', array(
							'placeholder' => '催行場所(googlemap用）', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('本文');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('content', array(
							'placeholder' => '本文', 
							'label' => false,
							'div' => '', 
							'class' => 'ckeditor form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('ツアー内容');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('short_description', array(
							'placeholder' => '内容', 
							'label' => false,
							'div' => '', 
							'class' => 'ckeditor form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('最少催行人数');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('min_passenger', array(
							'placeholder' => '最少催行人数', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('最少催行人数備考');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('remarks_min', array(
							'placeholder' => '最少催行人数備考', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('定員');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('max_passenger', array(
							'placeholder' => '定員', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				
					
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('定員備考');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('remarks_max', array(
							'placeholder' => '定員備考', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('対象年齢');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('target_age', array(
							'placeholder' => '対象年齢', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>



				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('催行日');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('open_date', array(
							'placeholder' => '催行日', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('大人料金');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('fee_adult', array(
							'placeholder' => '大人料金', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('子供料金');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('fee_child', array(
							'placeholder' => '子供料金', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('料金に含まれるもの');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('includings', array(
							'placeholder' => '料金に含まれるもの', 
							'label' => false,
							'div' => '', 
							'class' => 'ckeditor form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('集合場所');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('meeting_place', array(
							'placeholder' => '集合場所', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				
						
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('集合時間');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('meeting_time', array(
							'placeholder' => '集合時間', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('所要時間');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('estimate_time', array(
							'placeholder' => '所要時間', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('申し込みURL');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('application_url', array(
							'placeholder' => 'Application Url', 
							'label' => false,
							'div' => '', 
							'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('予約開始日');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('reservation_start', array(
								'dateFormat' => 'YMD',
								'placeholder' => 'Date to start reservation', 
								'label' => false,
								'div' => '', 
								'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('予約締切日');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('reservation_end', array(
								'dateFormat' => 'YMD',
								'placeholder' => 'Date to close reservation', 
								'label' => false,
								'div' => '', 
								'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('公開日');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('schedule_start', array(
								'dateFormat' => 'YMD',
								'placeholder' => 'schedule start', 
								'label' => false,
								'div' => '', 
								'class' => 'form-control')) 
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('公開終了日');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('schedule_end', array(
								'dateFormat' => 'YMD',
								'placeholder' => '公開終了日', 
								'label' => false,
								'div' => '', 
								'class' => 'form-control')) 
						?>
					</div>
				</div>
           
                <div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('その他');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('remark', array(
							'placeholder' => 'その他', 
							'label' => false,
							'div' => '', 
							'class' => 'ckeditor　form-control')) 
						?>
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('料金備考');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('remark_for_fee', array(
							'placeholder' => '料金備考', 
							'label' => false,
							'div' => '', 
							'class' => 'ckeditor　form-control')) 
						?>
					</div>
				</div>
                
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('状態');?></label>
					<div class="col-md-9">
						<?php 
							$status = array(
									'0' => '非公開',
									'1' => '公開'
								);
							echo $this->Form->input('status', array(
									'label' => false,
									'options' => $status, 
									'default' => '1',
									'class'   => 'form-control'
								));
						?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('注目ツアー');?></label>
					<div class="col-md-9">
						<?php 
							$is_featured = array(
									'0' => 'No',
									'1' => 'Yes',
								);
							echo $this->Form->input('is_featured', array(
									'label' => false,
									'options' => $is_featured, 
									'default' => '0',
									'class'   => 'form-control'
								));
						?>
					</div>
				</div>

				<div class="form-group" id="fileupload">
					<label class="col-md-3 control-label"><?php echo __('画像アップロード');?></label>
					<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					<div class="row fileupload-buttonbar">
                        <div class="col-lg-7">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-success fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>ファイル追加</span>
                                <input type="file" name="files[]" multiple>
                            </span>
                            <button type="submit" class="btn btn-primary start">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>アップロード開始</span>
                            </button>
                            <button type="reset" class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>キャンセル</span>
                            </button>
                            <button type="button" class="btn btn-danger delete">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>消去</span>
                            </button>
                            <input type="checkbox" class="toggle">
                            <!-- The global file processing state -->
                            <span class="fileupload-process"></span>
                        </div>
                        <!-- The global progress state -->
                        <div class="col-lg-5 col-md-offset-3 ml fileupload-progress fade">
                            <!-- The global progress bar -->
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                            </div>
                            <!-- The extended global progress state -->
                            <div class="progress-extended">&nbsp;</div>
                        </div>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
			</div>
                <script id="template-upload" type="text/x-tmpl">
                    {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-upload fade">
                            <td>
                                <span class="preview"></span>
                            </td>
                            <td class="col-md-8">
                                <p class="name">{%=file.name%}</p>
                                <strong class="error text-danger"></strong>
                            </td>
                            <td class="col-md-2">
                                <p class="size">処理中...</p>
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                            </td>
                            <td class="col-md-2">
                                {% if (!i && !o.options.autoUpload) { %}
                                    <button class="btn btn-primary start bing" disabled>
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>開始</span>
                                    </button>
                                {% } %}
                                {% if (!i) { %}
                                    <button class="btn btn-warning cancel bing">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>キャンセル</span>
                                    </button>
                                {% } %}
                            </td>
                        </tr>
                    {% } %}
                    </script>
                    <!-- The template to display files available for download -->
                    <script id="template-download" type="text/x-tmpl">
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-download fade">
                                <td>
                                    <span class="preview">
                                        {% if (file.thumbnailUrl) { %}
                                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                                        {% } %}
                                    </span>
                                </td>
                                <td class="col-md-8">
                                    <p class="name">
                                        {% if (file.url) { %}
                                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                                        {% } else { %}
                                            <span>{%=file.name%}</span>
                                        {% } %}
                                    </p>
                                    {% if (file.error) { %}
                                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                                    {% } %}
                                </td>
                                <td class="col-md-2">
                                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                                </td>
                                <td>
                                    {% if (file.deleteUrl) { %}
                                        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                            <i class="glyphicon glyphicon-trash"></i>
                                            <span>消去</span>
                                        </button>
                                    {% } else { %}
                                        <button class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>キャンセル</span>
                                        </button>
                                    {% } %}
                                </td>
                            </tr>
                        {% } %}
                        </script>
			</div>
			
			   <div class="form-group">
					<label class="col-md-3 control-label"><?php echo __('PDF');?></label>
					<div class="col-md-9">
						<?php 
							echo $this->Form->input('pdf', array(
							'label' => false,
							'type' => 'file',
							'div' => '', 
 							'class' => 'form-control')) 
						?>
					</div>
				</div>
				
			
			
			
			<div class="form-actions right1">
				<?php echo $this->Form->submit('プレビュー', array(
    'div'=>false,
    'onclick'=>"this.form.target='_blank';return true;",
    'class' => 'btn',
    'name' => 'preview')); ?>

				<button type="button" class="btn default" onclick="parent.location='index'">キャンセル</button>
				<button type="submit" class="btn green" name="submit">追加</button>
			</div>
		<?php echo $this->Form->end();?>
	</div>
</div>



	<div id="main">
	<article id="toplist">
	<?php if($is_active == "0"){?>
    <h1 class="error">お探しのツアーは現在お申込みを受け付けておりません</h1>
<?php }else{ ?>

        <div id="breadcrumb">
	               <?php echo $this->Html->getCrumbs(' > ', 'TOP'); ?>&nbsp;&gt;&nbsp;お申込・お問い合わせフォーム 
        </div>
        <div class="title-form">
            <div class="title-apply">
            	<ul>
            		<li>※本ページ「お申込み・お問い合わせ」にご登録いただいた情報は、ツアー・プログラムの主催者および当社へ送信されます。</li>
<li>※本ページの情報登録および送信完了を持って、ご予約が完了するものではございませんので、主催者からの回答をご確認ください。</li>
<li>※ご登録情報送信後、数日経って主催者からの連絡がない場合には、直接お電話いただくか、当社（株式会社エフネス）までご連絡ください。</li>
<li>※催行日が迫っているお申込みに関しては、主催者に直接お電話ください。</li>
<li>※本ページに登録された個人情報の取扱に関しては、主催者の個人情報保護方針および当社の<a href="http://www.f-ness.com/privacy/" target="_blank">プライバシーポリシー</a>にしたがって取扱を行います。</li>
<br />
            	</ul>
            	
            </div>
            <?php if(isset($flag)){?>
                <div class="flag clearfx"><?php if($flag == true){echo "<p class='big cnt'>ご登録情報を主催者へ送信いたしました。</p>
<p class='cnt'>数日経って主催者から返信がない場合には、直接お電話いただくか、<br />当社までご連絡ください。
ご利用ありがとうございました。</p>";} else{ echo "<p class='cnt'>記載内容に不備がございます</p>";} ?></p></div>
            <?php }?>
        </div>
        
          <?php if($flag == false){ ?>
      
        <?php echo $this->Form->create('Application',array('novalidate' => 'novalidate'));?>
        
        
      
            <div class="form">
                <ul>
                	   <li>
                        <div class="label"><?php echo __('お問い合わせ種別');?><span class="required">*</span></div>
                        <div class="input"><?php
                     $is_featured = array(
									'0' => 'お申込み',
									'1' => 'お問合せ',
									'2' => '未選択'
								);
							echo $this->Form->input('type', array(
									'label' => false,
									'options' => $is_featured, 
									'default' => '2',
									'class'   => 'form-control'
								));   
                        
                        
                                            ?>
                        </div>
                    </li>
                    <li>
                        <div class="label"><?php echo __('氏名');?><span class="required">*</span></div>
                        <div class="input"><?php echo $this->Form->input('name',
                                                                            array(
                                                    						      'placeholder' => '氏名',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li>
                        <div class="label"><?php echo __('メールアドレス');?><span class="required">*</span></div>
                        <div class="input"><?php echo $this->Form->input('email',
                                                                            array(
                                                    						      'placeholder' => 'メールアドレス',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                          <li>
                        <div class="label"><?php echo __('電話番号');?><span class="required">*</span></div>
                        <div class="input"><?php echo $this->Form->input('phone_number',
                                                                            array(
                                                    						      'placeholder' => '電話番号',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                      <li>
                        <div class="label"><?php echo __('都道府県');?><span class="required">*</span></div>
                        <div class="input"><?php echo $this->Form->input('pref',
                                                                            array(
														'label' => false,
														'class' => 'form-control',
										        		 'type' => 'select', 
    'multiple'=> false,
    'options' => $select1,
    'empty' => '選択してください',
	        		 									'div' => '', 
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                     <li>
                        <div class="label"><?php echo __('年齢');?></div>
                        <div class="input"><?php echo $this->Form->input('age',
                                                                            array(
                                                    						      'placeholder' => '年齢',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full' 
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li>
                        <div class="label"><?php echo __('利用希望日');?></div>
                        <div class="input"><?php echo $this->Form->input('applied_date',
                                                                            array(
                                                                            'dateFormat' => 'YMD',
																			'placeholder' => '利用希望日', 
																			
														'label' => false,
														'class' => 'form-control datepicker',
										        		'type' => 'text',
	        		 									'div' => '', 
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                   
                   
                     <li>
                        <div class="label"><?php echo __('参加予定人数');?></div>
                        <div class="input">大人：<?php 
                        function selectRange($min, $max, $step=1)
	{
    for($i = $min; $i <= $max; $i += $step)
    {
        $num[$i] = $i;
    }
    return $num;
	}
      $num=selectRange(0,50);
                        
                        echo $this->Form->input('number_of_applicants',
                                                                            array(
                                                                            		'type' => "select",
                                                                            		'options' => $num,
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                                            子供：<?php echo $this->Form->input('number_kids',
                                                                           
                                                                            array(
                                                                            		'type' => "select",
                                                                            		'options' => $num,
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    
                      <li>
                        <div class="label"><?php echo __('内容');?><span class="required">*</span></div>
                        <div class="input"><?php echo $this->Form->input('content',
                                                                            array(
                                                    						      'placeholder' => '内容',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'type' => 'textarea',
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li class='memo'><span class="required">*</span>は必須</li>
              
                    <li><?php echo $this->Form->submit('',array('div'=>'submit','class'=>'bt')); ?></li>
                </ul>
            </div>		

  <?php }} ?>
      
      	</article>
</div>


<script type="text/javascript">
<!--

//-->
$(document).ready(function() {
        $('.datepicker').datepicker({
		    format: "yyyy-mm-dd",
		    todayBtn: "linked",
		    orientation: "bottom right",
		     language: 'ja',   
		     startDate: Date(),    
		    autoclose: true,
		    todayHighlight: true
        });
});
</script>
	
<div id="main">
	<article id="toplist">
        <div id="breadcrumb">
	               <?php echo $this->Html->getCrumbs(' > ', 'TOP'); ?>&gt;&nbsp;掲載希望・パートナー募集
        </div>
       <div class="contact">
          
                
                <p id="strong"> 体験プログラムを「 Mｙ Activity　-マイ・アクティビティ-」」に掲載しませんか？ </p>
                <p id="des_con">
                  まずはお気軽にお問い合わせください。下記フォームより必要事項をご記入の上、送信ボタンを押してください。<br />
                  当社より折り返しご連絡をさせていただきます。 <br /><br />
                  <span class="strong">掲載は無料です。</span>
                </p>
                
              
        </div>
        <div class="title-form">
            <?php if(isset($flag_contact)){?>
                <div class="flag"><p><?php if($flag_contact == true){echo "送信されました、追って担当者よりご連絡さし上げます。";} else{ echo "下記情報に不備がございます。";} ?></p></div>
            <?php }?>
        </div>
         <?php if($flag_contact == false){ ?>
        <?php echo $this->Form->create('Contactpartner',array('novalidate' => 'novalidate'));?>
            <div class="form">
                <ul>
                	  <li>
                        <div class="label"><?php echo __('貴社名');?><span class="required">*</span></div>
                        <div class="input"><?php echo $this->Form->input('companyname',
                                                                            array(
                                                    						      'placeholder' => '貴社名',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
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
                        <div class="label"><?php echo __('住所');?></div>
                        <div class="input"><?php echo $this->Form->input('address',
                                                                            array(
                                                    						      'placeholder' => '住所',
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
                        <div class="input"><?php echo $this->Form->input('phone',
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
                        <div class="label"><?php echo __('URL');?></div>
                        <div class="input"><?php echo $this->Form->input('url',
                                                                            array(
                                                    						      'placeholder' => 'URL',
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
                                                                                  'class'=>'full-textarea'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li class='memo'><span class="required">*</span>は必須</li>
                      <li><?php echo $this->Form->submit('',array('div'=>'submit','class'=>'bt')); ?></li>
                </ul>
            </div>		
              <?php } ?>	
	</article>
</div>
	
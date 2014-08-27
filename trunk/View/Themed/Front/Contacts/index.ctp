<div id="main">
	<article id="toplist">
        <div id="breadcrumb">
	               <?php echo $this->Html->getCrumbs(' > ', 'TOP'); ?>&gt;&nbsp;お問い合わせ
        </div>
       <div class="contact_personal">
          
                <h3>お問い合わせ</h3>
                <p>
                   当サイトへのお問い合わせは下記フォームにてお願いいたします。
                </p>
              
        </div>
        <div class="title-form">
            <?php if(isset($flag_contact)){?>
                <div class="flag_contact"><p><?php if($flag_contact == true){echo "送信されました、追って担当者よりご連絡さし上げます。";} else{ echo "下記情報に不備がございます。";} ?></p></div>
            <?php }?>
        </div>
        <?php if($flag_contact == false){ ?>
        <?php echo $this->Form->create('Contact',array('novalidate' => 'novalidate'));?>
            <div class="form">
                <ul>
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
                        <div class="label"><?php echo __('所属先');?></div>
                        <div class="input"><?php echo $this->Form->input('belongto',
                                                                            array(
                                                    						      'placeholder' => '所属先',
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
                        <div class="label"><?php echo __('電話番号');?></div>
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
                    <li class='memo'><span class="required">*</span>は必須</li>  <li><?php echo $this->Form->submit('',array('div'=>'submit','class'=>'bt')); ?></li>
                </ul>
            </div>	
            <?php } ?>	
	</article>
</div>
	
<div id="main">
	<article id="toplist">
        <div id="breadcrumb">
	               <?php echo $this->Html->getCrumbs(' > ', 'TOP'); ?>&gt;&nbsp;お問い合わせ
        </div>
       <div class="contact">
          
                <h3>お問い合わせ</h3>
                <p>
                   ぱーとなー
                </p>
              
        </div>
        <div class="title-form">
            <?php if(isset($flag)){?>
                <div class="flag"><p><?php if($flag == true){echo "送信されました、追って担当者よりご連絡さし上げます。";} else{ echo "下記情報に不備がございます。";} ?></p></div>
            <?php }?>
        </div>
        <?php echo $this->Form->create('Contact',array('novalidate' => 'novalidate'));?>
            <div class="form">
                <ul>
                    <li>
                        <div class="label"><?php echo __('氏名');?></div>
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
                        <div class="input"><?php echo $this->Form->input('name',
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
                        <div class="label"><?php echo __('メールアドレス');?></div>
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
                        <div class="label"><?php echo __('内容');?></div>
                        <div class="input"><?php echo $this->Form->textarea('content',
                                                                            array(
                                                    						      'placeholder' => '内容',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full-textarea'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li><?php echo $this->Form->submit('送信',array('div' => '','class'=>'bt submit')); ?></li>
                </ul>
            </div>		
	</article>
</div>
	
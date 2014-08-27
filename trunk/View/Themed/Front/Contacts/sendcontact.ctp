<div id="main">
	<article id="toplist">
        <div id="breadcrumb">
	               <?php echo $this->Html->getCrumbs(' > ', 'TOP'); ?>&gt;
        </div>
        <div class="map-contact">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d103695.77073776246!2d139.691706!3d35.689488!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2sus!4v1403838185301" width="940" height="600" frameborder="0" style="border:0"></iframe>
        </div>
        <div class="contact">
            <div class="contacts">
                <h3>Contact</h3>
                <p>
                    Lorem ipsum dolor sit amet, Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat consectetuer adipiscing elit.
                </p>
            </div>
            <div class="feedback">
                <h3>Feedback</h3>
                <p>
                    Lorem ipsum dolor sit amet, Ut wisi enim ad minim veniam, quis nostrud exerci. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat consectetuer
                </p>
            </div>
        </div>
        <div class="title-form">
            <div class="title-apply">お問い合わせ</div>
            <?php if(isset($flag)){?>
                <div class="flag"><p><?php if($flag == true){echo "Send contact is Successfull";} else{ echo "Can't Apply! Check again, please!!";} ?></p></div>
            <?php }?>
        </div>
        <?php echo $this->Form->create('Contact',array('novalidate' => 'novalidate'));?>
            <div class="form">
                <ul>
                    <li>
                        <div class="label"><?php echo __('Name');?></div>
                        <div class="input"><?php echo $this->Form->input('name',
                                                                            array(
                                                    						      'placeholder' => 'Name',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li>
                        <div class="label"><?php echo __('Email');?></div>
                        <div class="input"><?php echo $this->Form->input('email',
                                                                            array(
                                                    						      'placeholder' => 'Email',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li>
                        <div class="label"><?php echo __('Phone');?></div>
                        <div class="input"><?php echo $this->Form->input('phone',
                                                                            array(
                                                    						      'placeholder' => 'Number',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li>
                        <div class="label"><?php echo __('Subject');?></div>
                        <div class="input"><?php echo $this->Form->input('subject',
                                                                            array(
                                                    						      'placeholder' => 'Subject',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full' 
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li>
                        <div class="label"><?php echo __('Content');?></div>
                        <div class="input"><?php echo $this->Form->textarea('content',
                                                                            array(
                                                    						      'placeholder' => 'Content',
                                                                                  'label' => false,
                                                                                  'div' => '', 
                                                                                  'class'=>'full-textarea'
                                                                                  )
                                                                        );
                                            ?>
                        </div>
                    </li>
                    <li><?php echo $this->Form->submit('SEND',array('div' => '','class'=>'bt submit')); ?></li>
                </ul>
            </div>		
	</article>
</div>
	
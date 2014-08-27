<?php if(!isset($news)){?>
    <h1>Data is Empty</h1>
<?php }else{ ?>
    <?php
                $this->Html->addCrumb('ニュース', '#');
                $this->Html->addCrumb($news['News']['title'], array('controller' => 'news', 'action' => 'detail',$news['News']['id']));
    ?>
</div>
<div class="single-news">
    <div class="title-news">
        <a class="title-news-a"><?php echo $news['News']['title']; ?></a>
        <p class="info-news">
                        掲載日: <?php echo date("Y/m/d",strtotime($news['News']['schedule_start']));?>
                   
        </p>
        <hr class="hrline">
    </div>
    <div class="main-news"><p class="content-news"><?php echo $news['News']['content'];?></p></div>
</div>	
		 
<?php } ?>
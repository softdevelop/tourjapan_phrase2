<ul>
    <?php foreach($topnews as $item){ ?>
	   <li class="topnew"><?php echo date("Y/m/d",strtotime($item['News']['schedule_start'])); ?> <a class="topnews" href="/news/detail/<?php echo $item['News']['id'];?>"><?php echo $item['News']['title'];?></a></li>  
    <?php } ?>            
</ul>
<?php defined('IN_IA') or exit('Access Denied');?><div class="swiper-container goods-container" style="background:<?php  echo $diypage['seckill_list']['style']['bgcolor'];?>;padding-top:<?php  echo $diypage['seckill_list']['style']['margintop'];?>px;padding-bottom:<?php  echo $diypage['seckill_list']['style']['marginbottom'];?>px">
    <div class="swiper-wrapper">
        <?php  if(is_array($times)) { foreach($times as $time) { ?>
        <div class="swiper-slide goods-slide" data-timeid="<?php  echo $time['id'];?>"
             data-starttime="<?php  echo $time['starttime']-time();?>"
             data-endtime="<?php  echo $time['endtime']-time();?>" 
             data-status="<?php  echo $time['status'];?>">
            <div class='infinite-loading' ><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
        </div>
        <?php  } } ?>
    </div>
</div>

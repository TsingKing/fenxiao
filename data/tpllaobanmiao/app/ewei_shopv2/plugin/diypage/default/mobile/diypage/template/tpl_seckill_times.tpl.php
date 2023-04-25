<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
    .time-container .time-slide { color:<?php  echo $diyitem['style']['color'];?>; }
    .seckill-page .swiper-slide.time-slide.current { color:<?php  echo $diyitem['style']['selectedcolor'];?>;background:<?php  echo $diyitem['style']['selectedbgcolor'];?> }
</style>
<div class="swiper-container time-container" style="background:<?php  echo $diyitem['style']['bgcolor'];?>;margin-top:<?php  echo $diyitem['style']['margintop'];?>px">
    <div class="swiper-wrapper">
        <?php  if(is_array($times)) { foreach($times as $key => $time) { ?>
        <div class="swiper-slide time-slide <?php  if($time['status']==0 || $timeindex==$key) { ?>current<?php  } ?> time-slide-<?php  echo $time['id'];?>" data-index="<?php  echo $key;?>">
            <span class="time"><?php  echo $time['time'];?>:00</span>
            <span class="text">
                        <?php  if($time['status']==0) { ?>
                        抢购中
                        <?php  } else if($time['status']==1) { ?>
                        即将开始
                        <?php  } else { ?>
                        已开抢<?php  } ?></span>
        </div>
        <?php  } } ?>
    </div>
</div>


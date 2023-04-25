<?php defined('IN_IA') or exit('Access Denied');?><?php  if(count($rooms)>1) { ?>
<div class="swiper-container room-container"  style="background:<?php  echo $diyitem['style']['bgcolor'];?>;margin-top:<?php  echo $diyitem['style']['margintop'];?>px;">
    <div class="swiper-wrapper">
        <?php  if(is_array($rooms)) { foreach($rooms as $room) { ?>
        <a class="swiper-slide room-slide <?php  if($roomid==$room['id']) { ?>selected<?php  } ?>" href="<?php  echo mobileUrl('seckill',array('roomid'=>$room['id']))?>" data-nocache="true"
        <?php  if($roomid==$room['id']) { ?>
           style="color:<?php  echo $diyitem['style']['selectedcolor'];?>;border-bottom:2px solid <?php  echo $diyitem['style']['selectedcolor'];?>;backgrond:<?php  echo $diyitem['style']['selectedbgcolor'];?>;"
        <?php  } else { ?>
           style="color:<?php  echo $diyitem['style']['color'];?>;"
        <?php  } ?>>
            <?php  echo $room['title'];?>
        </a>
        <?php  } } ?>
    </div>
</div>
<?php  } ?>

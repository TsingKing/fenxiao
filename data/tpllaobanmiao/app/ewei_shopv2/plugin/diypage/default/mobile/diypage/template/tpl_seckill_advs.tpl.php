<?php defined('IN_IA') or exit('Access Denied');?><div class="swiper-container adv-container"  style="background:<?php  echo $diyitem['style']['bgcolor'];?>;padding-top:<?php  echo $diyitem['style']['margintop'];?>px;padding-bottom:<?php  echo $diyitem['style']['marginbottom'];?>px">
    <div class="swiper-wrapper">
        <?php  if(is_array($advs)) { foreach($advs as $adv) { ?>
        <div class="swiper-slide adv-slide no-swiper" style="background:<?php  echo $diyitem['style']['bgcolor'];?>">
            <a href="<?php echo empty($adv['link'])?'#':$adv['link']?>" style="background:<?php  echo $diyitem['style']['bgcolor'];?>">
                <img src="<?php  echo $adv['thumb'];?>"/>
            </a>
        </div>
        <?php  } } ?>
    </div>
</div>

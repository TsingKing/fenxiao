<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($diyitem['data'])) { ?>
    <div class="fui-block-group col-<?php  echo $diyitem['params']['rownum'];?> <?php echo $diyitem['params']['newstyle']==1? 'new': ''?>" style="margin-top:0; overflow: hidden; background-color: <?php  echo $diyitem['style']['background'];?>;">
        <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $blockgroupitem) { ?>
            <a class="fui-block-child <?php echo $diyitem['params']['newstyle']==1? 'new': ''?>" style="background-color: <?php  echo $diyitem['style']['background'];?>;" href="<?php  echo $blockgroupitem['linkurl'];?>" data-nocache="true">
                <div class="icon" style="color: <?php  echo $blockgroupitem['iconcolor'];?>;"><i class="icon <?php  echo $blockgroupitem['iconclass'];?>"></i></div>

                <?php  if($diyitem['params']['newstyle']==1) { ?>
                <div class="text new">
                    <div class="title" style="color: <?php  echo $blockgroupitem['textcolor'];?>;"><?php  echo $blockgroupitem['text'];?></div>
                    <?php  if(!empty($blockgroupitem['tiptext'])) { ?>
                    <div class=""><span style="color: <?php  echo $diyitem['style']['tipcolor'];?>"><?php  echo $blockgroupitem['tipnum'];?></span> <?php  echo $blockgroupitem['tiptext'];?></div>
                    <?php  } ?>
                </div>
                <?php  } else { ?>
                    <div class="title" style="color: <?php  echo $blockgroupitem['textcolor'];?>;"><?php  echo $blockgroupitem['text'];?></div>
                    <div class="text">
                        <?php  if(!empty($blockgroupitem['tiptext'])) { ?>
                        <span style="color: <?php  echo $diyitem['style']['tipcolor'];?>"><?php  echo $blockgroupitem['tipnum'];?></span><?php  echo $blockgroupitem['tiptext'];?>
                        <?php  } ?>
                    </div>
                <?php  } ?>
            </a>
        <?php  } } ?>
    </div>
<?php  } ?>
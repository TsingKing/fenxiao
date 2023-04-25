<?php defined('IN_IA') or exit('Access Denied');?><style>
    .fui-navbar .nav-item.active, .fui-navbar .nav-item:active {color: <?php  echo $texts['color'];?>}
</style>
<div class="fui-navbar">
    <a href="<?php  echo mobileUrl('sign')?>"
       class="external nav-item <?php  if($_GPC['r'] == 'sign') { ?>active<?php  } ?>">
        <span class="icon icon-goods1"></span>
        <span class="label"><?php  echo $texts['credit'];?><?php  echo $texts['sign'];?></span>
    </a>

    <a href="<?php  echo mobileUrl('sign/rank')?>"
       class="external nav-item <?php  if($_W['routes'] == 'sign.rank') { ?>active<?php  } ?>">
        <span class="icon icon-rank"></span>
        <span class="label"><?php  echo $texts['sign'];?>排行</span>
    </a>

<?php  if(p('creditshop')) { ?>
    <a href="<?php  echo mobileUrl('creditshop')?>"
       class="external nav-item <?php  if($_W['routes'] == 'creditshop.sign') { ?>active<?php  } ?>">
        <span class="icon icon-creditlevel"></span>
        <span class="label"><?php  echo $texts['credit'];?>商城</span>
    </a>
<?php  } ?>

    <a href="<?php  echo mobileUrl()?>" class="external nav-item">
        <span class="icon icon-home"></span>
        <span class="label">商城首页</span>
    </a>

    <a href="<?php  echo mobileUrl('member')?>" class="external nav-item">
        <span class="icon icon-person2"></span>
        <span class="label">会员中心</span>
    </a>


</div>

<!--青岛易联互动网络科技有限公司-->
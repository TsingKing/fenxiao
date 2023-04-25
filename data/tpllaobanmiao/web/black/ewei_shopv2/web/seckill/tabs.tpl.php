<?php defined('IN_IA') or exit('Access Denied');?><div class='menu-header'><?php  echo $this->plugintitle?></div>
<ul>
    <li <?php  if(strexists($_W['routes'],'seckill.task')) { ?> class="active"<?php  } ?>><a href="<?php  echo webUrl('seckill/task')?>">专题管理</a></li>
    <li <?php  if(strexists($_W['routes'],'seckill.room')) { ?> class="active"<?php  } ?>><a href="<?php  echo webUrl('seckill/room')?>">会场管理</a></li>
    <li <?php  if($_GPC['r']=='seckill.goods') { ?> class="active"<?php  } ?>><a href="<?php  echo webUrl('seckill/goods')?>">商品管理</a></li>
    <li <?php  if($_GPC['r']=='seckill.category') { ?> class="active"<?php  } ?>><a href="<?php  echo webUrl('seckill/category')?>">分类管理</a></li>
    <li <?php  if(strexists($_W['routes'],'seckill.adv')) { ?> class="active"<?php  } ?>><a href="<?php  echo webUrl('seckill/adv')?>">广告管理</a></li>
</ul>
 <div class='menu-header'>设置</div>
<ul>
    <li <?php  if($_W['routes']=='seckill.calendar') { ?> class="active"<?php  } ?>><a href="<?php  echo webUrl('seckill/calendar')?>">任务设置</a></li>
    <li <?php  if($_W['routes']=='seckill.cover') { ?> class="active"<?php  } ?>><a href="<?php  echo webUrl('seckill/cover')?>">入口设置</a></li>

</ul>

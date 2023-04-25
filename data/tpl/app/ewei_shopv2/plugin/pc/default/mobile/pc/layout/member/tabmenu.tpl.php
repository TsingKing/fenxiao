<?php defined('IN_IA') or exit('Access Denied');?><div class="tabmenu">
  <ul class="tab pngFix">
    <?php  if(is_array($ice_menu_array)) { foreach($ice_menu_array as $menu) { ?>
      <?php  if(empty($_GPC['mk']) && $menu['menu_key']=='index') { ?>
        <li class="active">
        <a href="<?php  echo $menu['menu_url'];?>"><?php  echo $menu['menu_name'];?></a>
        </li>
      <?php  } else { ?>
        <li <?php  if(!empty($_GPC['mk']) && $_GPC['mk']==$menu['menu_key']) { ?>class="active"<?php  } else { ?>class="normal"<?php  } ?>>
        <a href="<?php  echo $menu['menu_url'];?>"><?php  echo $menu['menu_name'];?></a>
        </li>
      <?php  } ?>

    <?php  } } ?>
  </ul>
</div>
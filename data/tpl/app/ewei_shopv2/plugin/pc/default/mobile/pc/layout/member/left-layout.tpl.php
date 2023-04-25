<?php defined('IN_IA') or exit('Access Denied');?><div class="left-layout">

  <div class="ncm-l-top">

    <h2><a href="<?php  echo mobileUrl('pc')?>" title="我的商城">我的商城</a></h2>

    <div class="set-container-arrow"></div>

  </div>

  <div class="ncm-user-info">

    <div class="avatar">
      <?php  $user=check_login()?>
      <img src=<?php  if(empty($user['avatar'])) { ?>"/addons/ewei_shopv2/plugin/pc/template/web/static/images/default_user_portrait.gif"<?php  } else { ?>
      "<?php  echo $user['avatar'];?>"<?php  } ?>>

      <div class="frame"></div>

    </div>

    <div class="handle">
      <br/>
      <a href="<?php  echo mobileUrl('pc.member.info')?>" title="修改资料">
        <i class="icon-pencil"></i>修改资料</a>
      <a href="<?php  echo mobileUrl("pc.account.logout")?>" title="安全退出">
        <i class="icon-off"></i>安全退出</a></div>
    <div class="name">&nbsp;

    </div>

  </div>

  <ul class="ncm-sidebar ncm-quick-menu">

    <li class="side-menu-quick" nctype="commonOperations" style="display: none;"><a href="javascript:void(0)">

        <h3>常用操作</h3>

      </a>

      <ul>

      </ul>

    </li>

  </ul>

  <ul id="sidebarMenu" class="ncm-sidebar">

    <li class="side-menu"><a href="javascript:void(0)" key="trade">

        <h3>交易管理</h3>

      </a>

      <ul>
        <li <?php  if($_W['action']=='member.cart') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.member.cart')?>">购物车</a></li>

        <li <?php  if($_W['action']=='order') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.order')?>">交易订单</a></li>

        <li <?php  if($_W['action']=='member.favorite') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.member.favorite')?>">我的收藏</a></li>

        <!--<li><a href="/web/web.php?i=1&act=predeposit&op=pd_log_list">账户余额</a></li>-->
        <li <?php  if($_W['action']=='member.info') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.member.info')?>">账户信息</a></li>
        <li <?php  if($_W['action']=='member.log') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.member.log')?>">充值记录</a></li>
        <li <?php  if($_W['action']=='member.address') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.member.address')?>">收货地址</a></li>

        <li <?php  if($_W['action']=='member.history') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.member.history')?>">我的足迹</a></li>

      </ul>

    </li>

    <li class="side-menu"><a href="javascript:void(0)" key="serv">

      <h3>客户信息</h3>

    </a>

      <ul>

        <li <?php  if($_W['action']=='shop.notice') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.shop.notice')?>">公告列表</a></li>
        <li <?php  if($_W['action']=='qa.qa') { ?>class="selected" <?php  } ?>><a href="<?php  echo mobileUrl('pc.qa.qa')?>">帮助中心</a></li>

        <!--<li><a href="/web/web.php?i=1&act=member_complain&op=index">交易投诉</a></li>

        <li><a href="/web/web.php?i=1&act=member_consult&op=my_consult">商品咨询</a></li>

        <li><a href="/web/web.php?i=1&act=member_inform&op=index">违规举报</a></li>

        <li><a href="/web/web.php?i=1&act=member_mallconsult&op=index">平台客服</a></li>-->

      </ul>

    </li>

  </ul>

</div>
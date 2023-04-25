<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/groups/template/mobile/default/css/style.css" />
<div class='fui-page order-list-page'>
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back" href="<?php  echo mobileUrl('order')?>"></a>
		</div>
		<div class="title">拼团玩法</div>
		<div class="fui-header-right">&nbsp;</div>
	</div>
	<div class='fui-content' style="padding-bottom:0;top:2.2rem;">
		<?php  if(!is_mobile()) { ?><div class="pcshop-index"><?php  } ?>
		<dl class="lynn_team_rules">
			<dt>拼团流程：</dt>
			<dd class="lynn_team_rules_dd">
				1 选择心仪商品 2 支付开团或参团 3 邀请好友参团 4 达到人数团购成功
			</dd>
			<dd class="lynn_team_rules_content">
				<?php  echo htmlspecialchars_decode($set['rules'])?>
			</dd>
		</dl>
		<?php  if(!is_mobile()) { ?></div><?php  } ?>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+454mI5p2D5omA5pyJ-->
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php  $this->followBar()?>
<title>商品详情</title>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/groups/template/mobile/default/css/style.css" />
<style type="text/css">
	.creditshop-detail-page .fui-navbar .abtn{height:2.6rem;width:40%;font-size:12px;-webkit-border-radius: 0;border-radius: 0;padding:0.5rem 0 0 0;display: block;float:left;
		line-height: 0.8rem;}
	.creditshop-detail-page .fui-navbar .homeabtn{height:2.6rem;width:20%;font-size:12px;-webkit-border-radius: 0;border-radius: 0;margin:0;padding:0;display: block;float:left;background: #fff;
		color:#666;border:none;line-height: 2.6rem;}
	.homeabtn .icon{font-size:1rem;}
	.text-danger span{color:#ef4f4f;font-size:1rem;}
</style>
<div class='fui-page creditshop-detail-page'>
	<?php  if(is_h5app()) { ?>
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back"></a>
		</div>
		<div class="title"><?php  echo m('plugin')->getName('groups')?></div>
		<div class="fui-header-right"></div>
	</div>
	<?php  } else { ?>
	<a href="<?php  echo mobileUrl('order')?>" class="iconfont icon lynn_back_icon back">&#xe755;</a>
	<?php  } ?>

	<div class='fui-content'>
		<?php  if(!is_mobile()) { ?><div class="pcshop-index"><?php  } ?>
		<div class="fui-swipe" data-speed="5000" data-gap="5">
			<div class="fui-swipe-wrapper">
				<?php  if(is_array($goods['thumb_url'])) { foreach($goods['thumb_url'] as $thumb) { ?>
				<div class="fui-swipe-item"><img src="<?php  echo tomedia($thumb)?>" alt="<?php  echo $goods['title'];?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'"></div>
				<?php  } } ?>
			</div>
			<div class="fui-swipe-page">
				<?php  if(is_array($goods['thumb_url'])) { foreach($goods['thumb_url'] as $thumb) { ?>
				<div class="fui-swipe-bullet"></div>
				<?php  } } ?>
			</div>
		</div>
		<div class="lynn_goods_head">
			<h2 class="lynn_goods_head_title">
				<span><?php  echo $goods['groupnum'];?>人成团</span><?php  echo $goods['title'];?>
			</h2>
			<span class="lynn_goods_follow" style="display: none;">
				<i class="iconfont icon">&#xe606;</i><i class="iconfont icon on">&#xe605;</i>收藏
			</span>
			<?php  if(!empty($goods['description'])) { ?>
			<p class="lynn_goods_head_subtitle">
				<?php  echo $goods['description'];?>
			</p>
			<?php  } ?>
			<div class="lynn_goods_head_info">
				¥ <strong><?php  echo $goods['groupsprice'];?></strong>/<?php  if($goods['units']) { ?><?php  echo $goods['goodsnum'];?><?php  echo $goods['units'];?><?php  } else { ?>1件<?php  } ?> <del>¥ <?php  echo $goods['price'];?></del>
				<span class="fr">
					已有<b><?php  echo $goods['fightnum'];?></b>人参团，销量<b><?php  echo $goods['sales'];?></b>
				</span>
				<div style="clear:both;"></div>
			</div>
			<?php  if(!empty($goods['isdiscount'])) { ?>
			<div class="lynn_goods_discount">
				【团长优惠 <span><?php  if($goods['headstype']==0) { ?> ¥<?php  echo $goods['headsmoney'];?><?php  } else if($goods['headstype']==1) { ?><?php  echo number_format($goods['headsdiscount'] / 10,1)?>折<?php  } ?></span>】
			</div>
			<?php  } ?>
		</div>
		<div class="lynn_goods_invitation">
			*开团并邀请<?php  echo $goods['groupnum']-1?>人参团，人数不足自动退款，详见<a href="<?php  echo mobileUrl('groups/team/rules')?>">拼团玩法</a>
		</div>
		<div class="lynn_goods_content">
			<div class="lynn_goods_content_title"><span>图文详情</span></div>
			<div class="lynn_goods_content_info content-images" id="content">
				<?php  if($groupsset['description']) { ?>
					<?php  echo htmlspecialchars_decode($groupsset['groups_description'])?>
				<?php  } else { ?>
					<?php  echo htmlspecialchars_decode($goods['content'])?>
				<?php  } ?>
			</div>
		</div>
		<div style="height:2.5rem;"></div>
		<?php  if(!is_mobile()) { ?></div><?php  } ?>
	</div>
	<div class="fui-navbar bordert" style="z-index:100;padding:0;">
		<a class="homeabtn btn btn-warning <?php  if(empty($goods['stock'])) { ?>disabled<?php  } ?> external" style="" href="<?php  echo mobileUrl('groups')?>">
			<p class="icon icon-home1"></p>
		</a>
		<a class="lynn_goods_btn lynn_btn_waring btn-single" href="javascript:void(0);">
			<p><?php  if($goods['single']) { ?>¥ <strong><?php  echo $goods['singleprice'];?></strong><?php  } else { ?><br /><?php  } ?></p> 单独购买
		</a>
		<a class="lynn_goods_btn lynn_btn_danger" data-nocache="true" href="<?php  echo mobileUrl('groups/goods/openGroups',array('id'=>$goods['id']))?>">
			<p>¥ <strong><?php  echo $goods['groupsprice'];?></strong></p> <?php  echo $goods['groupnum'];?>人成团
		</a>
	</div>
</div>
<script language='javascript'>
	require(['../addons/ewei_shopv2/plugin/groups/static/js/goods.js'], function (modal) {
	modal.init(<?php  echo $goods['id'];?>);
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--913702023503242914-->
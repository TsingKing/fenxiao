<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php  $this->followBar()?>
<title>商品详情</title>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/groups/template/mobile/default/css/style.css" />
<div class='fui-page creditshop-detail-page'>
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back" href="<?php  echo mobileUrl('order')?>"></a>
		</div>
		<div class="title">拼团操作</div>
		<div class="fui-header-right">&nbsp;</div>
	</div>
	<div class='fui-content navbar'>
		<?php  if(!is_mobile()) { ?><div class="pcshop-index"><?php  } ?>
		<div class="lynn_opengroups_head fui-list">
			<a href="<?php  echo mobileUrl('groups/goods', array('id'=>$goods['id']))?>" class="lynn_index_list_a fui-list-media">
				<img src="<?php  echo $goods['thumb'];?>" alt="<?php  echo $goods['title'];?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'">
			</a>
			<div class="fui-list-inner lynn_opengroups_head_goods">
				<h2><?php  echo $goods['title'];?></h2>
				<div class="lynn_opengroups_head_goods_info">
					<span class="fl">
						<?php  echo $goods['groupnum'];?>人团：¥ <strong><?php  echo $goods['groupsprice'];?></strong>/<?php  if($goods['units']) { ?><?php  echo $goods['goodsnum'];?><?php  echo $goods['units'];?><?php  } else { ?>1件<?php  } ?>
					</span>
					<span class="fr">
						已有<b><?php  echo $goods['fightnum'];?></b>人参团
					</span>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>
		<div class="lynn_opengroups_invitation row"  align="center">
			<p>支付开团并邀请<b><?php  echo $goods['groupnum']-1?></b>人参加，人数不足自动退款，详见下方拼团玩法</p>
			<!-- <a href="<?php  echo mobileUrl('groups/goods/fightGroups',array('id'=>$goods['id']))?>" class="lynn_fightgroups_btn" data-nocache="true">我要参团</a> -->
			<!-- <a href="javascript:void(0);" class="lynn_opengroups_btn btn-groups" style="display: block; text-align: center;">我要开团</a> -->
			<a href="javascript:void(0);" class="btn-groups"style="width: 45%;border: 1px solid #fd5454;-webkit-border-radius: 0.2rem;height: 1.6rem;display: block;text-align: center;line-height: 1.6rem;font-size: 0.7rem;background: #fd5454;color: #fff;margin: 0.3rem;">我要开团</a>
		</div>
		<div class="step">
			<div class="step_hd">
				<i class="left"></i>拼团玩法<a class="step_more" href="<?php  echo mobileUrl('groups/team/rules')?>">查看详情></a>
			</div>
			<div id="footItem" class="step_list">
				<div class="step_item ">
					<div class="step_num">1</div>
					<div class="step_detail">
						<p class="step_tit">选择
							<br>心仪商品</p>
					</div>
				</div>
				<div class="step_item ">
					<div class="step_num">2</div>
					<div class="step_detail">
						<p class="step_tit">支付开团
							<br>或参团</p>
					</div>
				</div>
				<div class="step_item" id="step_3">
					<div class="step_num">3</div>
					<div class="step_detail">
						<p class="step_tit" >邀请好友
							<br>参团支付</p>
					</div>
				</div>
				<div class="step_item" id="step_4">
					<div class="step_num">4</div>
					<div class="step_detail">
						<p class="step_tit">达到人数
							<br>团购成功</p>
					</div>
				</div>
			</div>
		</div>
		<div class="lynn_more_groups">
			<div class="lynn_more_groups_head">
				<p>
					<i></i>
					<span>更多好团</span>
				</p>
			</div>
			<ul class="lynn_more_groups_list row">
				<?php  if(is_array($teams)) { foreach($teams as $item) { ?>
				<li>
					<a href="<?php  echo mobileUrl('groups/goods', array('id'=>$item['id']))?>" class="lynn_more_groups_list_a">
						<img src="<?php  echo $item['thumb'];?>" alt="<?php  echo $item['title'];?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'">
					</a>
					<h3><?php  echo $item['title'];?></h3>
					<p class="lynn_more_groups_list_p row">
						<span class="fl">¥ <b><?php  echo $item['groupsprice'];?></b><del>¥<?php  echo $item['price'];?></del></span>
						<span class="fr"><?php  echo $item['fightnum'];?>人参团</span>
					</p>
				</li>
				<?php  } } ?>
			</ul>
		</div>
		<?php  if(!is_mobile()) { ?></div><?php  } ?>
	</div>
	<script language='javascript'>
		require(['../addons/ewei_shopv2/plugin/groups/static/js/goods.js'], function (modal) {
			modal.init(<?php  echo $goods['id'];?>);
		});
	</script>
</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+4-->
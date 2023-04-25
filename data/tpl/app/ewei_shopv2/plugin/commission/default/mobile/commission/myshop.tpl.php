<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $shop['name'];?>"; </script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page fui-page-current page-commission-myshop'>
<?php  $this->followBar()?>

	<?php  if(is_h5app()) { ?>
	<div class="fui-header">
		<div class="fui-header-left"></div>
		<div class="title"><?php  echo $shop['name'];?></div>
		<div class="fui-header-right"></div>
	</div>
	<?php  } ?>

    <div class='fui-content navbar'>

	<div class="myshop-header">
	    <div class="image">
		<img src="<?php  echo tomedia($shop['img'])?>"  />
	    </div>
	   
	    <div class="menus">
		 <div class='shopname'>
	      <?php  echo $shop['name'];?>
	    </div>
		<div class="shoplogo">
		    <img src="<?php  echo tomedia($shop['logo'])?>"  />
		</div>
		<div class="nav" onclick="location.href='<?php  echo mobileUrl('goods', array('frommyshop'=>1))?>'">
		    <p><?php  echo $goodscount;?></p>
		    <p>全部宝贝</p>
		</div>
		 <div class="nav btn-qrcode"><!--7.13-->
		   <a class="icon icon-star" href="http://www.lianqin.shop/app/index.php?i=4&c=entry&m=ewei_shopv2&do=mobile&r=commission.myshop.select&mid=11765"></a>
		   </br>
		   <a href="http://www.lianqin.shop/app/index.php?i=4&c=entry&m=ewei_shopv2&do=mobile&r=commission.myshop.select&mid=11765">自选商品</a>
		</div>
		<div class="nav btn-favorite">
		    <p><i class="icon icon-star"></i></p>
		    <p>收藏本店</p>
		</div>
		
		<!-- <div class="nav btn-qrcode"   -->
		     <!-- <?php  if($mid==$member['id'] && $member['isagent']==1 && $member['status']==1) { ?> -->
		     <!-- onclick="location.href='<?php  echo mobileUrl('commission/qrcode')?>'"> -->
		    <!-- <?php  } else { ?> -->
		    <!-- onclick="location.href='<?php  echo mobileUrl('commission/qrcode',array('mid'=>$mid))?>'" -->
		    <!-- <?php  } ?> -->
		    <!-- <p><i class="icon icon-qrcode"></i></p> -->
		    <!-- <p>二维码</p>  -->
		<!-- </div> -->
	    </div>
	</div>
	<form action="<?php  echo mobileUrl('goods')?>" method="post">
		<div class="fui-searchbar">
			<div class="searchbar center">
				<div class="search-input">
					<input type="search" name='keywords' class="search" placeholder="输入关键字...">
				</div>
			</div>
		</div>
	</form>
	<!-- 促销活动图 -->
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('shop/index/cube', TEMPLATE_INCLUDEPATH)) : (include template('shop/index/cube', TEMPLATE_INCLUDEPATH));?>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('shop/index/goods', TEMPLATE_INCLUDEPATH)) : (include template('shop/index/goods', TEMPLATE_INCLUDEPATH));?>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('shop/index/banner', TEMPLATE_INCLUDEPATH)) : (include template('shop/index/banner', TEMPLATE_INCLUDEPATH));?>
	
	<!-- <a href="http://www.lianqin.shop/app/index.php?i=4&c=entry&m=ewei_shopv2&do=mobile&r=diypage&id=63" style="display: block; padding:3px 4px;"data-nocache="true"> -->
		<!-- <img src="http://benla.oss-cn-beijing.aliyuncs.com/images/4/2019/03/AH555rD0rhxA3tO5OT5HzLozOhLtRL.jpg" style="display: block; width: 100%; height: auto;"> -->
	<!-- </a> -->
	
	
	 <div class="fui-line" style="background: #f4f4f4;">
	         <div class="text text-danger"><i class="icon icon-hotfill"></i> 小店推荐</div>
	 </div>
	<div class="fui-goods-group block" id='container'></div>
	<div class='infinite-loading' style="text-align: center; color: #666;">
		<span class='fui-preloader'></span>
		<span class='text'> 正在加载...</span>
	</div>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
    </div>
    <div id='cover'>
            <div class='fui-mask-m visible'></div>
            <div class='arrow'></div>
            <div class='content'>请点击右上角<br/>通过【收藏】<br/>方便下次浏览</div>
</div>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>
    <script type="text/html" id="tpl_commission_myshop_goods_list">
	
		<%if list.length>0 %>
			<%each list as g%>
				<div class="fui-goods-item" data-goodsid="<%g.id%>">
					<a href="<?php  echo mobileUrl('goods/detail', array('frommyshop'=>1))?>&id=<%g.id%>">
						<div class="image" data-lazy-background="<%g.thumb%>">
							<%if g.total<=0%><div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div><%/if%>
						</div>
					</a>
					<div class="detail">
						<a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.id%>">
							<div class="name"><%g.title%></div>
						</a>
						<div class="price">
							<span class="text">￥<%g.minprice%></span>
							<span class="buy"><i class="icon icon-cart"></i></span>
						</div>
					</div>
				</div>
			<%/each%>
		<%else%>
			<div style="text-align: center; color: #666;">
				<span class='text'> 暂无商品</span>
			</div>
		<%/if%>
</script>
<script language='javascript'>
	require(['../addons/ewei_shopv2/plugin/commission/static/js/myshop.js'], function (modal) {modal.init("<?php  echo intval($_GPC['mid'])?>");});
</script>
</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+454mI5p2D5omA5pyJ-->
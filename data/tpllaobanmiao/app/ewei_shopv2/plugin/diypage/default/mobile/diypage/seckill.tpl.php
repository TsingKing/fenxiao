<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<script>document.title = "<?php  echo $page_title;?>";</script>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/static/js/dist/swiper/swiper.min.css">
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/seckill/template/mobile/default/static/css/common.css">
<link href="../addons/ewei_shopv2/plugin/diypage/static/css/foxui.diy.css?v=201701041000"rel="stylesheet"type="text/css"/>
<style type="text/css">
    .goods-container .fui-list {background: <?php  echo $diypage['seckill_list']['style']['bgcolor'];?>;}
    .goods-container .fui-list-group-title {background:<?php  echo $diypage['seckill_list']['style']['topbgcolor'];?>;color:<?php  echo $diypage['seckill_list']['style']['topcolor'];?>}
</style>
<div class="fui-page seckill-page">
    <?php  if(is_h5app()) { ?>
        <div class="fui-header">
            <div class="fui-header-left">
                <a class="back"></a>
            </div>
            <div class="title"><?php  echo $page_title;?></div>
            <div class="fui-header-right"></div>
        </div>
    <?php  } ?>
    <div class="fui-content <?php  if($diypage['diymenu']>-1) { ?>navbar<?php  } ?>">
        <input type="hidden" id="currenttime" value="<?php  echo $currenttime;?>" />

        <?php  if(is_array($diypage['items'])) { foreach($diypage['items'] as $diyitem) { ?>
               <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diypage/template/tpl_'.$diyitem['id'], TEMPLATE_INCLUDEPATH)) : (include template('diypage/template/tpl_'.$diyitem['id'], TEMPLATE_INCLUDEPATH));?>
         <?php  } } ?>


    </div>
    <?php  if($diypage['diymenu']>-1) { ?>
        <?php  $this->footerMenus()?>
    <?php  } ?>
    <?php  $diypage=true?>
    <?php  if(!empty($diypage['diylayer'])) { ?>
    <?php  echo $this->diyLayer(false, false, false)?>
    <?php  } ?>
</div>
<script type="text/html" id="tpl_seckill">

    <div class="fui-list-group time-group-<%time.id%>"   >
        <div class="fui-list-group-title" style="">
            <%if time.status>=0%>
            <span class="timer">
                                <d style="color:<?php  echo $diypage['seckill_list']['style']['topcolor'];?>">
<%if time.status==1%>距开始<%else%>距结束<%/if%></d>
                <span class="time-hour" style="background:<?php  echo $diypage['seckill_list']['style']['timebgcolor'];?>;color:<?php  echo $diypage['seckill_list']['style']['timecolor'];?>">-</span>
                <d style="color:<?php  echo $diypage['seckill_list']['style']['topcolor'];?>">:</d>
                <span class="time-min"  style="background:<?php  echo $diypage['seckill_list']['style']['timebgcolor'];?>;color:<?php  echo $diypage['seckill_list']['style']['timecolor'];?>">-</span>
                <d style="color:<?php  echo $diypage['seckill_list']['style']['topcolor'];?>">:</d>
                <span class="time-sec"  style="background:<?php  echo $diypage['seckill_list']['style']['timebgcolor'];?>;color:<?php  echo $diypage['seckill_list']['style']['timecolor'];?>">-</span>
             </span>
            <%/if%>
            <%if time.status==-1%>还可以继续抢购哦~<%/if%>
            <%if time.status==0%>抢购中 先下单先得哦<%/if%>
            <%if time.status==1%>即将开始 先下单先得哦<%/if%>

        </div>

        <%each goods as g%>
        <div class='fui-list align-start'>
            <div class='fui-list-media'>
                <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>"><img src="<%g.thumb%>" /></a>
            </div>

            <div class='fui-list-inner'>
                <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>" class='text' style="color:<?php  echo $diypage['seckill_list']['style']['titlecolor'];?>"><%g.title%></a>
                <div class="info">
                     <span class="button">
                         <%if time.status==1%>
                         <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>" class="btn btn-success btn-sm"  style="color:<?php  echo $diypage['seckill_list']['style']['btnwaitcolor'];?>;background:<?php  echo $diypage['seckill_list']['style']['btnwaitbgcolor'];?>;border:1px solid <?php  echo $diypage['seckill_list']['style']['btnwaitbgcolor'];?>">等待抢购</a>

                         <%else%>
                                <%if g.percent>=100%>
                                <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>" class="btn btn-default btn-sm" style="color:<?php  echo $diypage['seckill_list']['style']['btnwaitcolor'];?>;background:<?php  echo $diypage['seckill_list']['style']['btnwaitbgcolor'];?>;border:1px solid <?php  echo $diypage['seckill_list']['style']['btnwaitbgcolor'];?>">已抢空</a>
                             <%else%>
                         <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>" class="btn btn-danger btn-sm" style="color:<?php  echo $diypage['seckill_list']['style']['btncolor'];?>;background:<?php  echo $diypage['seckill_list']['style']['btnbgcolor'];?>;border:1px solid <?php  echo $diypage['seckill_list']['style']['btnbgcolor'];?>">去抢购</a>

                             <%/if%>
                          <%/if%>
                     </span>
                    <div class="price"   style="color:<?php  echo $diypage['seckill_list']['style']['pricecolor'];?>">&yen;<%g.price%></div>
                </div>
                <div class="info info1">
                    <%if time.status!=1%>
                    <span class="process" style="border:1px solid <?php  echo $diypage['seckill_list']['style']['processbgcolor'];?>">
                                <div class="inner" style="width:<%g.percent%>%;background:<?php  echo $diypage['seckill_list']['style']['processbgcolor'];?>"></div>
                        </span>
                    <span class="process-text" style="color:<?php  echo $diypage['seckill_list']['style']['processtextcolor'];?>">已售 <%g.percent%>%</span>
                    <%/if%>
                    <div class="price1"   style="color:<?php  echo $diypage['seckill_list']['style']['marketpricecolor'];?>">&yen;<%g.marketprice%></div>
                </div>
            </div>
        </div>
        <%/each%>
    </div>

</script>
<script language="javascript">
    require(['../addons/ewei_shopv2/plugin/seckill/static/js/mobile.js'], function(model){
        model.init({taskid:<?php  echo $taskid;?>,roomid:<?php  echo $roomid;?>,timeid: <?php  echo $timeid;?>, roomindex:<?php  echo $roomindex;?>, roomcount: <?php  echo count($rooms)?> , timeindex:<?php  echo $timeindex;?>,  timecount: <?php  echo count($times)?> , advcount:<?php  echo count($advs)?>  });
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

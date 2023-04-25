<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($startadv['data']) && count($startadv['data'])>0) { ?>
    <link href="../addons/ewei_shopv2/plugin/diypage/static/css/plu.min.css?v=20170328" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        <?php  if(!is_weixin()) { ?>.fui-startadv {position: absolute;}<?php  } ?>
        .fui-startadv:before {background: <?php  echo $startadv['style']['background'];?>;opacity: <?php  echo $startadv['style']['opacity'];?>;}
    </style>
    <div class="fui-startadv <?php  echo $startadv['params']['style'];?>">
        <div class="inner">
            <div class="fui-swipe" data-speed="5000">
                <div class="fui-swipe-wrapper">
                    <?php  if(is_array($startadv['data'])) { foreach($startadv['data'] as $startadv_item) { ?>
                        <div class="fui-swipe-item" data-type="<?php  echo $startadv_item['click'];?>" data-href="<?php  echo $startadv_item['linkurl'];?>">
                            <img src="<?php  echo tomedia($startadv_item['imgurl'])?>" />
                        </div>
                    <?php  } } ?>
                </div>
                <div class="fui-swipe-page"></div>
            </div>
            <?php  if($startadv['params']['style']!='default' || $startadv['params']['style']=='default'&&$startadv['params']['autoclose']>0) { ?>
                <div class="close">
                    <div class="close-btn" data-close="<?php echo $startadv['params']['style']=='default'&&$startadv['params']['autoclose']>0&&empty($startadv['params']['canclose'])?0:1?>" data-second="<?php echo  $startadv['params']['style']=='default'&&$startadv['params']['autoclose']>0?$startadv['params']['autoclose']:0?>"><?php  if($startadv['params']['style']=='default'&&$startadv['params']['autoclose']>0) { ?><span><?php  echo $startadv['params']['autoclose'];?></span> <?php  if($startadv['params']['canclose']>0) { ?>关闭<?php  } else { ?>秒<?php  } ?><?php  } ?></div>
                </div>
            <?php  } ?>
        </div>
    </div>
    <script type="text/javascript">
        var advsecond=$(".close-btn").data('second');
        if(advsecond>0){
            var endtime = parseInt(advsecond);
            var advclose = setInterval(function () {
                endtime--;
                $(".fui-startadv .close-btn span").text(endtime);
                if(endtime==0){
                    $(".fui-startadv").fadeOut();
                    clearInterval(advclose);
                }
            }, 1000);
        }
        $(".fui-startadv .fui-swipe-item").unbind('click').click(function () {
            var click = $(this).data('type'), href = $(this).data('href');
            if(click=='0'){
                if(href){
                    location.href = href;
                }
            }else{
                $(".fui-startadv").fadeOut();
            }
        });
        $(".fui-startadv .close-btn").unbind('click').click(function () {
            if($(this).data('close')){
                $(".fui-startadv").fadeOut();
            }
        });
    </script>
<?php  } ?>
<!--NDAwMDA5NzgyNw==-->
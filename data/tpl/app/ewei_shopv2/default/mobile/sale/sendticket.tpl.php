<?php defined('IN_IA') or exit('Access Denied');?>

<link href="https://benla.oss-cn-beijing.aliyuncs.com/static/sendticket/css/style.css" rel="stylesheet" />
<link href="//at.alicdn.com/t/font_fmr96shbrjrwwmi.css" rel="stylesheet" />



<div class="eject-outer" >
    <div class="eject">
	
        <div class="eject1">
<img style="float:left:magin:-100px 0 0 0 ; background-size: 15.4rem 20.375rem!important;height: 21.5rem;margin-top: 2rem;"; 
src="https://www.lianqin.shop/addons/ewei_shopv2/template/mobile/default/static/sendticket/img/bg2.png"/>
         <p class="icon_1"></p>
        <!--<p class="icon_2">10月23号10:30开抢</p>-->
		</div>
       <div data-dismiss="modal" class="eject4"><i class="iconfont icon-guanbi1 icon_8"></i></div>
        <!--<div class="eject3">
           <p class="icon_7"><a class="icon_7" href="https://www.lianqin.shop/app/index.php?i=4&c=entry&m=ewei_shopv2&do=mobile">知道了</a></p>
        </div>-->
      
    </div>
</div>
<script language='javascript'>
    $(document).ready(function(){
        require(['biz/sale/sendticket/index'], function (modal) {
            modal.init()
        });

        $(".eject3").click(function(){
            $('.fui-mask').fadeOut();
            $('.eject-outer').fadeOut();
        });
    });
</script>
<!--NDAwMDA5NzgyNw==-->
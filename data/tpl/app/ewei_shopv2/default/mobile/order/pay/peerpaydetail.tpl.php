<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="https://benla.oss-cn-beijing.aliyuncs.com/static/js/app/biz/sale/peerpay.css?v=<?php  echo time();?>">
<div class="fui-page  fui-page-current">
    <?php  if(is_h5app()) { ?>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back" data-nocache="true"></a>
        </div>
        <div class="title">找人代付</div>
        <div class="fui-header-right"></div>
    </div>
    <?php  } ?>
    <div class="fui-content">
        <div class="fui-payfor-header">
                <span class="fui-payfor-header-user">
                    <i class="fui-payfor-user"><img src="<?php  echo $member['avatar'];?>" alt=""></i>
                </span>
            <div class="fui-payfor-header-title">等待真爱路过...</div>
            <i class="fui-payfor-header-down"></i>
        </div>
        <div class="fui-payfor-speed">

            <div class="fui-list fui-payfor-speed-bot" style="padding:0.2rem 0;">
                <div class="fui-list-inner">已完成：<span class="price"><?php  echo $rate;?>%</span></div>
                <div class="fui-list-inner" style="text-align: right;">还差：<span class="price"><?php  echo $rate_price;?>元</span></div>
            </div>

            <div class="fui-payfor-speed-top">
                <i class="fui-payfor-speed-top-inner" style="width:<?php  echo $rate;?>%"></i>
            </div>
        </div>
        <div class="blank"></div>

        <div class="fui-list-group-title fui-payfor-group-title">来自<?php  echo $member['nickname'];?>的代付订单</div>
        <div class="fui-list fui-payfor-list">
            <div class="fui-list-media">
                <img src="<?php  echo tomedia($goods['thumb'])?>" alt="<?php  echo $goods['title'];?>">
            </div>
            <div class="fui-list-inner fui-payfor-info">
                <span class="fui-payfor-info-title"><?php  echo $goods['title'];?></span>
                <div class="fui-list" style="padding:0;">
                    <div class="fui-list-inner">
                        <?php  if(!empty($address)) { ?>
                        <span><?php  echo $address['realname'];?> &nbsp;<?php  echo substr_replace($address['mobile'],'****',-4)?></span>
                        <span><?php  echo $address['province'];?>  <?php  echo $address['city'];?>  <?php  echo $address['area'];?> ****</span>
                        <?php  } else { ?>
                        <span></span>
                        <span></span>
                        <?php  } ?>
                        <span class="fui-payfor-info-price">&yen;<?php  echo $peerpay['peerpay_realprice'];?></span>
                    </div>
                    <div class="fui-list-media">
                        <a href="<?php  echo mobileUrl('goods/detail',array('id'=>$goods['id']))?>" class="btn btn-sm btn-default fui-payfor-btn">查看商品</a>
                    </div>
                </div>

            </div>
        </div>
<?php  if($peerpay['peerpay_type'] == 1) { ?>
        <?php  if(is_array($message)) { foreach($message as $mk => $mv) { ?>
        <div class="peerpay-message-box">
            <div class="peerpay-message-from">
                <div class="peepay-message-headimg">
                    <img src="<?php  echo $mv['headimg'];?>">
                </div>
                <div class="peepay-message-nickname"><?php  echo $mv['uname'];?>帮他付了 <span style="color:red">¥<?php  echo $mv['price'];?></span></div>
                <div class="peepay-message-floor"><?php  echo $mk+1;?>F</div>
                <div class="peepay-message-time"><?php  echo date('m-d H:i');?></div>
            </div>
            <div class="peerpay-message-content"><?php  echo $mv['usay'];?></div>
        </div>
        <?php  } } ?>
        <?php  if(!empty($message)) { ?>
        <div style="float:left;height: 10px;width: 100%;background-color: #ededed;margin-top: -1px"></div>
        <?php  } ?>
        <div class="fui-text fui-cell-group" style="width: 100%;left: 0;background-color: #fff">
            <?php  if($rate_price > 0) { ?>
            <div class="fui-cell">
                <div class="fui-cell-info">
                    <textarea rows="3" placeholder="给TA留言" maxlength="200" id="peerpaymessage">支持一下，么么哒!</textarea>
                    <!--<div class="textarea_counter"><span>0</span>/200</div>-->
                </div>
            </div>
            <?php  } ?>
        </div>
<?php  } ?>

        <?php  if($rate_price > 0) { ?><div class="fui-text fui-cell-group"  style="width: 100%;left: 0;background-color: #fff">
            <div class="fui-cell">
                <div class="fui-cell-label">付款金额</div>
                <div class="fui-cell-info fui-payfor-input-price">&yen;&nbsp;
                    <input type="text" placeholder="" class="fui-input payfor-price-input" value="<?php  echo $price;?>" id="peerprice" <?php  if($peerpay['peerpay_type'] == 0) { ?>readonly="readonly"<?php  } ?>>
                </div>
            </div>
        </div>
        <a href="javascript:;" class="btn btn-danger paynow" style="display: block;">立即支付</a><?php  } ?>
        <a href="<?php  echo mobileUrl()?>" class="btn btn-danger-o" style="display: block;">我也要去玩</a>
        <a class="btn btn-success-o" style="display: block;" onclick="$('.alert-mask').show()">找小伙伴帮TA付款</a>
    </div>
</div>
<div class="alert-mask" style="position: absolute;background: rgba(0, 0, 0, 0.8) none repeat scroll 0 0;width: 100%;height: 100%;left: 0;top: 0;z-index: 1000;-moz-transition-duration: 400ms;-webkit-transition-duration: 400ms;transition-duration: 400ms;display: none" onclick="$('.alert-mask').hide()">
    <img src="https://benla.oss-cn-beijing.aliyuncs.com/static/images/peerpayshare.png" alt="" width="100%" >
    <div style='font-family: "Microsoft YaHei UI", "微软雅黑", "宋体";color: #fff;text-align: center;'>快去找人帮你付款吧</div>
</div>
<script>
    $(function(){
        $('.paynow').click(function () {

            var total = <?php  echo $rate_price;?>;
            var peerprice = $('#peerprice').val();
            var maxpeerpay = <?php  echo $peerpay['peerpay_selfpay'];?>;
            maxpeerpay = parseFloat(maxpeerpay);
            var peerpaytype = <?php  echo $peerpay['peerpay_type'];?>;
            var message = $('#peerpaymessage').val();
            if (peerprice<=0){
                FoxUI.alert('','请填写代付金额');
                return;
            } else if (peerpaytype!=0 && peerprice > maxpeerpay && maxpeerpay>0){
                FoxUI.alert('','您最多代付'+maxpeerpay+'元');
                return;
            }else if(peerprice>total){
                FoxUI.alert('','不能超付');
                return;
            }
            location.href = "<?php  echo mobileUrl('order/pay',array('id'=>$peerpay['oid']),1);?>&peerprice="+peerprice+"&peerpaymessage="+message;
        });
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+454mI5p2D5omA5pyJ-->
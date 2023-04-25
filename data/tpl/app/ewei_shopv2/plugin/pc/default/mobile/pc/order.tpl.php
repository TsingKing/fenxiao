<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_header', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_header', TEMPLATE_INCLUDEPATH));?>
<div class="ncm-container">
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH));?>
    <link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/pc/template/mobile/default/static/css/dcalendar.picker.css"  />
    <div class="right-layout">
        <link href="../addons/ewei_shopv2/plugin/pc/template/mobile/default/static/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

        <div class="wrap">
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH));?>
            <form method="GET">
                <table class="ncm-search-table">
                    <input type="hidden" name="i" value="<?php  echo $_GPC['i']?>">
                    <input type="hidden" name="c" value="entry">
                    <input type="hidden" name="m" value="ewei_shopv2">
                    <input type="hidden" name="do" value="mobile">
                    <input type="hidden" name="r" value="pc.order">
                    <?php  if($_GPC['mk']=='recycle') { ?>
                    <input type="hidden" name="mk" value="recycle">
                    <?php  } ?>
                    <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <th>订单状态</th>
                        <td class="w100"><select name="status">
                                <option value="0" <?php  if($_GPC['status']==0) { ?>selected<?php  } ?>>所有订单</option>
                                <option value="-2" <?php  if($_GPC['status']==-2) { ?>selected<?php  } ?>>
                                    待付款
                                </option>
                                <option value="1" <?php  if($_GPC['status']==1) { ?>selected<?php  } ?>>
                                    待发货
                                </option>
                                <option value="2" <?php  if($_GPC['status']==2) { ?>selected<?php  } ?>>
                                    待收货
                                </option>
                                <option value="3" <?php  if($_GPC['status']==3) { ?>selected<?php  } ?>>
                                    已完成
                                </option>
                                <option value="4" <?php  if($_GPC['status']==4) { ?>selected<?php  } ?>>
                                    退/换货
                                </option>
                                <option value="-1" <?php  if($_GPC['status']==-1) { ?>selected<?php  } ?>>
                                    已取消
                                </option>
                            </select></td>
                        <th>下单时间</th>
                        <td class="w240"><input type="text" class="text w70 hasDatepicker" name="start_date" id="query_start_date" value="" readonly="readonly"><label class="add-on"><i class="icon-calendar"></i></label>&nbsp;–&nbsp;<input type="text" class="text w70 hasDatepicker" name="end_date" id="query_end_date" value="" readonly="readonly"><label class="add-on"><i class="icon-calendar"></i></label></td>
                        <th>订单号</th>
                        <td class="w160"><input type="text"  class="text w150" name="order_sn" value="<?php  echo $_GPC['order_sn'];?>"></td>
                        <td class="w70 tc">
                            <label class="submit-border">
                                <input type="submit" class="submit" value="搜索">
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <div class="fui-page">
                <div class='order-list-page'>
                    <div class='fui-content navbar order-list' style="background-color: #fff">
                        <?php  if(empty($list)) { ?>
                        <div class='fui-content-inner' >
                            <div class='content-empty' >
                                <i class='icon icon-lights'></i><br/>暂时没有任何订单<br/><a href="<?php  echo mobileUrl('pc')?>" class='btn btn-default-o external'>到处逛逛</a>
                            </div>
                            <div class='container'></div>
                        </div>
                        <?php  } else { ?>
                            <?php  if(is_array($list)) { foreach($list as $order) { ?>
                                <div class='fui-list-group order-item' data-orderid="<?php  echo $order['id'];?>" >
                                    <?php  if(empty($order['merchid'])) { ?>
                                    <a href="javascript:void(0);" class="external" data-nocache='true'>
                                        <div class="fui-list" style="padding: 0.25rem 0.5rem";>
                                            <div class="fui-list-inner">
                                                <div class="subtitle"><i class="icon icon-shop"></i> 自营</div>
                                            </div>

                                        </div>
                                    </a>
                                    <?php  } else { ?>
                                    <a href="<?php  echo mobileUrl('pc.merch')?>&merchid=<?php  echo $order['merchid'];?>" class="external" data-nocache='true'>
                                        <div class="fui-list" style="padding: 0.25rem 0.5rem";>
                                            <div class="fui-list-inner">
                                                <div class="subtitle"><i class="icon icon-shop"></i> <?php  echo $order['merchname'];?></div>
                                            </div>
                                            <div class="fui-list-angle">
                                                <div class="angle"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php  } ?>
                                    <a href="<?php  echo mobileUrl('pc.order/detail')?>&id=<?php  echo $order['id'];?>" data-nocache='true'>
                                        <div class='fui-list-group-title lineblock'>
                                            订单号: <?php  echo $order['ordersn'];?>
                                            <span class='status <%order.statuscss%>'><?php  echo $order['statusstr'];?></span>
                                        </div>
                                        <?php  if(is_array($order['goods'])) { foreach($order['goods'] as $g) { ?>
                                        <div class="fui-list goods-list">
                                            <div class="fui-list-media">
                                                <img src="<?php  echo $g['thumb'];?>" class="round">
                                            </div>
                                            <div class="fui-list-inner">
                                                <div class="text goodstitle"><?php  echo $g['title'];?></div>
                                                <?php  if($g['optionid']!=0) { ?><div class='subtitle'><?php  echo $g['optiontitle'];?></div><?php  } ?>

                                            </div>
                                            <div class='fui-list-angle'>
                                                ￥<span class='marketprice'><?php  echo $g['price'];?><br/>   x<?php  echo $g['total'];?>
                                            </div>

                                        </div>
                                        <?php  } } ?>

                                        <div class='fui-list-group-title lineblock'>
                                            <span class='status'>共 <span class='text-danger'><?php  echo $order['goods']['length'];?></span> 个商品 实付: <span class='text-danger'>￥<?php  echo $order['price'];?></span></span>
                                        </div>
                                    </a>
                                    <div class='fui-list-group-title lineblock opblock' style="height: auto;">
                                        <span class='status'>
                                        <?php  if($order['userdeleted']==1) { ?>
                                            <?php  if($order['status']==3 || $order['status']==-1) { ?>
                                            <div class="btn btn-default btn-default-o order-deleted" data-orderid="<?php  echo $order['id'];?>">彻底删除订单</div>
                                            <?php  } ?>
                                            <?php  if($order['status']==3) { ?>
                                            <div class="btn btn-default btn-default-o order-recover" data-orderid="<?php  echo $order['id'];?>">恢复订单</div>
                                            <?php  } ?>
                                        <?php  } ?>

                                        <?php  if($order['userdeleted']==0) { ?>
                                            <?php  if($order['status']==0) { ?>
                                            <div class="btn btn-default btn-default-o order-cancel">取消订单
                                                <select data-orderid="<?php  echo $order['id'];?>">

                                                    <option value="">不取消了</option>
                                                    <option value="我不想买了">我不想买了</option>
                                                    <option value="信息填写错误，重新拍">信息填写错误，重新拍</option>
                                                    <option value="同城见面交易">同城见面交易</option>
                                                    <option value="其他原因">其他原因</option>
                                                </select>
                                            </div>
                                            <?php  if($order['paytype']!=3) { ?>
                                            <a class="btn btn-danger" href="<?php  echo mobileUrl('order/pay')?>&id=<?php  echo $order['id'];?>" data-nocache="true" >支付订单</a>
                                            <?php  } ?>
                                            <?php  } ?>

                                            <?php  if($order['canverify'] && $order['status']!=-1 && $order['status']!=0) { ?>
                                            <div class="btn btn-default btn-default-o order-verify" data-nocache="true" data-orderid="<?php  echo $order['id'];?>" data-verifytype="<?php  echo $order['verifytype'];?>" style="margin-left:.5rem;" >
                                                <i class="icon icon-qrcode"></i>
                                                <span><?php  if($order['dispatchtype']==1) { ?>我要取货<?php  } else { ?>我要使用<?php  } ?></span>
                                            </div>
                                            <?php  } ?>

                                            <?php  if($order['status']==3 || $order['status']==-1) { ?>
                                                <div class="btn btn-default btn-default-o order-delete" data-orderid="<?php  echo $order['id'];?>">删除订单</div>
                                            <?php  } ?>

                                  <!--          <?php  if(empty($trade['closecomment'])) { ?>
                                                <?php  if($order['status']==3 && $order['iscomment']==1) { ?>
                                                <a class="btn btn-default btn-default-o" data-nocache="true" href="<?php  echo mobileUrl('pc.order/comment')?>&id=<?php  echo $order['id'];?>">追加评价</a>
                                                <?php  } ?>
                                                <?php  if($order['status']==3 && $order['iscomment']==0) { ?>
                                                <a class="btn btn-default btn-default-o" data-nocache="true" href="<?php  echo mobileUrl('pc.order/comment')?>&id=<?php  echo $order['id'];?>">评价</a>
                                                <?php  } ?>
                                            <?php  } ?>-->
                                            <?php  if($order['status']==2) { ?>
                                            <div class="btn btn-default btn-default-o order-finish" data-orderid="<?php  echo $order['id'];?>">确认收货</div>
                                            <?php  } ?>
                                            <?php  if($order['canrefund']) { ?>
                                            <a class="btn btn-warning" data-nocache="true" href="<?php  echo mobileUrl('pc.order/refund')?>&id=<?php  echo $order['id'];?>"><?php  if($order['status']==1) { ?>申请退款<?php  } else { ?>申请售后<?php  } ?><?php  if($order['refundstate']>0) { ?>中<?php  } ?></a>
                                            <?php  } ?>
                                        <?php  } ?>
                                        </span>
                                    </div>
                                </div>
                            <?php  } } ?>
                        <?php  } ?>
                        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
                    </div>
                    <?php  if(com('verify')) { ?>
                    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('order/verify', TEMPLATE_INCLUDEPATH)) : (include template('order/verify', TEMPLATE_INCLUDEPATH));?>
                    <?php  } ?>
                </div>

            </div>
            <?php  echo $pager;?>
        </div>
        <script language='javascript'>require(['../addons/ewei_shopv2/plugin/pc/biz/order/list.js'], function (modal) {
            modal.init({fromDetail:false,status:"<?php  echo $_GPC['status'];?>",merchid:<?php  echo intval($_GPC['merchid'])?>});
        });</script>
    </div>
</div>

<script charset="utf-8" type="text/javascript" src="../addons/ewei_shopv2/plugin/pc/template/mobile/default/static/js/dcalendar.picker.js"></script>

<script type="text/javascript">
    $(function(){
        $('#query_start_date').dcalendarpicker({format:'yyyy-mm-dd'});
        $('#query_end_date').dcalendarpicker({format:'yyyy-mm-dd'});
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_footer', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_footer', TEMPLATE_INCLUDEPATH));?>
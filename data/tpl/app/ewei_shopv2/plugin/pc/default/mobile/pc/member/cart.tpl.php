<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_header', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_header', TEMPLATE_INCLUDEPATH));?>
<div class="ncm-container">
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH));?>
    <div class="right-layout">
        <div class="wrap">
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH));?>
            <div class=' member-cart-page fui-page'>
                <div class='fui-content navbar cart-list' style="bottom: 4.8rem">
                    <div class='content-empty' <?php  if(!empty($list)) { ?>style='display:none;'<?php  } ?>>
                        <i class='icon icon-cart'></i><br/>购物车空空如也~<br/>
                        <a href="<?php  echo mobileUrl('pc')?>" class='btn btn-default-o external'>主人快去给我找点东西吧</a>
                    </div>

                    <?php  if(count($list)>0) { ?>
                    <?php  if(($merch_plugin && $merch_data['is_openmerch'])) { ?>
                        <?php  if(is_array($merch)) { foreach($merch as $key => $list) { ?>
                            <div class="fui-list-group" id="container<?php  echo $key;?>">
                                <a class="fui-list"
                                   href="<?php  if(empty($merch_user[$key]['merchname'])) { ?><?php  echo mobileUrl('pc')?><?php  } else { ?><?php  echo mobileUrl('merch',array('merchid'=>$key))?><?php  } ?>">
                                    <div class="fui-list-inner">
                                        <div class="subtitle"><i
                                                    class="icon icon-shop"></i> <?php  if(empty($merch_user[$key]['merchname'])) { ?>自营商品<?php  } else { ?><?php  echo $merch_user[$key]['merchname'];?><?php  } ?>
                                        </div>
                                    </div>
                                    <div class="fui-list-angle">
                                        <div class="angle"></div>
                                    </div>
                                </a>
                                <?php  if(is_array($list)) { foreach($list as $g) { ?>
                                    <div class="fui-list goods-item align-start" data-cartid="<?php  echo $g['id'];?>"
                                         data-goodsid="<?php  echo $g['goodsid'];?>" data-optionid="<?php  echo $g['optionid'];?>">
                                        <div class="fui-list-media ">
                                            <input type="checkbox" name="checkbox"
                                                   class="fui-radio fui-radio-danger cartmode check-item"
                                                   <?php  if($g['selected']) { ?>checked<?php  } ?>/>
                                            <input type="checkbox" name="checkbox"
                                                   class="fui-radio fui-radio-danger editmode edit-item"/>
                                        </div>

                                        <div class="fui-list-media image-media">
                                            <a href="<?php  echo mobileUrl('pc.goods.detail',array('id'=>$g['goodsid']))?>">
                                                <img id="gimg_<?php  echo $g['id'];?>" src="<?php  echo tomedia($g['thumb'])?>"
                                                     class="round">
                                            </a>
                                        </div>
                                        <div class="fui-list-inner">
                                            <a href="<?php  echo mobileUrl('pc.goods.detail',array('id'=>$g['goodsid']))?>">
                                                <div class="text">
                                                    <?php  echo $g['title'];?>
                                                </div>
                                                <?php  if(!empty($g['optionid'])) { ?>
                                                    <div class="text cart-option cartmode">
                                                        <div class="choose-option"><?php  echo $g['optiontitle'];?></div>
                                                    </div>
                                                <?php  } ?>
                                            </a>
                                            <?php  if(!empty($g['optionid'])) { ?>
                                                <div class="text  cart-option  editmode">
                                                    <div class="choose-option"
                                                         data-optionid="<?php  echo $g['optionid'];?>"><?php  echo $g['optiontitle'];?></div>
                                                </div>
                                            <?php  } ?>

                                        </div>
                                        <div class='fui-list-angle'>
                                            <div class="price" style="color:#666;font-weight: 200;">￥<span
                                                        class='marketprice'
                                                        style="color:#666;font-weight: 200;"><?php  echo $g['marketprice'];?></span>
                                            </div>
                                        </div>
                                        <div class='fui-list-angle' style="margin-left: 25px">
                                            <div class="fui-number small "
                                                 data-value="<?php  echo $g['total'];?>"
                                                 data-max="<?php  echo intval($g['totalmaxbuy'])?>"
                                                 data-min="<?php  echo intval($g['minbuy'])?>"
                                                 data-maxtoast="最多购买{max}<?php  echo $g['unit'];?>"
                                                 data-mintoast="{min}<?php  echo $g['unit'];?>起售">
                                                <div class="minus">-</div>
                                                <input class="num shownum" type="tel" name="" value="<?php  echo $g['total'];?>"/>
                                                <div class="plus ">+</div>
                                            </div>
                                        </div>
                                        <div class='fui-list-angle'
                                             style="color:#F60;font-weight: 600;margin-left: 10px">
                                            <div class="totalprice_e">￥<span
                                                        class='totalprice_er'><?php  echo $g['marketprice']*$g['total']?></span>
                                            </div>
                                        </div>
                                        <div class='fui-list-angle' style="margin-left: 30px">
                                            <div class="btn  btn-default-o btn-delete btn-sm ">删除</div>
                                        </div>
                                    </div>
                                <?php  } } ?>

                            </div>
                        <?php  } } ?>
                    <?php  } else { ?>
                        <div class="fui-list-group">

                            <?php  if(is_array($list)) { foreach($list as $g) { ?>
                                <div class="fui-list goods-item align-start"
                                     data-cartid="<?php  echo $g['id'];?>"
                                     data-goodsid="<?php  echo $g['goodsid'];?>"
                                     data-optionid="<?php  echo $g['optionid'];?>"
                                     data-seckill-maxbuy="<?php  echo $g['seckillmaxbuy'];?>"
                                     data-seckill-selfcount="<?php  echo $g['seckillselfcount'];?>"
                                     data-seckill-price="<?php  echo $g['seckillprice'];?>">
                                    <div class="fui-list-media ">
                                        <input type="checkbox" name="checkbox"
                                               class="fui-radio fui-radio-danger cartmode check-item"
                                               <?php  if($g['selected']==1) { ?>checked<?php  } ?>/>
                                        <input type="checkbox" name="checkbox"
                                               class="fui-radio fui-radio-danger editmode edit-item"/>
                                    </div>

                                    <div class="fui-list-media image-media">
                                        <a href="<?php  echo mobileUrl('pc/goods/detail')?>&id=<?php  echo $g['goodsid'];?>">
                                            <img id="gimg_<?php  echo $g['id'];?>" data-lazy="<?php  echo $g['thumb'];?>" class="round">
                                        </a>
                                    </div>
                                    <div class="fui-list-inner">
                                        <a href="<?php  echo mobileUrl('pc/goods/detail')?>&id=<?php  echo $g['goodsid'];?>">
                                            <div class="text">
                                                <?php  if($g['seckillprice']>0) { ?>
                                                    <div class="fui fui-label fui-label-danger"><?php  echo $g['seckilltag'];?></div>
                                                <?php  } ?>
                                                <?php  echo $g['title'];?>
                                            </div>
                                            <?php  if($g['optionid']) { ?>
                                                <div class="text cart-option cartmode">
                                                    <div class="choose-option"><?php  echo $g['optiontitle'];?></div>
                                                </div>
                                            <?php  } ?>
                                        </a>
                                        <?php  if($g['optionid']) { ?>
                                            <div class="text  cart-option  editmode">
                                                <div class="choose-option"
                                                     data-optionid="<?php  echo $g['optionid'];?>"><?php  echo $g['optiontitle'];?></div>
                                            </div>
                                        <?php  } ?>

                                    </div>
                                    <div class='fui-list-angle'>
                                        <span class="price">￥<span class='marketprice'><?php  echo $g['marketprice'];?></span></span>
                                        <div class="fui-number small "
                                             data-value="<?php  echo $g['total'];?>"
                                             data-max="<?php  echo $g['totalmaxbuy'];?>"
                                             data-min="<?php  echo $g['minbuy'];?>"
                                             data-maxtoast="最多购买{max}<?php  echo $g['unit'];?>"
                                             data-mintoast="{min}<?php  echo $g['unit'];?>起售">
                                            <div class="minus">-</div>
                                            <input class="num shownum" type="tel" name="" value="<?php  echo $g['total'];?>"/>
                                            <div class="plus ">+</div>
                                        </div>

                                    </div>
                                </div>
                            <?php  } } ?>

                        </div>
                    <?php  } ?>
                </div>
                <?php  } ?>
            </div>
            <?php  if(!empty($list)) { ?>
                <div class="fui-footer cartmode"
                     style="bottom: 2.4rem;position:relative;height:4rem;margin-top:0.8rem;border: 1px solid #D9D9D9;">
                    <div class="fui-list noclick">
                        <div class="fui-list-media">
                            <label class="checkbox-inline checkall">
                                <input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger " <?php  if($ischeckall) { ?>checked<?php  } ?>/>&nbsp;全选
                            </label>
                        </div>
                        <div class="fui-list-inner">
                            <div class='subtitle'>合计：<span class="text-danger">￥</span><span
                                        class='text-danger totalprice'><?php  echo number_format($totalprice,2)?></span>
                            </div>
                            <div class='text'>不含运费</div>
                        </div>
                        <div class='fui-list-angle'>
                            <div class="btn  btn-submit <?php  if($total<=0) { ?>btn-default disabled<?php  } else { ?>btn-danger<?php  } ?>"
                                 <?php  if($total<=0) { ?>stop="1"<?php  } ?>>结算(<span class='total'><?php  echo $total;?></span>)
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_footer', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_footer', TEMPLATE_INCLUDEPATH));?>


<script language='javascript'>require(['../addons/ewei_shopv2/plugin/pc/biz/member/cart.js'], function (modal) {
        modal.init();
    });</script>
</div>

<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_header', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_header', TEMPLATE_INCLUDEPATH));?>
<div class="ncm-container">
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH));?>

    <div class="right-layout">
        <div class="wrap">
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH));?>
            <div class='fui-page  fui-page-current member-cart-page' style="background-color: #ffffff;">

                <div class='fui-content' >
                    <?php  if(empty($list)) { ?>
                    <div class='content-empty' >
                        <i class='icon icon-like'></i><br/>您还没有浏览过任何商品，何不现在就去逛逛~<br/><a href="<?php  echo mobileUrl('pc')?>" class='btn btn-default-o external'>去逛逛吧~</a>
                    </div>
                    <?php  } else { ?>
                    <?php  if(is_array($list)) { foreach($list as $g) { ?>
                    <div class='fui-list-group container' >

                        <div class="fui-list-group-title text-cancel"><?php  echo $g['createtime'];?><div class="pull-right"><?php  echo $g['merchname'];?></div></div>
                        <div class="fui-list goods-item align-start" data-id="<?php  echo $g['id'];?>" data-goodsid="<?php  echo $g['goodsid'];?>">
                            <div class="fui-list-media editmode">
                                <input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger edit-item"/>
                            </div>

                            <div class="fui-list-media image-media">
                                <a href="<?php  echo mobileUrl('pc/goods/detail')?>&id=<?php  echo $g['goodsid'];?>">
                                    <img src="<?php  echo $g['thumb'];?>" class="round">
                                </a>
                            </div>
                            <div class="fui-list-inner">
                                <a href="<?php  echo mobileUrl('pc/goods/detail')?>&id=<?php  echo $g['goodsid'];?>">
                                    <div class="text">
                                        <?php  echo $g['title'];?>
                                    </div>
                                </a>
                                <div class="text">
                                    <span class="text-danger">
                                    ￥<?php  echo $g['marketprice'];?>
                                        <?php  if($g['productprice'] > 0) { ?>

                                    </span>
                                    <span class='oldprice'>￥<?php  echo $g['productprice'];?></span>
                                    <?php  } ?>
                                </div>

                            </div>
                        </div>

                    </div>
                    <?php  } } ?>
                    <?php  } ?>
                </div>
                <?php  if(!empty($list)) { ?>
                <div class="fui-footer editmode" style="position:relative;">
                    <div class="fui-list noclick">
                        <div class="fui-list-media">
                            <label class="checkbox-inline editcheckall"><input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger " />&nbsp;全选</label>
                        </div>

                        <div class='fui-list-angle'>
                            <div class="btn  btn-danger-o btn-delete  disabled">删除</div>
                        </div>
                    </div>
                </div>
                <div class="btn  btn-danger-o btn-edit" >编辑</div>
                <?php  echo $pager;?>
                <?php  } ?>

                <script language='javascript'>require(['../addons/ewei_shopv2/plugin/pc/biz/member/history.js'], function (modal) {
                    modal.init();
                });</script>
            </div>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_footer', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_footer', TEMPLATE_INCLUDEPATH));?>

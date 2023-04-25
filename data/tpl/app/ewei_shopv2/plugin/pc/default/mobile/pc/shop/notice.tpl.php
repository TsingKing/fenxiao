<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_header', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_header', TEMPLATE_INCLUDEPATH));?>
<div class="ncm-container">
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH));?>
    <div class="right-layout">
        <div class="wrap">
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH));?>
            <div class='fui-page  fui-page-current member-log-page' style="background-color:#ffffff;">


                <div class='fui-content navbar' >



                    <?php  if(empty($list)) { ?>

                    <div class='content-empty' >

                        <i class='icon icon-searchlist'></i><br/>暂时没有任何记录!

                    </div>

                    <?php  } else { ?>
                    <?php  $i=($pindex-1)*$psize+1;?>
                    <?php  if(is_array($list)) { foreach($list as $log) { ?>
                    <div class='fui-list-group container'>
                        <a href="<?php  echo mobileUrl('pc.shop.notice.detail',array('id'=>$log['id'],'mk'=>'detail'))?>">
                        <div class="fui-list goods-item">
                            <div class="fui-list-inner">
                                <div class='title'>
                                    <?php  echo $i;?>、<?php  echo $log['title'];?>
                                </div>
                            </div>

                            <div class='fui-list-angle' style="width: 12rem">
                                <div class='text'><?php  echo $log['createtime'];?></div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <?php  $i++?>

                    <?php  } } ?>

                    <?php  } ?>
                    <?php  echo $pager;?>
                </div>
        </div>
    </div>
</div>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_footer', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_footer', TEMPLATE_INCLUDEPATH));?>
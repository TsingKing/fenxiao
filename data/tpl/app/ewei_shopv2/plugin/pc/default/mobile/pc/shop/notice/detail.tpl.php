<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_header', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .nch-article-con {
        background: #FFF;
        display: block;
        padding: 19px;
        border: 1px solid #E6E6E6;
        margin-bottom: 10px;
        overflow: hidden;
    }
    .nch-article-con h1 {
        font: 600 16px/32px "microsoft yahei";
        color: #3d3f3e;
        text-align: center;
    }
    .nch-article-con h2 {
        color: #9a9a9a;
        font-size: 12px;
        padding: 5px 0 20px;
        margin-bottom: 20px;
        font-weight: normal;
        text-align: center;
        border-bottom: 1px solid #d2d2d2;
    }
    .nch-article-con .default p {
        display: block;
        clear: both;
        padding: 5px;
    }
    .more_article {
        border-top: 1px solid #d2d2d2;
        padding: 10px 0 0 20px;
        margin-top: 10px;
        overflow: hidden;
    }
    .more_article span {
        color: #3f3f3f;
        font-weight: normal;
        margin-bottom: 10px;
    }
    .fl {
        float: left;
        display: inline;
    }
    .more_article span a {
        color: #006bcd;
        text-decoration: none;
    }
    .more_article time {
        font-size: 11px;
        color: #999;
        padding-left: 20px;
    }
    .fr {
        float: right !important;
        display: inline;
    }
</style>
<div class="ncm-container">
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/left-layout', TEMPLATE_INCLUDEPATH));?>
    <div class="right-layout">
        <div class="wrap">
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/member/tabmenu', TEMPLATE_INCLUDEPATH));?>

            <div class="nch-article-con">
                <h1><?php  echo $notice['title'];?></h1>
                <h2><?php  echo date('Y-m-d H:i',$notice['createtime'])?></h2>
                <div class="default">
                    <?php  echo $notice['detail'];?>
                </div>
                <div class="more_article">
                    <?php  if(!empty($pre)) { ?>
                    <span class="fl">上一篇：
                        <a href="<?php  echo mobileUrl('pc.shop.notice.detail',array('id'=>$pre['id'],'mk'=>'detail'))?>"><?php  echo $pre['title'];?></a> <time><?php  echo date('Y-m-d H:i',$pre['createtime'])?></time>
                    </span>
                    <?php  } ?>
                    <?php  if(!empty($next)) { ?>
                    <span class="fr">下一篇：
                        <a href="<?php  echo mobileUrl('pc.shop.notice.detail',array('id'=>$next['id'],'mk'=>'detail'))?>"><?php  echo $next['title'];?></a> <time><?php  echo date('Y-m-d H:i',$next['createtime'])?></time>
                    </span>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('pc/layout/_footer', TEMPLATE_INCLUDEPATH)) : (include template('pc/layout/_footer', TEMPLATE_INCLUDEPATH));?>
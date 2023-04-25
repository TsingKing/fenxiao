<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>
    .fui-tab.fui-tab-primary a.active {color: <?php  echo $set['maincolor'];?>; border-color: <?php  echo $set['maincolor'];?>;}
</style>

<div class='fui-page fui-page-current'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $set['textsign'];?>排行</div>
        <div class="fui-header-right">
            <a href="<?php  echo mobileUrl()?>" class="external">
                <i class="icon icon-home"></i>
            </a>
        </div>
    </div>
    <div class='fui-content navbar'>
        <div class="fui-tab fui-tab-primary">
            <a data-type="orderday" class="active">连续<?php  echo $set['textsign'];?>排行</a>
            <a data-type="sum">总<?php  echo $set['textsign'];?>排行</a>
        </div>
        <div class="content-empty" style="display: none; margin: 0; padding: 0; position: relative;">
            <i class="icon icon-information"></i>
            <center style="color: #888">未找到任何记录~</center>
        </div>

        <div class="fui-list-group noborder nomargin container" style="display: none"></div>
    </div>

    <script type="text/html" id="record_tpl">
        <%each list as item index%>
        <div class="fui-list">
            <div class="fui-list-media">
                <img src="<%item.avatar%>" style="border-radius: 2.5rem;">
                <div class="badge" style="background: <?php  echo $set['maincolor'];?>"><%num+index%></div>
            </div>
            <div class="fui-list-inner">
                <div class="title"><%item.nickname%></div>
                <div class="text">当前<%if item.type=='sum'%>总<?php  echo $set['textsign'];?><%item.sum%>天<%/if%><%if item.type=='orderday'%>连续<?php  echo $set['textsign'];?><%item.orderday%>天<%/if%></div>
            </div>
            <div class="fui-list-angle"></div>
        </div>
        <%/each%>
    </script>


    <script language='javascript'>
        require(['../addons/ewei_shopv2/plugin/sign/static/js/rank.js'], function (modal) {modal.init();});
    </script>
</div>
<?php  $this->footerMenus(null, false, $texts)?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--NDAwMDA5NzgyNw==-->
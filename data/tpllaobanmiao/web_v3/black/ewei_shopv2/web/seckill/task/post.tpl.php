<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>专题
        <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['title'];?>】<?php  } ?></small></span>
</div>

<div class="page-content">
    <div class="page-sub-toolbar">
        <span class=''>
            <?php if(cv('seckill.task.add')) { ?>
                <a class="btn btn-primary btn-sm" href="<?php  echo webUrl('seckill/task/add')?>">添加新专题</a>
            <?php  } ?>
            <?php  if(!empty($item['id'])) { ?>
                <?php if(cv('seckill.room')) { ?>
                <a class="btn btn-success btn-sm" href="<?php  echo webUrl('seckill/room',array('taskid'=>$item['id']))?>">会场管理</a>
                <?php  } ?>
            <?php  } ?>
        </span>
    </div>
<form <?php if( ce('seckill.task' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate " enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>"/>

<div class="">
    <div class="form-group-title">
        专题信息
    </div>
    <div class="">
        <div class="form-group">
            <label class="col-lg control-label must">专题名称</label>
            <div class="col-sm-9 col-xs-12 ">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <input type="text" name="title" class="form-control" value="<?php  echo $item['title'];?>"
                       data-rule-required="true" />
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['title'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">标签</label>
            <div class="col-sm-9 col-xs-12 ">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <input type="text" name="tag" class="form-control" value="<?php  echo $item['tag'];?>"/>
                <span class="help-block">显示在首页橱窗头部，和商品详情页面</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['tag'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">分类</label>
            <div class="col-sm-9 col-xs-12 ">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <select class="form-control" name="cateid">
                    <option value=""></option>
                    <?php  if(is_array($category)) { foreach($category as $k => $v) { ?>
                    <option value="<?php  echo $k;?>" <?php  if($item['cateid']==$k) { ?>selected<?php  } ?>><?php  echo $v['name'];?></option>
                    <?php  } } ?>
                </select>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $category[$item['cateid']]['name'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">秒杀点</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <?php  for($i=0;$i<=23;$i++) { ?>
                <label class="checkbox-inline" style="width:60px">
                    <input type="checkbox" name="times[]" value="<?php  echo $i;?>" <?php  if(in_array($i, $alltimes)) { ?>checked<?php  } ?> /><?php  echo $i;?>点
                </label>
                <?php  } ?>
                <?php  } else { ?>
                <div class='form-control-static'>
                    <?php  for($i=0;$i<=23;$i++) {?>
                    <?php  if(in_array($i, $alltimes)) { ?><?php  echo $i;?>点;<?php  } ?>
                    <?php  } ?>
                </div>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label">自动取消</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <input type="text" name="closesec" class="form-control" value="<?php echo $item['closesec']<=0?'120':$item['closesec']?>"/>
                <span class="help-block">抢购成功，不付款多少秒之后，自动取消资格，默认120秒(2分钟)</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php echo $item['closesec']<=0?'120':$item['closesec']?>s</div>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label">状态</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <label class='radio-inline'>
                    <input type='radio' name='enabled' value=1' <?php  if($item['enabled']==1) { ?>checked<?php  } ?> /> 启用
                </label>
                <label class='radio-inline'>
                    <input type='radio' name='enabled' value=0' <?php  if($item['enabled']==0) { ?>checked<?php  } ?> /> 禁用
                </label>
                <span class="help-block">设置禁用，不出现在搜索列表</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if(empty($item['enabled'])) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>

    </div>
</div>





<div class="">
    <div class="form-group-title">
        分享及标题设置
    </div>
    <div class="">
        <div class="form-group">
            <label class="col-lg control-label">页面标题</label>
            <div class="col-sm-9 col-xs-12 ">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <input type="text" name="page_title" class="form-control" value="<?php  echo $item['page_title'];?>"
                       data-rule-required="true"/>
                <span class="help-block">专题专题的页面标题 ,默认为 专题标题</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['page_title'];?></div>
                <?php  } ?>
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg control-label">分享标题</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <input type="text" name="share_title" id="share_title" class="form-control" value="<?php  echo $item['share_title'];?>" />
                <span class='help-block'>如果不填写，默认为页面标题</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['share_title'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">分享图标</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <?php  echo tpl_form_field_image2('share_icon', $item['share_icon'])?>
                <?php  } else { ?>
                <?php  if(!empty($item['share_icon'])) { ?>
                <a href='<?php  echo tomedia($item['share_icon'])?>' target='_blank'>
                <img src="<?php  echo tomedia($item['share_icon'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                </a>
                <?php  } ?>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">分享描述</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.task' ,$item) ) { ?>
                <textarea name="share_desc" class="form-control" rows="5"><?php  echo $item['share_desc'];?></textarea>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['share_desc'];?></div>
                <?php  } ?>
            </div>
        </div>


    </div>
</div>

<div class="form-group">
    <label class="col-sm-1 control-label"></label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('seckill.task' ,$item) ) { ?>
        <input type="submit" value="提交" class="btn btn-primary"/>
        <?php  } ?>
        <input type="button" name="back" onclick='history.back()' <?php if(cv('seckill.task')) { ?>style='margin-left:10px;'<?php  } ?>value="返回列表" class="btn btn-default" />
    </div>
</div>

</form>
</div>

<script language='javascript'>
    function formcheck() {
        if ($("#advname").isEmpty()) {
            Tip.focus("advname", "请填写专题名称!");
            return false;
        }
        return true;
    }
    $(function(){
        require(['jquery.ui'],function(){
            //$(".ui-sortable").sortable();
        })
        $('#btn-add-time').click(function(){

            var time = $('#select-times').val();
            $('#time-' + time).show();
            $(':hidden[name="timeopen['+time+']"]').val(1);
            $('#times').show();

        });
        $('.btn-delete-time').click(function(){
            var time = $(this).data('time');
            $('#time-' + time).hide();
            $(':hidden[name="timeopen['+time+']"]').val(0);
            var has = false;
            for(var i=0;i<=23;i++){
                if( $(':hidden[name="timeopen['+i+']"]').val()=='1'){
                    has =true;
                    break;
                }
            }
            if(!has){
                $('#times').hide();
            }


        })

    })
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--OTEzNzAyMDIzNTAzMjQyOTE0-->
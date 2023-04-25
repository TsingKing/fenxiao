<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading"> 
	<span class='pull-right'>
		<?php if(cv('seckill.room.add')) { ?>
			<a class="btn btn-primary btn-sm" href="<?php  echo webUrl('seckill/room/add')?>">添加会场</a>
		<?php  } ?>
		<a class="btn btn-default  btn-sm" href="<?php  echo webUrl('seckill/room')?>">返回列表</a>
	</span>
    <h2><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>会场
        <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['title'];?>】<?php  } ?>  <?php  if(!empty($task)) { ?>所属专题: [<?php  echo $task['id'];?>]-<?php  echo $task['title'];?><?php  } ?></small>
    </h2>
</div>

<form <?php if( ce('seckill.room' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>"/>
<input type="hidden" name="taskid" value="<?php  echo $_GPC['taskid'];?>"/>
<div class="panel panel-default">
    <div class="panel-heading">
        会场信息
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label must">会场名称</label>
            <div class="col-sm-9 col-xs-12 ">
                <?php if( ce('seckill.room' ,$item) ) { ?>
                <input type="text" name="title" class="form-control" value="<?php  echo $item['title'];?>"
                       data-rule-required="true" />
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['title'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">标签</label>
            <div class="col-sm-9 col-xs-12 ">
                <?php if( ce('seckill.room' ,$item) ) { ?>
                <input type="text" name="tag" class="form-control" value="<?php  echo $item['tag'];?>"/>
                <span class="help-block">显示在首页橱窗头部，和商品详情页面，如果不填写默认为专题的标签</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['tag'];?></div>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">过期抢购</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.room' ,$item) ) { ?>
                <label class='radio-inline'>
                    <input type='radio' name='oldshow' value='0' <?php  if($item['oldshow']==0) { ?>checked<?php  } ?> /> 不允许
                </label>
                <label class='radio-inline'>
                    <input type='radio' name='oldshow' value='1' <?php  if($item['oldshow']==1) { ?>checked<?php  } ?> /> 允许
                </label>
                <span class="help-block">是否允许已经过期的时间段继续抢购</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if(empty($item['enabled'])) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>

        <?php  if($pages) { ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">自定义页面</label>
            <div class="col-sm-9 col-xs-12">
                <select class="form-control" name="diypage">
                <option value="">系统默认</option>
                <?php  if(is_array($pages)) { foreach($pages as $p) { ?>
                <option value="<?php  echo $p['id'];?>" <?php  if($item['diypage']==$p['id']) { ?>selected="selected"<?php  } ?>><?php  echo $p['name'];?></option>
                <?php  } } ?>
                </select>
                <span class="help-block">选择系统默认，系统会读取店铺装修中页面设置的“整点秒杀”设置</span>
            </div>

        </div>
        <?php  } ?>

        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.room' ,$item) ) { ?>
                <label class='radio-inline'>
                    <input type='radio' name='enabled' value=1' <?php  if($item['enabled']==1) { ?>checked<?php  } ?> /> 启用
                </label>
                <label class='radio-inline'>
                    <input type='radio' name='enabled' value=0' <?php  if($item['enabled']==0) { ?>checked<?php  } ?> /> 禁用
                </label>
                <span class="help-block">设置禁用，不出现在秒杀专题中</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if(empty($item['enabled'])) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>

    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
            <div class="pull-right" style="padding:0;margin:0;margin-top:-8px;">
                <select class="form-control" id="select-times" style="display:inline-block;width:100px;">
                    <?php  if(is_array($times)) { foreach($times as $time) { ?>
                    <option value="<?php  echo $time['time'];?>"><?php  echo $time['time'];?>点</option>
                    <?php  } } ?>
                </select>
                <button type="button" class="btn btn-warning" id="btn-add-time" style="margin-top:-5px;">添加时间段</button>
            </div>
        时间段及商品 <small class="text text-danger" >选择时间段后设置商品</small>
    </div>
    <div class="panel-body">
        <div id="times" class="panel panel-default" <?php  if(empty($roomtimes)) { ?>style="display: none"<?php  } ?>>
            <div class="panel-body">
                <div class="form-group" style="border-bottom:1px solid #f2f2f2;">
                    <label class="col-sm-1 control-label" >时间</label>
                    <div class="col-sm-9">
                        <div class="form-control-static" ><b>商品信息</b>(拖动商品可排序)</div>
                    </div>
                    <div class="col-sm-2">
                        <b>操作</b>
                        </div>
                 </div>

                <?php  if(is_array($times)) { foreach($times as $time) { ?>

                   <input type="hidden" name="timeopen[<?php  echo $time['time'];?>]" value="<?php  if(!in_array($time['time'], $roomtimes)) { ?>0<?php  } else { ?>1<?php  } ?>" />
                    <div class="form-group" style="border-bottom:1px solid #f2f2f2; <?php  if(!in_array($time['time'], $roomtimes)) { ?>display: none<?php  } ?>" id="time-<?php  echo $time['time'];?>">
                        <label class="col-sm-1 control-label"><?php  echo $time['time'];?>点</label>
                        <div class="col-sm-9">
                            <?php  echo tpl_selector_new('goodsid_'.$time['time'],array(
                            'preview'=>true,
                            'readonly'=>true,
                            'selectorid'=>'time-'.$time['time'],
                            'multi'=>1,
                            'type'=>'product',
                            'value'=>$package_goods['title'],
                            'url'=>webUrl('seckill/room/querygoods'),
                            'optionurl'=>'seckill.room.queryoption',
                            'items'=>$time['goods'],
                            'nokeywords'=>1,
                            'autosearch'=>1,
                            'buttontext'=>'选择商品',
                            'placeholder'=>'请选择商品')
                            )
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger  btn-sm btn-delete-time" data-time="<?php  echo $time['time'];?>" >删除</button>
                        </div>
                    </div>
                <?php  } } ?>
        </div>
    </div>
    </div>

</div>



<div class="panel panel-default">
    <div class="panel-heading">
        会场分享及标题设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">会场页面标题</label>
            <div class="col-sm-9 col-xs-12 ">
                <?php if( ce('seckill.room' ,$item) ) { ?>
                <input type="text" name="page_title" class="form-control" value="<?php  echo $item['page_title'];?>"
                       data-rule-required="true"/>
                    <span class="help-block">会场的页面标题 ,默认为 会场名称</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['page_title'];?></div>
                <?php  } ?>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">会场分享标题</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.room' ,$item) ) { ?>
                <input type="text" name="share_title" id="share_title" class="form-control" value="<?php  echo $item['share_title'];?>" />
                <span class='help-block'>如果不填写，默认为会场页面标题</span>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['share_title'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">会场分享图标</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.room' ,$item) ) { ?>
                <?php  echo tpl_form_field_image('share_icon', $item['share_icon'])?>
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
            <label class="col-sm-2 control-label">会场分享描述</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('seckill.room' ,$item) ) { ?>
                <textarea name="share_desc" class="form-control" ><?php  echo $item['share_desc'];?></textarea>
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
        <?php if( ce('seckill.room' ,$item) ) { ?>
        <input type="submit" value="提交" class="btn btn-primary"/>
        <?php  } ?>
        <input type="button" name="back" onclick='history.back()' <?php if(cv('seckill.room')) { ?>style='margin-left:10px;'<?php  } ?>value="返回列表" class="btn btn-default" />
    </div>
</div>

</form>


<script language='javascript'>

    $(function(){
        require(['jquery.ui'],function(){
            $(".ui-sortable").sortable();
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

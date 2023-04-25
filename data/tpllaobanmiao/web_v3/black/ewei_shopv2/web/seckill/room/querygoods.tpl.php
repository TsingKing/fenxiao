<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
    .popover{z-index:10000;}
    .alert{margin-top:10px;}
</style>
<div style='max-height:500px;overflow:auto;min-width:850px;'>
    <table class="table">
        <thead>
        <tr>
            <td>商品</td>
            <td style="width:100px;text-align: center;">商品价格</td>
            <td style="width:100px;text-align: center;">库存</td>
            <th style="width:100px;text-align: center;">操作</th>
        </tr>
        </thead>
        <tbody id="param-items" class="ui-sortable">
        <?php  if(is_array($ds)) { foreach($ds as $row) { ?>
        <tr>
            <td>
                <img src="<?php  echo tomedia($row['thumb'])?>" style='width:30px;height:30px;padding1px;border:1px solid #ccc' /> <?php  echo $row['title'];?>
            </td>
            <td style="text-align: right;">&yen;<?php  echo $row['marketprice'];?></td>
            <td style="text-align: right;"><?php  echo $row['total'];?></td>
            <td style="text-align: center;">
                <?php  if($row['bargain']) { ?>
                <span class="label label-danger"><i class="fa fa-remove"></i> 砍价商品</span>
                <br/>
                <a href="<?php  echo webUrl('bargain')?>" class="btn btn-default btn-sm" target="_blank">去取消</a>
                <?php  } else { ?>
                <a href="javascript:;" class="label label-primary" onclick='biz.selector_new.set(this, <?php  echo json_encode($row);?>)'>选择</a>
                <?php  } ?>
            </td>
        </tr>
        <?php  } } ?>
        <?php  if(count($ds)<=0) { ?>
        <tr>
            <td colspan='4' align='center'>未找到商品</td>
        </tr>
        <?php  } ?>
        </tbody>
    </table>
    <div style="text-align:right;width:100%;">
        <?php  echo $pager;?>
    </div>
</div>
<script type="text/javascript">
    require(['bootstrap'], function ($) {
        $('[data-toggle="tooltip"]').tooltip({
            container: $(document.body)
        });
        $('[data-toggle="popover"]').popover({
            container: $(document.body)
        });
    });
    //分页函数
    var type = '';
    function select_page(url,pindex,obj) {

        if(pindex==''||pindex==0){
            return;
        }
        var keyword = $.trim($(".modal").find(':input').val());

        $.ajax({
            url:"<?php  echo webUrl('seckill/room/querygoods')?>",
            type:'get',
            data:{title:keyword,page:pindex,psize:10},
            async : false, //默认为true 异步
            success:function(data){
                $(".content").html(data);
            }
        });
    }

</script>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+454mI5p2D5omA5pyJ-->
<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
    .modal-dialog{width:920px;}
    .modal-dialog .input-group-addon{
        padding:0;
    }
    .modal-dialog .fa{
        margin-right: 0;
    }
</style>
<div class="content_hasoption content-option-<?php  echo $selectorid;?>">
    <!--<form class="form-horizontal form-validate" action="<?php  echo webUrl('sale/package/hasoption')?>" method="post" enctype="multipart/form-data">-->
        <input type='hidden' name='pid' value='<?php  echo $pid;?>' />
        <input type='hidden' name='goodsid' value='<?php  echo $goodsid;?>' />

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close hasoption-close" type="button">×</button>
                    <h4 class="modal-title">设置</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="width:100%;">
                        <thead>
                        <tr>
                            <th style=""><?php  if($option) { ?>规格<?php  } else { ?>商品<?php  } ?>名称</th>
                            <th style="width:90px;">原价</th>
                            <th style="width:90px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">秒杀价格</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_price_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_price');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>秒杀价格<?php  } ?>
                            </th>
                            <?php  if($commission_level && $goods['nocommission'] == 0) { ?>
                            <th style="width:90px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">一级分销</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_commission1_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_commission1');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>一级分销<?php  } ?>
                            </th>
                            <?php  if($commission_level > 1) { ?>
                            <th style="width:90px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">二级分销</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_commission2_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_commission2');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>二级分销<?php  } ?>
                            </th>
                            <?php  } ?>
                            <?php  if($commission_level > 2) { ?>
                            <th style="width:90px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">三级分销</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_commission3_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_commission3');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>三级分销<?php  } ?>
                            </th>
                            <?php  } ?>
                            <?php  } ?>
                            <th style="width:90px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">库存</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_total_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_total');"></a>
                                    </span>
                                </div>
                              <?php  } else { ?>
                                库存
                                <?php  } ?>

                            </th>
                            <th style="width:90px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">限购</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_maxbuy_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_maxbuy');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>
                                限购
                                <?php  } ?>

                            </th>
                            <?php  if($option) { ?>
                            <th style="width:50px;text-align: right;">全选 <input type='checkbox' /></th>
                            <?php  } ?>
                        </tr>
                        </thead>
                        <tbody id="param-items" class="ui-sortable">
                        <?php  if($option) { ?>
                        <?php  if(is_array($option)) { foreach($option as $item) { ?>
                        <tr class="multi-product-item option-item" data-id="<?php  echo $item['id'];?>">
                            <td><?php  echo $item['title'];?></td>
                            <td>&yen;<?php  echo $item['marketprice'];?></td>
                            <td style="">
                                <input name="option_price_<?php  echo $item['id'];?>" type="text" class="form-control option_price option_price_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['packageprice'];?>">
                            </td>
                            <?php  if($commission_level && $goods['nocommission'] == 0) { ?>
                            <td style="">
                                <input name="option_commission1_<?php  echo $item['id'];?>" type="text" class="form-control option_commission1 option_commission1_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['commission1'];?>">
                            </td>
                            <?php  if($commission_level > 1) { ?>
                            <td style="">
                                <input name="option_commission2_<?php  echo $item['id'];?>" type="text" class="form-control option_commission2 option_commission2_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['commission2'];?>">
                            </td>
                            <?php  } ?>
                            <?php  if($commission_level > 2) { ?>
                            <td style="">
                                <input name="option_commission3_<?php  echo $item['id'];?>" type="text" class="form-control option_commission3 option_commission3_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['commission3'];?>">
                            </td>
                            <?php  } ?>
                            <?php  } ?>

                            <td style="">
                            <input name="option_total_<?php  echo $item['id'];?>" type="text" class="form-control option_total option_total_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['total'];?>">
                        </td>

                            <td style="">
                                <input name="option_maxbuy_<?php  echo $item['id'];?>" type="text" class="form-control option_maxbuy option_maxbuy_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['total'];?>">
                            </td>

                            <td style="text-align: right;"><input type='checkbox' name="optionid" <?php  if($item['isoption']) { ?>checked<?php  } ?> value="<?php  echo $item['id'];?>"/></td>
                        </tr>
                        <?php  } } ?>

                        <tr class="multi-product-item">
                            <td colspan="<?php  echo 3 + $commission_level?>"><span class="text text-danger">总限购表示： 每人可以抢购同一商品不同规格总共多少件 填写空或0，不限购</span></td>
                            <td style="">总限购</td>
                            <td style="">
                                <input name="option_totalmaxbuy" type="text" class="form-control option_totalmaxbuy" placeholder="0" value="<?php  echo $option[0]['totalmaxbuy'];?>">
                            </td>

                            <td style="text-align: right;"> </td>
                        </tr>


                        <?php  } else { ?>
                            <tr class="multi-product-item goods-item" data-id="<?php  echo $item['id'];?>">
                                <td><?php  echo $packgoods['title'];?></td>
                                <td>&yen;<?php  echo $packgoods['marketprice'];?></td>
                                <td style="">
                                    <input name="package_goods_price<?php  echo $goodsid;?>" type="text" class="form-control package_goods_price<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['packageprice'];?>">
                                    <input type="hidden" name="package_goods" data-goodsid="<?php  echo $goodsid;?>" data-id="<?php  echo $packgoods['id'];?>">
                                </td>
                                <?php  if($commission_level && $goods['nocommission'] == 0) { ?>
                                <td style="">
                                    <input name="package_goods_commission1<?php  echo $goodsid;?>" type="text" class="form-control package_goods_commission1<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['commission1'];?>">
                                </td>
                                <?php  if($commission_level > 1) { ?>
                                <td style="">
                                    <input name="package_goods_commission2<?php  echo $goodsid;?>" type="text" class="form-control package_goods_commission2<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['commission2'];?>">
                                </td>
                                <?php  } ?>
                                <?php  if($commission_level > 2) { ?>
                                <td style="">
                                    <input name="package_goods_commission3<?php  echo $goodsid;?>" type="text" class="form-control package_goods_commission3<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['commission3'];?>">
                                </td>
                                <?php  } ?>
                                <?php  } ?>

                                <td style="">
                                    <input name="package_goods_total_<?php  echo $goodsid;?>" type="text" class="form-control package_goods_total<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['total'];?>">
                                </td>

                                <td style="">
                                    <input name="package_goods_maxbuy_<?php  echo $goodsid;?>" type="text" class="form-control package_goods_maxbuy<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['maxbuy'];?>">
                                </td>



                            </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="option_submit">确认</button>
                    <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                </div>
            </div>
    <!--</form>-->

</div>

<script type="text/javascript">
    $(function(){
        var container = $('.content-option-<?php  echo $selectorid;?>');
        $(".option-item input[name=optionid]",container).removeProp('checked');
        var hasoption =<?php  echo $hasoption;?>;
        var optionid = $("#<?php  echo $selectorid;?>packagegoods<?php  echo $goodsid;?>").val();
         if(hasoption && optionid){
            var opArray = optionid.split(",");



            $(opArray).each(function(index){
                var specs = $("input[name='<?php  echo $selectorid;?>packagegoodsoption"+this+"']").val();
                if(specs){
                    var specsArray = specs.split(",");
                    $(".option_price_"+this+"",container).val(specsArray[0]);
                    $(".option_commission1_"+this+"",container).val(specsArray[1]);
                    $(".option_commission2_"+this+"",container).val(specsArray[2]);
                    $(".option_commission3_"+this+"",container).val(specsArray[3]);
                    $(".option_total_"+this+"",container).val(specsArray[4]);
                    $(".option_maxbuy_"+this+"",container).val(specsArray[5]);

                    $(".option_totalmaxbuy",container).val( specsArray[6]);

                }

            });
        }else{
            var pgoods = $("input[name='<?php  echo $selectorid;?>packgoods"+<?php  echo $goodsid;?>+"']").val();

            if(pgoods){
                var pgoodsArray = pgoods.split(",");
                $(".package_goods_price"+<?php  echo $goodsid;?>+"",container).val(pgoodsArray[0]);
                $(".package_goods_commission1"+<?php  echo $goodsid;?>+"",container).val(pgoodsArray[1]);
                $(".package_goods_commission2"+<?php  echo $goodsid;?>+"",container).val(pgoodsArray[2]);
                $(".package_goods_commission3"+<?php  echo $goodsid;?>+"",container).val(pgoodsArray[3]);
                $(".package_goods_total"+<?php  echo $goodsid;?>+"",container).val(pgoodsArray[4]);
                $(".package_goods_maxbuy"+<?php  echo $goodsid;?>+"",container).val(pgoodsArray[5]);
            }
        };

        $(".option-item",container).each(function(){
            if(optionid.indexOf($(this).find("input[name=optionid]",container).val()) >= 0){
                $(this).find("input[name=optionid]",container).prop('checked','true');
            }
        })
        //是否有规格提交
        $("#option_submit ",container).on("click",function(){
            var option = [];
            var optoinhtml = '';
            var packagegoods = [];
            var packageprice = 0;
            var commission1 = 0;
            var commission2 = 0;
            var commission3 = 0;
            var ok =true;
            if(hasoption ){
                if( $("#param-items .option-item",container).find(':checkbox:checked').length <=0){
                    tip.msgbox.err('没有选中任何规格参与秒杀');
                    return;
                }
            }
            $("#param-items .option-item",container).each(function (index) {
                if($(this).find("input[name='optionid']",container).prop("checked")){

                    option[index] = $(this).find("input[name='optionid']").val();
                    packageprice = $(this).find("input[name^='option_price']").val() ? parseFloat($(this).find("input[name^='option_price']").val()) : 0;
                    commission1 = $(this).find("input[name^='option_commission1']").val() ? parseFloat($(this).find("input[name^='option_commission1']").val()) : 0;
                    commission2 = $(this).find("input[name^='option_commission2']").val() ? parseFloat($(this).find("input[name^='option_commission2']").val()) : 0;
                    commission3 = $(this).find("input[name^='option_commission3']").val() ? parseFloat($(this).find("input[name^='option_commission3']").val()) : 0;
                    total = $(this).find("input[name^='option_total']").val() ? parseFloat($(this).find("input[name^='option_total']").val()) : 0;
                    if( isNaN(total) || total<=0){
                        ok = false;
                        $(this).find("input[name^='option_total']").focus();
                        tip.msgbox.err('请设置库存');
                        return false;
                    }

                    maxbuy = $(this).find("input[name^='option_maxbuy']").val() ? parseFloat($(this).find("input[name^='option_maxbuy']").val()) : 0;
                    totalmaxbuy = $('.option_totalmaxbuy').val();
                    packagegoods[index] = [packageprice,commission1,commission2,commission3,total,maxbuy,totalmaxbuy];
                    optoinhtml += '<input type="hidden" value="'+packagegoods[index]+'" name="<?php  echo $selectorid;?>packagegoodsoption'+option[index]+'" >';
                }
            })
            if(!ok){
                return;
            }
            ok = true;

            if(option.length > 0){
                $.ajax({
                    url:"<?php  echo webUrl('seckill/room/option',array('type'=>'option'))?>",
                    type:'get',
                    data:{option:option},
                    dataType:'json',
                    async : false, //默认为true 异步
                    success:function(data){
                        $("#<?php  echo $selectorid;?>packagegoods"+<?php  echo $goodsid;?>+"").val(option);
                        if(!data.result.title){
                            $("#<?php  echo $selectorid;?>optiontitle"+<?php  echo $goodsid;?>+"").html("设置");
                        }else{
                            $("#<?php  echo $selectorid;?>optiontitle"+<?php  echo $goodsid;?>+"").html(""+data.result.title+"...");
                            var $objOption = $("#<?php  echo $selectorid;?>packagegoods"+<?php  echo $goodsid;?>+"").nextAll();
                            if($objOption){
                                $objOption.remove();
                            }
                            $("#<?php  echo $selectorid;?>packagegoods"+<?php  echo $goodsid;?>+"").after(optoinhtml)
                        }

                    }
                });
            }else{
                //无规格提交
                var goodsid = $("input[name='package_goods']",container).attr("data-goodsid");
                var price = $("input[name='package_goods_price"+goodsid+"']",container).val();
                var commission1 = $("input[name='package_goods_commission1"+goodsid+"']",container).val();
                var commission2 = $("input[name='package_goods_commission2"+goodsid+"']",container).val();
                var commission3 = $("input[name='package_goods_commission3"+goodsid+"']",container).val();
                var total  = $("input[name='package_goods_total_"+goodsid+"']",container).val();

                if( isNaN(total) || total<=0){
                    $("input[name='package_goods_total_"+goodsid+"']",container).focus();
                    tip.msgbox.err('请设置库存');
                    return;
                }

                var maxbuy  = $("input[name='package_goods_maxbuy_"+goodsid+"']",container).val();


                var packagegoods = [price,commission1,commission2,commission3,total,maxbuy,maxbuy];

                var packagegoodshtml = '<input type="hidden" value="'+packagegoods+'" name="<?php  echo $selectorid;?>packgoods'+<?php  echo $goodsid;?>+'" >';
                if($("input[name='<?php  echo $selectorid;?>packgoods"+goodsid+"']").val()){
                    $("input[name='<?php  echo $selectorid;?>packgoods"+goodsid+"']").remove();
                    $("#<?php  echo $selectorid;?>optiontitle"+goodsid+"").after(packagegoodshtml)
                }else{
                    $("#<?php  echo $selectorid;?>optiontitle"+goodsid+"").after(packagegoodshtml)
                }
                $("#<?php  echo $selectorid;?>optiontitle"+goodsid+"").html("&yen;"+price);
            }
            if(ok) {
                //关闭弹窗
                $('.hasoption-close', container).trigger('click');
            }
        })
    })
    function setCol(cls){
        var container = $('.content-option-<?php  echo $selectorid;?>');
        $("."+cls,container).val( $("."+cls+"_all").val());
    }

</script>




<!--OTEzNzAyMDIzNTAzMjQyOTE0-->
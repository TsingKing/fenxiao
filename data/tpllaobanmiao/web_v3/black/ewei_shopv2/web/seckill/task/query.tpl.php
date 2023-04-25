<?php defined('IN_IA') or exit('Access Denied');?><div style='max-height:500px;overflow:auto;min-width:850px;'>
    <table class="table table-hover" style="min-width:850px;">
        <tbody>
        <?php  if(is_array($ds)) { foreach($ds as $row) { ?>
        <tr>
            <td>     <?php  if($row['usedDate']) { ?>
                <span class="label label-primary"><?php  echo $row['usedDate'];?></span>

                <?php  if($row['usedDate']==date('Y-m-d')) { ?>
                <span class="label label-danger">当前秒杀</span>
                <?php  } ?>
                <br/>
                <?php  } ?>

                <?php  echo $row['title'];?></td>

            <td>
                <?php  echo $row['roomcount'];?>
            </td>
            <td style="width:80px;">
                <?php  if($_GPC['queryfrom']=='diy') { ?>
                <a href="javascript:;" onclick='biz.selector.set(this,<?php  echo json_encode($row);?>)'>选择</a>
                <?php  } else { ?>
                <a href="javascript:;" onclick='biz.selector_open.set(this,<?php  echo json_encode($row);?>)'>选择</a>
                <?php  } ?>
            </td>
        </tr>
        <?php  } } ?>
        <?php  if(count($ds)<=0) { ?>
        <tr>
            <td colspan='4' align='center'>未找到秒杀</td>
        </tr>
        <?php  } ?>
        </tbody>
    </table>
</div>

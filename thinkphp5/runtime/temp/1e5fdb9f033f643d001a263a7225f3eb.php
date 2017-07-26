<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp64\www\tp5\public/../application/index\view\cart\ajax_cart_list.html";i:1501074093;}*/ ?>
 <?php if(empty($cartList)): ?>         
     <p style="text-align:center"><a href="/"><img src="/static/index/images/null_cart2.jpg"  /></a></p>
     <script>
	    $(".sc-acti-list,.sc-pro-list").hide();
     </script>
 <?php endif; ?> 

<div class="sc-pro-list">
  <table width="100%" border="0" cellspacing="0" cellpadding="1">
      <tr class="ba-co-danhui">
        <th class="pa-le-9" align="center" valign="middle">&nbsp;&nbsp;</th>
        <th align="center" valign="middle" colspan="2">商品</th>
        <th align="center" valign="middle">市场价（元）</th>                        
        <th align="center" valign="middle">单价（元）</th>
        <?php if(($user['discount'] != 1) and ($user[discount] != null)): ?>
	        <th align="center" valign="middle">会员折扣价</th>        
        <?php endif; ?>
        <th align="center" valign="middle">数量</th>
        <th align="center" valign="middle">小计（元）</th>
        <th align="center" valign="middle">操作</th>
      </tr>            
     
     <?php foreach($cartList as $k=>$v): ?>
      <tr>
        <td class="pa-le-9" style="border-right:0" align="center" valign="middle">    
            <input type="checkbox"  name="cart_select[<?php echo $v['id']; ?>]" <?php if($v['selected'] == 1): ?>checked="checked"<?php endif; ?> value="1" onclick="ajax_cart_list();" />
        </td>
        <td style="border-left:0px;;border-right:0px" class="pa-to-20 pa-bo-20 bo-ri-0" width="80px" align="center" valign="top" valign="middle">
            <a class="gwc-wp-list di-bl wi63 hi63" href="<?php echo url('Index/Goods/goodsInfo',array('id'=>$v['goods_id'])); ?>">
                <img class="wi63 hi63" src="<?php echo goods_thum_images($v['goods_id'],78,78); ?>">
            </a>
        </td>
        <td style="border-left:0px; border-right:0px"  class="pa-to-20 wi516"align="left"  valign="top" valign="middle">
            <p class="gwc-ys-pp">
                <a href="<?php echo url('Index/Goods/goodsInfo',array('id'=>$v['goods_id'])); ?>" style="vertical-align:middle"><?php echo $v['goods_name']; ?></a>                
                <!-- 团购<if condition="$v[activity_type] eq 2"><img  width="80" height="60" src="/public/images/groupby2.jpg" style="vertical-align:middle"></if>
                抢购<if condition="$v[activity_type] eq 1"><img  width="40" height="40" src="/public/images/qianggou2.jpg" style="vertical-align:middle"></if> -->
            </p>
            <p class="ggwc-ys-hs"><?php echo $v['spec_key_name']; ?></p>
        </td>
        <td style="border-left:0px" align="center" valign="middle"><span>￥<?php echo $v['market_price']; ?></span></td>                        
        <td style="border-left:0px" align="center" valign="middle"><span>￥<?php echo $v['goods_price']; ?></span></td>
        <?php if(($user['discount'] != 1) and ($user['discount'] != null)): ?>
        <td style="border-left:0px" align="center" valign="middle"><span>￥<?php echo $v['member_goods_price']; ?></span></td>        
        <?php endif; ?>        
        <td align="center" valign="middle">
            <div class="sc-stock-area">
                <div class="stock-area">                            
                    <a onClick="switch_num(-1,<?php echo $v['id']; ?>,<?php echo $v['store_count']; ?>);" title="减">-</a>
                    <input class="wi43 fl" type="text" value="<?php echo $v['goods_num']; ?>" name="goods_num[<?php echo $v['id']; ?>]" id="goods_num[<?php echo $v['id']; ?>]" readonly="" />
                    <a onClick="switch_num(1,<?php echo $v['id']; ?>,<?php echo $v['store_count']; ?>);" title="加">+</a>                            
                </div>
            </div>
        </td>
        <td align="center" valign="middle">￥<?php echo $v['goods_fee']; ?></td>
        <td align="center" valign="middle"><a  class="gwc-gb" href="javascript:void(0);" onclick="ajax_del_cart(<?php echo $v['id']; ?>);"></a></td>
      </tr>
    <?php endforeach; ?>      
    </table>
</div>
<div class="sc-total-list ma-to-20 sc-pro-list">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="pa-le-28 gwx-xm-dwz">
            <label >
            
            </label>
            <a href="javascript:void(0);" onclick="del_cart_more();">删除选中商品</a>
        </td>
        <td width="190" align="right">总计金额：</td>
        <td width="69" align="right">￥<?php echo $total_price['total_fee']; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <!-- <td id="bo-to-dedede" width="190" align="right">共节省：</td>
        <td id="bo-to-dedede" width="69" align="right">￥<?php echo $total_price['cut_fee']; ?></td> -->
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td id="bo-to-dedede" width="190" align="right">合计（不含运费）：</td>
        <td id="bo-to-dedede" width="69" align="right"><em>￥<?php echo $total_price['total_fee']; ?></em></td>
        <td>&nbsp;</td>
      </tr>
    </table>
</div>
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\orderdin\order_xiu.html";i:1501074664;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/static/admin/css1/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/static/admin/js1/jquery.js"></script>
<script src="/static/admin/js1/jquery.mCustomScrollbar.concat.min.js"></script>
<script>

	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>
<!--header-->
<header>
 <h1><img src="/static/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="#" class="admin_icon"><?php echo $data; ?></a></li>
  <li><a href="login.html" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="index.html">起始页</a></h2>
 <ul>
   <?php if($role == 1 || $role == 0): ?>
  <li>
   <dl>
    <dt>商品信息</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/admin/product/product_list" >商品列表</a></dd>
    <dd><a href="/admin/product/product_detail">添加商品</a></dd>
   </dl>
  </li>
  <?php else: endif; if($role == 2 || $role == 0): ?>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="/admin/orderdin/order_list">订单列表</a></dd>
   </dl>
  </li>
  <?php else: endif; if($role == 0): ?>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="/admin/user/user_list">会员列表</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>管理员管理</dt>
    <dd><a href="/admin/user/user_list">管理员列表</a></dd>
    <dd><a href="/admin/adminuser/admin_detail">添加管理员</a></dd>
   </dl>
  </li>
  <?php else: endif; ?>
  
  <li>
   <p class="btm_infor">© DeathGhost.cn 版权所有</p>
  </li>
 </ul>
</aside>

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">订单详情示例</h2>
      </div>
     
      <table class="table">
     <?php foreach($dii as $vall): ?>
      <form action="xiuga?id=<?php echo $vall['order_id']; ?>" method="post">
       <tr>
        <td>收件人：<input type="text" name="name" value="<?php echo $vall['consignee']; ?>"></td>
        <td>联系电话：<input type="text" name="model" value="<?php echo $vall['mobile']; ?>"></td>
        <td>收件地址：<input type="text" name="dizhi" value="<?php echo $vall['address']; ?>"></td>
        <td><?php if(!empty($vall['shipping_time'])): ?>
        发货时间：<?php echo date("Y-m-d H:i",$vall['shipping_time']); else: ?>发货时间：---
        <?php endif; ?>
        </td>
       </tr>
       <tr>
        <td>下单时间：<?php echo date("Y-m-d H:i",$vall['add_time']); ?></td>
        <td><?php if(!empty($vall['pay_time'])): ?>
        付款时间：<?php echo date("Y-m-d H:i",$vall['pay_time']); else: ?>付款时间：---
        <?php endif; ?>
        </td>
        <td><?php if(!empty($vall['confirm_time'])): ?>
        确认时间：<?php echo date("Y-m-d H:i",$vall['confirm_time']); else: ?>确认时间：---
        <?php endif; ?>
        </td>
        <td>评价时间时间：---</td>
       </tr>
       <tr>
        <td>订单状态：<a><?php if($vall['pay_status'] == 0): ?>待付款
        <?php else: ?>已付款,
        <?php endif; if($vall['shipping_status'] == 0): ?>未发货
        <?php else: if($vall['shipping_status'] == 1): ?>已发货
        <?php else: ?>确认收货
        <?php endif; endif; ?>
        </a></td>
        <td colspan="3">订单备注：<mark><?php echo $vall['user_note']; ?></mark></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <table class="table">
       <?php foreach($dina as $valll): ?>
       <tr>
        <td><?php echo $valll['goods_name']; ?></td>
        <td class="center"><?php echo $valll['goods_sn']; ?></td>
        <td class="center"><strong class="rmb_icon"><?php echo $valll['goods_price']; ?></strong></td>
        <td class="center">
         <p><?php echo $valll['spec_key_name']; ?></p>
        </td>
        <td class="center"><strong><?php echo $valll['goods_num']; ?></strong></td>
        <td class="center"><strong class="rmb_icon"><?php echo $valll['goods_price'] * $valll['goods_num']; ?></strong></td>
        <td class="center">
        <?php foreach($dii as $valee): if($valee['shipping_status'] == 0): ?>未发货
        <?php else: ?>已发货
        <?php endif; endforeach; ?>
        </td>
        </tr> 
        <?php endforeach; ?>
      </table>
 
      <aside class="mtb" style="text-align:right;">
       <input type="submit" value="修改订单" class="group_btn"/>
        <input type="button" value="确认发货" class="group_btn"/>
      </aside>
      </form>
 </div>
</section>
</body>
</html>

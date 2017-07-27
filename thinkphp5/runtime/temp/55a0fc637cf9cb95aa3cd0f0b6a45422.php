<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\orderdin\order_list.html";i:1501145789;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/static/admin/css1/style.css">
   <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
  <li><a href="#" class="admin_icon"><?php echo $dat; ?></a></li>
  <li><a href="login.html" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="/admin/index/index">起始页</a></h2>
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
       <h2 class="fl">订单列表示例</h2>
      </div>
      <section class="mtb">
       <select class="select" id="dai">
        <option >订单状态</option>
        <option value="2">待付款</option>
        <option value="3">待发货</option>
        <option value="4">已发货</option>
        <option value="5">完成订单</option>
       </select>
       <input type="text" id="cha" class="textbox textbox_225" placeholder="输入订单编号或收件人姓名/电话..."/>
       <input type="button" id="chaxun" value="查询" class="group_btn"/>
      </section>
      <table class="table">
       <tr>
        <th>订单编号</th>
        <th>收件人</th>
        <th>联系电话</th>
        <th>收件人地址</th>
        <th>订单金额</th>
        <th>配送方式</th>
        <th>操作</th>
       </tr>
       </table>
       <table class="table" id="userInfo">
       
      <?php foreach($data as $va): ?>
      <tr >
        <td ><?php echo $va['order_sn']; ?></td>
        <td><?php echo $va['consignee']; ?></td>
        <td><?php echo $va['mobile']; ?></td>
        <td>
         <address><?php echo $va['address']; ?></address>
        </td>
        <td class="center"><strong class="rmb_icon"><?php echo $va['goods_price']; ?></strong></td>
        <td class="center"><?php echo $va['shipping_name']; ?></td>
        <td class="center">
         <a href="order_detail?id=<?php echo $va['order_id']; ?>" id="loading" title="查看订单" class="link_icon" >&#118;</a>
         <a href="deleDe?id=<?php echo $va['order_id']; ?>" title="删除" class="link_icon">&#100;</a>
        </td>
       </tr>
       
       <?php endforeach; ?>
      </table>
      <div class='paging' id='indicator'>
  <?php echo $page; ?>
  </div>
      
 </div>
</section>
</body>
 <script src="/static/jquery.min.js"></script>
   
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>

  <script>
  $('#dai').change(  
  function(){
    var id = $(this).val();
    $.post(
      'daiFu',
      {id:id},
      function success(data)
      { 
         $('#userInfo').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['pay_name'];
           
          $("#userInfo").append("<tr><td>"+data[i]['order_sn']+"</td><td>"+data[i]['consignee']+"</td><td>"+data[i]['mobile']+"</td><td>"+data[i]['address']+"</td><td>"+data[i]['goods_price']+"</td><td>"+data[i]['shipping_name']+"</td><td class='center'><a href=order_detail?id="+data[i]['order_id']+" id='loading' title='查看订单' class='link_icon' >&#118;</a><a href='deleDe?id="+data[i]['order_id']+" title='删除' class='link_icon'>&#100;</a></td></tr>");
        }
      }    
    )
  }
);
  $('#chaxun').click(  
  function(){
    var chaa = $('#cha').val();
    $.post(
      'chazha',
      {chaa:chaa},
      function success(data)
      { 
         $('#userInfo').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['pay_name'];
           
          $("#userInfo").append("<tr><td>"+data[i]['order_sn']+"</td><td>"+data[i]['consignee']+"</td><td>"+data[i]['mobile']+"</td><td>"+data[i]['address']+"</td><td>"+data[i]['goods_price']+"</td><td>"+data[i]['shipping_name']+"</td><td class='center'><a href=order_detail?id="+data[i]['order_id']+" id='loading' title='查看订单' class='link_icon' >&#118;</a><a href='deleDe?id="+data[i]['order_id']+" title='删除' class='link_icon'>&#100;</a></td></tr>");
        }
      }    
    )
  }
);

    </script>
    <script>
     $(document).ready(function(){
    $("#loading").click(function(){
      $(".loading_area").fadeIn();
             $(".loading_area").fadeOut(24000);
      });
     });
     </script>
     <section class="loading_area">
      <div class="loading_cont">
       <div class="loading_icon"><i></i><i></i><i></i><i></i><i></i></div>
       <div class="loading_txt"><mark>数据正在加载，请稍后！</mark></div>
      </div>
     </section>
</html>

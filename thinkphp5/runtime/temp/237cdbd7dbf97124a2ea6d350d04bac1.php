<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\adminuser\user_rank.html";i:1501233703;}*/ ?>
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
    <dd><a href="/admin/adminuser/user_rank">管理员列表</a></dd>
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
       <h2 class="fl">管理员列表</h2>
      </div>
   
      <table class="table">
       <tr>
        <th>Id</th>
        <th>管理员账号</th>
        <th>管理员角色</th>
        <th>操作</th>
       </tr>
        <?php foreach($data as $vall): ?>
       <tr>
        <td class="center"><?php echo $vall['admin_id']; ?></td>
        <td class="center"><?php echo $vall['user_name']; ?></td>
        <td><?php if($vall['role_id'] == 0): ?>超级管理员
        <?php else: if($vall['role_id'] == 1): ?>商品管理员
        <?php else: ?>订单管理员
        <?php endif; endif; ?>
        </td>
        <td class="center">
        <?php if($vall['role_id'] == 0): else: ?>
         <a href="/admin/adminuser/aduser_detail?id=<?php echo $vall['admin_id']; ?>" title="编辑" class="link_icon">&#101;</a>
         <a href="admin_shan?id=<?php echo $vall['admin_id']; ?>" title="删除" class="link_icon">&#100;</a>
         <?php endif; ?>
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
</html>

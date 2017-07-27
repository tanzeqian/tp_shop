<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\adminuser\aduser_detail.html";i:1501075418;}*/ ?>
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
  <li><a href="#" class="admin_icon"><?php echo $daa; ?></a></li>
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
       <h2 class="fl">修改管理员</h2>
       <a href="adjust_funding.html" class="fr top_rt_btn money_icon">管理员列表</a>
      </div>
      <?php foreach($data as $va): ?>
    <form action="admin_xiu?id=<?php echo $va['admin_id']; ?>" method="post">

      <ul class="ulColumn2">
      
       <li>
        <span class="item_name" style="width:120px;">管理员账号：</span>
        <input type="text" class="textbox textbox_225" name="username" value="<?php echo $va['user_name']; ?>" placeholder="管理员账号..."/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">修改登录密码：</span>
        <input type="password" class="textbox textbox_225" name="password" value="<?php echo $va['password']; ?>" placeholder="管理员密码..."/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">管理员角色：</span>
        <select class="select" id="role" name="role">
         <option><?php if($va['role_id'] == 1): ?>商品管理员
          <?php else: ?>订单管理员
          <?php endif; ?>
         </option>
         <option value="1">商品管理员</option>
         <option value="2">订单管理员</option>
        </select>
       </li>
       <li>
        <span class="item_name" style="width:120px;">电子邮箱：</span>
        <input type="email" class="textbox textbox_225" name="email" value="<?php echo $va['email']; ?>" placeholder="电子邮件地址..."/>
       </li>  
       <?php endforeach; ?> 
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" value="修改"/>
       </li>
      </ul>
      </form>
 </div>
</section>
</body>
</html>

<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\user\user_detail.html";i:1500979954;}*/ ?>
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
  <li><a href="http://www.mycodes.net" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="#" class="admin_icon">DeathGhost</a></li>
  <li><a href="login.html" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="index.html">起始页</a></h2>
 <ul>
  <li>
   <dl>
    <dt>常用布局示例</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="product_list.html" >商品列表</a></dd>
    <dd><a href="product_detail.html">商品详情</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="/admin/orderdin/order_list">订单列表</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="user_list.html" >会员列表</a></dd>
    <dd><a href="user_detail.html" class="active">会员详情</a></dd>
    <dd><a href="user_rank.html">会员等级示例</a></dd>
    <dd><a href="adjust_funding.html">会员资金管理示例</a></dd>
   </dl>
  </li>
  
 
  
  <li>
   <p class="btm_infor">© DeathGhost.cn 版权所有</p>
  </li>
 </ul>
</aside>

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">会员详情</h2>
      </div>
      <?php foreach($tan as $vall): ?>
      <ul class="ulColumn2">
       <li >
        <span class="item_name" style="width:120px;">头像：</span>
        <?php if(!empty ($vall['head_pic'])): ?>
        <img src="<?php echo $vall['head_pic']; ?>" width="50" height="50">
        <?php else: ?>
        <img src="/static/admin/upload/user_002.png">
        <?php endif; ?>
       </li>
       <li>
        <span class="item_name" style="width:120px;">会员名称：</span>
        <input type="text" class="textbox textbox_225" value="<?php echo $vall['nickname']; ?>" placeholder="会员账号..."/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">登陆邮箱：</span>
        <input type="email" class="textbox textbox_225" value="<?php echo $vall['email']; ?>" placeholder="会员邮箱..."/>

       </li>
       <li>
        <span class="item_name" style="width:120px;">手机登录：</span>
        <input type="tel" class="textbox textbox_225" value="<?php echo $vall['mobile']; ?>" placeholder="手机号码..."/>

       </li>
       
       <li>
        <span class="item_name" style="width:120px;">收货详细地址：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo $vall['dizhi']; ?>" placeholder="详细地址..."/>
       </li>
       
       <li>
        <span class="item_name" style="width:120px;"></span>
        <?php if($vall['is_lock'] == 0): ?>
        <a class="button border-red" href="user_jinZhi?id=<?php echo $vall['user_id']; ?>" onclick="return del(1)"><span class="icon-trash-o"></span> 禁止登录</a>
        <?php else: ?>
        <a class="button border-red" href="user_jiechu?id=<?php echo $vall['user_id']; ?>" onclick="return del(1)"><span class="icon-trash-o"></span> 解除禁止</a>
        <?php endif; ?> 
       </li>
      </ul>
      <?php endforeach; ?>
 </div>
</section>
</body>
</html>

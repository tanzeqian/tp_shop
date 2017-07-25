<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\user\user_list.html";i:1500980383;}*/ ?>
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
  <li><a href="http://www.mycodes.net" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="#" class="clear_icon">清除缓存</a></li>
  <li><a href="#" class="admin_icon">DeathGhost</a></li>
  <li><a href="#" class="set_icon">账号设置</a></li>
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
    <dd><a href="/admin/product/product_list" >商品列表示例</a></dd>
    <dd><a href="product_detail.html">商品详情示例</a></dd>
    <dd><a href="recycle_bin.html">商品回收站示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="order_list.html">订单列表示例</a></dd>
    <dd><a href="order_detail.html">订单详情示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="user_list.html" class="active">会员列表</a></dd>
    <dd><a href="user_rank.html">会员等级示例</a></dd>
    <dd><a href="adjust_funding.html">会员资金管理示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>管理员设置</dt>
    <dd><a href="setting.html">站点基础设置示例</a></dd>
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
       <h2 class="fl">会员列表</h2>
       <a href="user_detail.html" class="fr top_rt_btn add_icon">添加新会员</a>
      </div>
      <section class="mtb">
       <input type="text" class="textbox textbox_225" placeholder="输入会员号/手机/电子邮件查询..."/>
       <input type="button" value="查询" class="group_btn"/>
      </section>
      <table class="table">

       <tr>
        <th>Id</th>
        <th>会员头像</th>
        <th>是否被冻结</th>
        <th>手机号码</th>
        <th>电子邮件</th>
        <th>验证</th>
        <th>第三方登录</th>
        <th>登录名称</th>
        <th>最后登录时间</th>
        <th>操作</th>
       </tr>
       <?php foreach($data as $va): ?>
       <tr>
        <td class="center"><?php echo $va['user_id']; ?></td>
        <td class="center">
        <?php if(!empty ($va['head_prc'])): ?>
        <img src="<?php echo $va['head_prc']; ?>" width="50" height="50"/>
        <?php else: ?>
        <img src="/static/admin/upload/user_002.png" width="50" height="50"/>
        <?php endif; ?>
        </td>
        <td><?php if($va['is_lock'] == 0): ?>否
        <?php else: ?>是
        <?php endif; ?></td>
        <td class="center"><?php echo $va['mobile']; ?></td>
        <td class="center"><?php echo $va['email']; ?></td>
        <td class="center"><a title="已验证" class="link_icon">&#89;</a></td>
        <td class="center"><?php echo $va['oauth']; ?></td>
        <td class="center">
         <strong><?php echo $va['nickname']; ?></strong>
        </td>
        <td class="center">
         <strong><?php echo date("Y-m-d H:i",$va['reg_time']); ?></strong>
        </td>
        <td class="center">
         <a href="user_detail?id=<?php echo $va['user_id']; ?>" title="编辑" class="link_icon">&#101;</a>
         <a href="user_shan?id=<?php echo $va['user_id']; ?>" title="删除" class="link_icon">&#100;</a>
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

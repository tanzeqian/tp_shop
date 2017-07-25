<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\orderdin\order_list.html";i:1500983420;}*/ ?>
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
 <h2><a href="/admin/index/index">起始页</a></h2>
 <ul>
  <li>
   <dl>
    <dt>常用布局示例</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/admin/product/product_list" >商品列表示例</a></dd>
    <dd><a href="/admin/product/product_detail">添加商品</a></dd>
    <dd><a href="recycle_bin.html">商品回收站示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="order_list.html" class="active">订单列表</a></dd>
    <dd><a href="order_detail.html" >订单详情示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="user_list.html">会员列表示例</a></dd>
    <dd><a href="user_detail.html">添加会员（详情）示例</a></dd>
    <dd><a href="user_rank.html">会员等级示例</a></dd>
    <dd><a href="adjust_funding.html">会员资金管理示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>基础设置</dt>
    <dd><a href="setting.html">站点基础设置示例</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>配送与支付设置</dt>
    <dd><a href="express_list.html">配送方式</a></dd>
    <dd><a href="pay_list.html">支付方式</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>在线统计</dt>
    <dd><a href="discharge_statistic.html">流量统计</a></dd>
    <dd><a href="sales_volume.html">销售额统计</a></dd>
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
       <h2 class="fl">订单列表示例</h2>
       <a class="fr top_rt_btn add_icon">添加商品</a>
      </div>
      <section class="mtb">
       <select class="select" id="dai">
        <option value="1">订单状态</option>
        <option value="2">待付款</option>
        <option value="3">待发货</option>
       </select>
       <input type="text" class="textbox textbox_225" placeholder="输入订单编号或收件人姓名/电话..."/>
       <input type="button" value="查询" class="group_btn"/>
      </section>
      <table class="table" id="userInfo">
       <tr>
        <th>订单编号</th>
        <th>收件人</th>
        <th>联系电话</th>
        <th>收件人地址</th>
        <th>订单金额</th>
        <th>配送方式</th>
        <th>操作</th>
       </tr>

      <?php foreach($data as $va): ?>
       <tr >
        <td class="center" style="width: 500px;"><?php echo $va['order_sn']; ?></td>
        <td><?php echo $va['consignee']; ?></td>
        <td><?php echo $va['mobile']; ?></td>
        <td>
         <address><?php echo $va['address']; ?></address>
        </td>
        <td class="center"><strong class="rmb_icon"><?php echo $va['goods_price']; ?></strong></td>
        <td class="center"><?php echo $va['shipping_name']; ?></td>
        <td class="center">
         <a href="order_detail?id=<?php echo $va['order_id']; ?>" title="查看订单" class="link_icon" >&#118;</a>
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
           
          $("#userInfo").append("<tr><td>"+data[i]['order_sn']+"</td><td>"+data[i]['consignee']+"</td><td>"+data[i]['mobile']+"</td><td>"+data[i]['address']+"</td><td>"+data[i]['goods_price']+"</td><td>"+data[i]['shipping_name']+"</td><td class='center'><a href=order_detail?id="+data[i]['order_id']+" title='查看订单' class='link_icon' >&#118;</a><a href='deleDe?id="+data[i]['order_id']+" title='删除' class='link_icon'>&#100;</a></td></tr>");
        }
      }    
    )
  }
);

    </script>
</html>

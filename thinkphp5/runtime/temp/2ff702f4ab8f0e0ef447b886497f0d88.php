<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\product\product_list.html";i:1501233759;}*/ ?>
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
  <li><a href="http://www.tpshop.com/admin/user/login" class="quit_icon">安全退出</a></li>
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
       <h2 class="fl">商品列表</h2>
       <a href="product_detail.html" class="fr top_rt_btn add_icon">添加商品</a>
      </div>
      <form action="doLogin"  method="post">
      <section class="mtb">
       <select class="select" id="frn">
        <option>下拉菜单</option>
        <?php foreach($fen as $valaa): ?>
         <option value="<?php echo $valaa['id']; ?>"><?php echo $valaa['name']; ?></option>
        <?php endforeach; ?>
       </select>
       <input type="text" id="cha" class="textbox textbox_225" placeholder="输入产品关键词或产品货号..."/>
       <input type="button" value="查询" id="chaxun" class="group_btn"/>
      </section>
      </form>
      <table class="table">
       <tr>
        <th>缩略图</th>
        <th>产品名称</th>
        <th>货号</th>
        <th>单价</th>
        <th>上架</th>
        <th>精品</th>
        <th>新品</th>
        <th>热销</th>
        <th>库存</th>
        <th>操作</th>
       </tr>
       </table>
       <table class="table" id="userInfo">
       <?php foreach($data as $vall): ?>
       <tr>
        <td class="center"><img src="<?php echo $vall['original_img']; ?>" width="50" height="50"/></td>
        <td><?php echo $vall['goods_name']; ?></td>
        <td class="center"><?php echo $vall['goods_sn']; ?></td>
        <td class="center"><strong class="rmb_icon"><?php echo $vall['shop_price']; ?></strong></td>
        <?php if($vall['is_on_sale'] == 1): ?>
        <td class="center"><a href="/admin/product/shangJia?id=<?php echo $vall['goods_id']; ?>" title="是" class="link_icon">&#89;</td>
        <?php else: ?>
        <td class="center"><a href="/admin/product/xiaJia?id=<?php echo $vall['goods_id']; ?>" title="否" class="link_icon">&#88;</a></td>
        <?php endif; if($vall['is_recommend'] == 1): ?>
        <td class="center"><a title="是" class="link_icon">&#89;</a></td>
        <?php else: ?>
        <td class="center"><a title="否" class="link_icon">&#88;</a></td>
        <?php endif; if($vall['is_new'] == 1): ?>
        <td class="center"><a title="是" class="link_icon">&#89;</a></td>
        <?php else: ?>
         <td class="center"><a title="否" class="link_icon">&#88;</a></td>
         <?php endif; if($vall['is_hot'] == 1): ?>
        <td class="center"><a title="是" class="link_icon">&#89;</td>
        <?php else: ?>
        <td class="center"><a title="否" class="link_icon">&#88;</a></td>
        <?php endif; ?>
        <td class="center"><?php echo $vall['store_count']; ?></td>
        <td class="center">
         <a href="http://www.mycodes.net" title="预览" class="link_icon" target="_blank">&#118;</a>
         <a href="product_shan?id=<?php echo $vall['goods_id']; ?>" title="删除" class="link_icon">&#100;</a>
        </td>
       </tr>    
       <?php endforeach; ?>       
      </table>
      <?php if(!empty($data)): ?>
<tr><?php echo $page; ?></tr>
<?php else: endif; ?>
</section>
</body>
<script src="/static/jquery.min.js"></script>
   
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
<script>
  $('#frn').change(  
  function(){
    var id = $(this).val();
    $.post(
      'fenFen',
      {id:id},
      function success(data)
      { 
        $('#userInfo').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['pay_name'];          
          $("#userInfo").append("<tr><td class='center'><img src="+data[i]['original_img']+" width='50' height='50'></td><td>"+data[i]['goods_name']+"</td><td class='center'>"+data[i]['goods_sn']+"</td><td class='center'><strong class='rmb_icon'>"+data[i]['shop_price']+"</strong></td><?php if("+data[0]['is_on_sale'] == 1+"): ?><td class='center'><a href=/admin/product/shangJia?id="+data[0]['goods_id']+" title='是' class='link_icon'>&#89;</td><?php else: ?><td class='center'><a href=/admin/product/xiaJia?id="+data[0]['goods_id']+" title='否' class='link_icon'>&#88;</a></td><?php endif; if("+data[i]['is_recommend'] == 1+"): ?><td class='center'><a title='是' class='link_icon'>&#89;</a></td><?php else: ?><td class='center'><a title='否' class='link_icon'>&#88;</a></td><?php endif; if("+data[i]['is_new'] == 1+"): ?><td class='center'><a title='是' class='link_icon'>&#89;</a></td><?php else: ?><td class='center'><a title='否' class='link_icon'>&#88;</a></td><?php endif; if("+data[i]['is_hot'] == 1+"): ?><td class='center'><a title='是' class='link_icon'>&#89;</td><?php else: ?><td class='center'><a title='否' class='link_icon'>&#88;</a></td><?php endif; ?><td class='center'>"+data[i]['store_count']+"</td><td class='center'><a href='' title='预览' class='link_icon' target='_blank'>&#118;</a><a href='' title='删除' class='link_icon'>&#100;</a></td></tr>");
        }
      }    
    )
  }
);
$('#chaxun').click(  
  function(){
    var chaa= $('#cha').val();
    $.post(
      'chazha',
      {chaa:chaa},
      function success(data)
      { 
        $('#userInfo').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['pay_name'];          
          $("#userInfo").append("<tr><td class='center'><img src="+data[i]['original_img']+" width='50' height='50'></td><td>"+data[i]['goods_name']+"</td><td class='center'>"+data[i]['goods_sn']+"</td><td class='center'><strong class='rmb_icon'>"+data[i]['shop_price']+"</strong></td><?php if("+data[0]['is_on_sale'] == 1+"): ?><td class='center'><a href=/admin/product/shangJia?id="+data[0]['goods_id']+" title='是' class='link_icon'>&#89;</td><?php else: ?><td class='center'><a href=/admin/product/xiaJia?id="+data[0]['goods_id']+" title='否' class='link_icon'>&#88;</a></td><?php endif; if("+data[i]['is_recommend'] == 1+"): ?><td class='center'><a title='是' class='link_icon'>&#89;</a></td><?php else: ?><td class='center'><a title='否' class='link_icon'>&#88;</a></td><?php endif; if("+data[i]['is_new'] == 1+"): ?><td class='center'><a title='是' class='link_icon'>&#89;</a></td><?php else: ?><td class='center'><a title='否' class='link_icon'>&#88;</a></td><?php endif; if("+data[i]['is_hot'] == 1+"): ?><td class='center'><a title='是' class='link_icon'>&#89;</td><?php else: ?><td class='center'><a title='否' class='link_icon'>&#88;</a></td><?php endif; ?><td class='center'>"+data[i]['store_count']+"</td><td class='center'><a href='' title='预览' class='link_icon' target='_blank'>&#118;</a><a href='' title='删除' class='link_icon'>&#100;</a></td></tr>");
        }
      }    
    )
  }
);
</script>
</html>

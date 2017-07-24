<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/admin\view\index\product_detail.html";i:1500871398;}*/ ?>
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
    <dd><a href="product_list.html" >商品列表</a></dd>
    <dd><a href="product_detail.html" class="active">添加商品</a></dd>
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
       <h2 class="fl">商品详情示例</h2>
       <a class="fr top_rt_btn">返回产品列表</a>
      </div>
     <section>
     <form action="shangchuan" method="post">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">商品名称：</span>
        <input type="text" class="textbox textbox_295" id= "ming" name="ming" placeholder="商品名称..."/>
        <!-- <span class="errorTips"></span> -->
       </li>
       <li>
        <span class="item_name" style="width:120px;">商品货号：</span>
        <input type="text" class="textbox" id="huohao" name="huohao" placeholder="商品货号..."/>
        <!-- <span class="errorTips"></span> -->
       </li>
       <li>
        <span class="item_name" style="width:120px;" >品牌：</span>
        <select class="select" id="pin" name="pin">
         <option >选择品牌</option>
        </select>
       <!--  <span class="errorTips"></span> -->
       </li>
       <li>
        <span class="item_name" style="width:120px;" >分类：</span>
        <select class="select" id="pagg">
        <option>选择产品分类</option>
        <?php foreach($data as $vall): ?>
         <option value="<?php echo $vall['id']; ?>"><?php echo $vall['name']; ?></option>
        <?php endforeach; ?>
        </select>
        <select class="select" id="pa">
         <option>选择产品分类</option>
        </select>
        <select class="select" id="pag" name="pag">
         <option>选择产品分类</option>
        </select>
        <!-- <span class="errorTips"></span> -->
       </li>
       <li>
        <span class="item_name" style="width:120px;" >商品属性：</span>
        <select class="select" id="shu" name="shu">
         <option>选择商品属性</option>
         <?php foreach($dat as $val): ?>
         <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
        <?php endforeach; ?>
        </select>
        <select class="select" id="shu1">
         <option>选择商品属性</option>
        </select>
        <select class="select" id="shu2">
         <option>选择商品属性</option>
        </select>
        <!-- <span class="errorTips"></span> -->
       </li>
        <li>
        <span class="item_name" style="width:120px;" >商品规格：</span>
        <select class="select" id="guige" name="guige">
         <option>选择商品规格</option>
         <?php foreach($dat as $val): ?>
         <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
        <?php endforeach; ?>
        </select>
        <select class="select" id="guige1">
         <option>选择商品规格</option>
        </select>
        <select class="select" id="guige2">
         <option>选择商品规格</option>
        </select>
        <!-- <span class="errorTips"></span> -->
       </li>
       <li>
        <span class="item_name" style="width:120px;" >库存：</span>
        <!-- <select class="select" id="guige1">
         <option>选择商品规格</option>
        </select> -->
        <input  class="select" type="text" name="kucun" id="kucun" value="">
        </li>
        <li>
        <span class="item_name" style="width:120px;" >市场价：</span>
        <input  class="select" type="text" name="shijia" id="shijia" value="">
         <span class="item_name" style="width:120px;" >本店价：</span>
        <input  class="select" type="text" name="benjia" id="benjia" value="">
        </li>
       <li>
        <span class="item_name" style="width:120px;">推荐：</span>
        <label class="single_selection"><input type="radio" name="name1" id="name1"/>是否精品</label>
       </li>
       <form action="upload" method="post" enctype="multipart/form-data">
       <li>
        <span class="item_name" style="width:120px;">上传图片：</span>
        <label class="uploadImg">
         <input type="file" name="image" id="image"/>
         <span>上传图片</span>
        </label>
       </li>
      </form>
       <li>
        <span class="item_name" style="width:120px;">产品详情：</span>
        <input  class="select" style="width:220px;" type="text" name="xiang" id="xiang" value="">
         <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn"/>
       </li>
       </form>
       </section>
 </div>
</section>

<script>

$('#pin').dblclick(  
  function(){
    var pin = $(this).val(); 
    $.post(
      'pinCha',
      {pin:pin},
      function success(data)
      { 
        //console.log($data);
        $('#pin').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['name'];
             var $cla = data[i]['id'];
            //console.log($claa);
          $("#pin").append("<option "+'value='+$cla+">"+ $claa +"</option>");

        }

      }    
    )
  }
);


$('#pagg').click(  
  function(){
    var pa = $(this).val(); 
    var testdiv = document.getElementById('pagg').value;
    //console.log(testdiv);
    $.post(
      'paCha',
      {pa:pa,testdiv:testdiv},
      function success(data)
      { 
         $('#pa').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['name'];
            var $cla = data[i]['id'];
           
          $("#pa").append("<option "+'value='+$cla+">"+ $claa +"</option>");
        }
         //console.log(data);
      }    
    )
  }
);
$('#pa').click(  
  function(){
    var pag = $(this).val(); 
    var testdiv = document.getElementById('pa').value;
    //console.log(testdiv);
    $.post(
      'ppCha',
      {pag:pag,testdiv:testdiv},
      function success(data)
      { 
      $('#pag').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['name'];
            var $cla = data[i]['id'];
          // console.log($claa);
          $("#pag").append("<option "+'value='+$cla+">"+ $claa +"</option>");
        }
         //console.log(data);
      }    
    )
  }
);

$('#shu').click(   
  function(){
    var testdiv = document.getElementById('shu').value;
    $.post(
      'guCha',
      {testdiv:testdiv},
      function success(data)
      { 
      $('#shu1').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['attr_name'];
            var $cla = data[i]['attr_id'];
          // console.log($claa);
          $("#shu1").append("<option "+'value='+$cla+">"+ $claa +"</option>");
        }
      }    
    )
  }
);
$('#shu1').click(   
  function(){
    var testdiv = document.getElementById('shu1').value;
    $.post(
      'guuCha',
      {testdiv:testdiv},
      function success(data)
      { 
      $('#shu2').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['attr_value'];
            var $cla = data[i]['goods_attr_id'];
           //console.log($claa);
          $("#shu2").append("<option "+'value='+$cla+">"+ $claa +"</option>");
        }

      }    
    )
  }
);
$('#guige').click(   
  function(){
    var testdiv = document.getElementById('guige').value;
    $.post(
      'guigeCha',
      {testdiv:testdiv},
      function success(data)
      { 
      $('#guige1').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['name'];
            var $cla = data[i]['id'];
           //console.log($claa);
          $("#guige1").append("<option "+'value='+$cla+">"+ $claa +"</option>");
        }

      }    
    )
  }
);
$('#guige1').click(   
  function(){
    var testdiv = document.getElementById('guige1').value;
    $.post(
      'guige1Cha',
      {testdiv:testdiv},
      function success(data)
      { 
      $('#guige2').empty();
        for (var i = 0; i < data.length; i++) {
            var $claa = data[i]['item'];
            var $cla = data[i]['id'];
           //console.log($claa);
          $("#guige2").append("<option "+'value='+$cla+">"+ $claa +"</option>");
        }

      }    
    )
  }
);

</script>
</body>
</html>

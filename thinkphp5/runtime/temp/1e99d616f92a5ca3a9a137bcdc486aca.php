<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\wamp64\www\pro\TP_shop\thinkphp5\public/../application/index\view\user\register.html";i:1500907976;}*/ ?>
<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/static/index/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/static/index/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/static/index/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/static/index/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/static/index/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/static/index/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
							
								<div class="am-tab-panel am-active">
				<form action="zhuLogin" method="post">			
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                				 </div>		
                 <div id="testdiv" style="color: red;font-size :small "></div>								
                			 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="设置密码">
                 			</div>		
                 <div id="testdiv1" style="color: red;font-size :small "></div>								
                		 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="" id="passwordRepeat" placeholder="确认密码">
                		 </div>	
                 	 <div id="testdiv2" style="color: red;font-size :small "></div>	
                 
                
                 <!-- 
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div> -->
										<div class="am-cf">
											<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">

										</div>

</form>
								</div>

						
								<div class="am-tab-panel">
					<form action="phoneLogin" method="post">
                 <div class="user-phone">
								    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                 </div>					
                  <div id="testdiv3" style="color: red;font-size :small "></div>														
										<div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="" id="code" placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);" id="btn">
												<span id="dyMobileButton">获取</span>
											</a>

										</div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pwd" id="pwd" placeholder="设置密码">
                 </div>		
                 <div id="testdiv4" style="color: red;font-size :small "></div>									
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pwdRepeat" id="pwdRepeat" placeholder="确认密码">
                 </div>	
                 <div id="testdiv5" style="color: red;font-size :small "></div>	
									
								 <!-- <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div> -->
										<div class="am-cf">
											<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
					</form>			
									<hr>
								</div>
					
								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>

							</div>
						</div>

				</div>
			</div>
			
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
							</p>
						</div>
					</div>
	</body>
<!--注册判断-->
<script>
$('#email').blur(	
	function(){
		var email = $(this).val();
		var testdiv = document.getElementById("testdiv");
		$.post(
			'goEmail',
			{email:email},
			function success(data)
			{
				testdiv.innerHTML=(data['msg']);
				//console.log(data);
			}
		)
	}
);
$('#password').blur(	
	function(){
		var password = $(this).val();
		var testdiv1 = document.getElementById("testdiv1");
		$.post(
			'pwdEmail',
			{password:password},
			function success(data)
			{
				testdiv1.innerHTML=(data['msg']);
				//console.log(data);
			}
		)
	}
);
$('#passwordRepeat').blur(	
	function(){
		var password = $('#password').val();
		var passwordRepeat = $(this).val();
		var testdiv2 = document.getElementById("testdiv2");
		$.post(
			'passwordRepeat',
			{passwordRepeat:passwordRepeat,password:password},
			function success(data)
			{
				testdiv2.innerHTML=(data['msg']);
				//console.log(data);
			}
		)
	}
);
$('#phone').blur(	
	function(){
		var phone = $(this).val();
		var testdiv3 = document.getElementById("testdiv3");
		$.post(
			'phoneRepeat',
			{phone:phone},
			function success(data)
			{
				testdiv3.innerHTML=(data['msg']);
				//console.log(data);
			}
		)
	}
);
$('#pwd').blur(	
	function(){
		var pwd = $(this).val();
		var testdiv4 = document.getElementById("testdiv4");
		$.post(
			'pwdDuan',
			{pwd:pwd},
			function success(data)
			{
				testdiv4.innerHTML=(data['msg']);
				//console.log(data);
			}
		)
	}
);
$('#pwdRepeat').blur(	
	function(){
		var pwd = $('#pwd').val();
		var pwdRepeat = $(this).val();
		//console.log(pwdRepeat);
		var testdiv5 = document.getElementById("testdiv5");
		$.post(
			'pwwdRepeat',
			{pwdRepeat:pwdRepeat,pwd:pwd},
			function success(data)
			{
				testdiv5.innerHTML=(data['msg']);
				//console.log(data);
			}
		)
	}
);
</script>
<!--短信验证-->
<script type="text/javascript"> 
	var oButton = document.getElementById('btn');
	oButton.onclick = function()
	{
		var phone = $('#phone').val();
		console.log(phone);
	$.post(
		'sendSMS',
		{phone:phone},
	);
		var time = 59;
		var _this = document.getElementById('dyMobileButton');
		//this.disabled = true;//禁止点击	
	var timer = setInterval(function(){
		_this.innerHTML = time+'秒';
		time--;
		if (0 == time) {
			clearInterval(timer);
			//this.disabled = false;
			_this.innerHTML ='获取';
		}
	},1000);
}
</script> 
</html>
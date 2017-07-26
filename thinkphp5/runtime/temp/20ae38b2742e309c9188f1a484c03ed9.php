<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\wamp64\www\tp5\public/../application/index\view\user\reg.html";i:1501069283;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
    <title>注册</title>
    
   
    <link href="/static/index/css/reg3.css" rel="stylesheet" />
 
    <script type="text/javascript" src="/static/js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/index/css/tpshop.css" />
	<script type="text/javascript" src="/static/js/layer/layer.js"></script><!--弹窗js 参考文档 http://layer.layui.com/-->    
    <script type="text/javascript" src="/static/js/global.js"></script>
</head>
<body>
    <div class="regcon">
        <a class="m-fnlogoa fn-fl" href=""><img src="<?php echo $tpshop_config['store_logo']; ?>"/></a><span class="m-fntit">欢迎注册</span>
        <div class="ui_tab">
            <ul class="ui_tab_nav regnav">
                
                <li class="no fn-fr loginbtn">我已注册，马上<a href="<?php echo url('Index/User/login'); ?>">登录></a></li>
            </ul>
            

<?php if(\think\Request::instance()->param('t') == ''): ?>
		<form id="reg_form2"  method="post" action="">
			<input type="hidden" name="scene" value="1">    
            <div class="ui_tab_content">
                <div class="m-fnbox ui_panel" style="display: block;">
                    <div class="fnlogin clearfix">
                    
                        <div class="line">
                            <label class="linel"><span class="dt">手机号码：</span></label>
                            <div class="liner">
                                <input type="text" class="inp fmobile J_cellphone" placeholder="请输入手机号码"  name="username" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" id="username" required=""/>
                            </div>
                        </div>
                        <div class="line">
                            <label class="linel"><span class="dt">图像验证码：</span></label>
                            <div class="liner">
                                <input type="text" class="inp imgcode J_imgcode" placeholder="图像验证码"  name="verify_code" required=""/>
                                <img width="100" height="35" src="/index.php/Index/User/verify/type/user_reg.html" id="reflsh_code2" class="po-ab to0">
                                    <a><img onclick="verify('reflsh_code2')" src="__STATIC__/images/chg_image.png" class="ma-le-210"></a>
                            </div>
                            <div id="show-voice" class="show-voice"></div>
                        </div>
                        <div class="line">
                            <label class="linel"><span class="dt">手机验证码：</span></label>
                            <div class="liner">
                                <input type="text" class="inp imgcode J_imgcode" placeholder="手机验证码" id="code" name="code" required=""/>                                
                                <button class="fn-fl icode" onclick="send_sms_reg_code()" type="button" id="count_down">发送</button>
                            </div>
                            <div id="show-voice" class="show-voice"></div>
                        </div>
                        <div class="line">
                            <label class="linel"><span class="dt">设置密码：</span></label>
                            <div class="liner">
                                <input type="password" class="inp fpass J_password" placeholder="6-16位大小写英文字母、数字或符号的组合" autocomplete="off" maxlength="16"  id="password" name="password" value="" required=""/>
                            </div>
                        </div>
                        <div class="line">
                            <label class="linel"><span class="dt">确认密码：</span></label>
                            <div class="liner">
                                <input type="password" class="inp fsecpass J_password2" placeholder="请再次输入密码" autocomplete="off" maxlength="16" id="password2" name="password2" required="" value=""/>
                            </div>
                        </div>
                        <div class="line liney clearfix">
                            <label class="linel">&nbsp;</label>
                            <div class="liner">
                                <div class="clearfix checkcon">
                                    <p class="fn-fl checktxt"><input type="checkbox" class="iyes fn-fl J_protocal" checked />
                                    <span class="fn-fl">我已阅读并同意</span><a class="itxt fn-fl" href="<?php echo url('Index/Article/detail',['article_id'=>1415]); ?>" target="_blank">《TPshop网服务协议》</a>
                                    </p>
                                      <p class="fn-fl errorbox v-txt" id="protocalBox"></p>
                                </div>
                                <a class="regbtn J_btn_agree" href="javascript:void(0);" onClick="check_submit();">同意协议并注册</a>
                                <p class="v-txt" id="err_check_code">
                                    <span class="fnred">请勾选</span>我已阅读并同意<a class="itxt" href="<?php echo url('Index/Article/detail',['article_id'=>1415]); ?>" target="_blank">《TPshop网服务协议》</a>
                                </p>
                        </div>
                    </div>
                    </div>
                    </div>
            </div>
            </form>
<?php endif; ?>


        </div>
    </div>    
</div>
    <!--footer-s-->
    <div class="footer p">
        <include file="public/footer_index" />
    </div>
    <!--footer-e-->
<script>

    $(document).ready(function(){
		 $('input').click(function(){
		      $(this).siblings('p').hide();
		 });
	  	
	});
 
	// 普通 图形验证码 
    function verify(id){
        $('#'+id).attr('src','/index.php/Index/User/verify/type/user_reg/r/'+Math.random());
        
    }
    function check_submit(){
        $.ajax({
            type : "POST",
            url:"<?php echo url('Index/User/reg'); ?>",
            dataType: "json",
            data: $('#reg_form2').serialize(),
            success: function(data){
                if(data.status == 1){
                    layer.msg(data.msg, {icon: 1},function(){
                        window.location.href = "<?php echo url('Index/index/index'); ?>";
                    });
                }else{
                    layer.alert(data.msg, {icon: 2},function(index){
                        $('.verifyImg').trigger('click');
                        layer.close(index);
                    });
                }
            }
        });

    }
	// 电子邮件注册  和 手机号码注册 切换
    function reg_tab(id,id2){
        $('#'+id).addClass('ema-tab');
        $('#'+id2).removeClass('ema-tab');
        $('#'+id+'_div').show();
        $('#'+id2+'_div').hide();
    }
	// 发送手机短信
    function send_sms_reg_code(){
        var mobile = $('input[name="username"]').val();
        //console.log(mobile);
        var verify_code = $('input[name="verify_code"]').val();
        if(!checkMobile(mobile)){
            layer.alert('请输入正确的手机号码', {icon: 2});//alert('请输入正确的手机号码');
            return;
        }
        if(verify_code == ''){
            layer.alert('请输入图像验证码', {icon: 2});//alert('请输入正确的手机号码');
            return;
        }
        //var url = "/index.php?m=Home&c=Api&a=send_validate_code&scene=1&type=mobile&mobile="+mobile+"&verify_code="+verify_code;
        //var username = $('username').val();
        $.ajax({
            type : "POST",
            url:"<?php echo url('Index/User/sendSMS'); ?>",
            dataType: "json",
            data:{'username':mobile},
            success: function(res){
            	/*if(res.status == 1)
    			{
    				$('#count_down').attr("disabled","disabled");
    				intAs = 10; // 手机短信超时时间
                    jsInnerTimeout('count_down',intAs);
                    layer.alert(res.msg, {icon: 1});
    			}else{
                    layer.alert(res.msg, {icon: 2});
                    verify('reflsh_code2')
                }*/
            }
        });
    }

    // 发送邮箱
    function send_smtp_reg_code(){
        var email = $('input[name="username"]').val();
        var verify_code = $('input[name="verify_code"]').val();
        if(!checkEmail(email)){
            layer.alert('请输入正确的邮箱', {icon: 2});//alert('请输入正确的手机号码');
            return;
        }
        if(verify_code == ''){
            layer.alert('请输入图像验证码', {icon: 2});//alert('请输入正确的手机号码');
            return;
        }
        $.ajax({
            type : "POST",
            url:"<?php echo url('Index/Api/send_validate_code'); ?>",
            data : {type:'email',send:email,scene:1,verify_code:verify_code},// 你的formid
            dataType: "json",
            success: function(data){
                if(data.status == 1){
                    $('#count_down').attr("disabled","disabled");
                    intAs = 10; // 发送邮箱超时时间
                    jsInnerTimeout('count_down',intAs);
                    layer.alert(data.msg, {icon: 1});
                }else{
                    layer.alert(data.msg, {icon: 2});
                    verify('reflsh_code2')
                }
            }
        });
    }

    $('#count_down').removeAttr("disabled");
    //倒计时函数
    function jsInnerTimeout(id,intAs)
    {
        var codeObj=$("#"+id);
        //var intAs = parseInt(codeObj.attr("IntervalTime"));

        intAs--;
        if(intAs<=-1)
        {
            codeObj.removeAttr("disabled");
//            codeObj.attr("IntervalTime",60);
            codeObj.text("发送");
            return true;
        }

        codeObj.text(intAs+'秒');
//        codeObj.attr("IntervalTime",intAs);

        setTimeout("jsInnerTimeout('"+id+"',"+intAs+")",1000);
    };
    
    
    function checkMobile(tel) {
        var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
        if (reg.test(tel)) {
            return true;
        }else{
            return false;
        };
    }
    
    function checkEmail(str){
        var reg = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(reg.test(str)){
            return true;
        }else{
            return false;
        }
    }
</script>
</body> 
</html>

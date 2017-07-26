<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp64\www\tp5\public/../application/index\view\cart\cart2.html";i:1501072962;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
    <script src="/static/index/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="/static/index/css/tpshop.css" />
    <script src="/static/js/global.js"></script>
    <script src="/static/js/pc_common.js"></script>
    <script src="/static/js/layer/layer.js"></script>
    <link href="/static/css/common.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/static/index/css/jh.css">
</head>
<body>
include file="public/sign-header"/}
<div class="fn-cart-confirm">
    <!-- cart-title -->
    <div class="wrapper1190">
        <div class="order-header">
            <div class="layout after">
                <div class="fl">
                    <div class="logo pa-to-36 wi345">
                        <a href="/"><img src="/static/images/newLogo.png" alt=""></a>
                    </div>
                </div>
                <div class="fr">
                    <div class="pa-to-36 progress-area">
                        <div class="progress-area-wd" style="display:none">我的购物车</div>
                        <div class="progress-area-tx">填写核对订单信息</div>
                        <div class="progress-area-cg" style="display:none">成功提交订单</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cart-title -->
        <!-- end收货信息 -->
        <form name="cart2_form" id="cart2_form" method="post">
            <div class="layout be-table fo-fa ma-bo-45">
                <div class="con-info">
                    <div class="con-y-info ma-bo-35">
                        <h3>收货人信息<b>[<a href="javascript:void(0);" onClick="add_edit_address(0);">使用新地址</a>]</b></h3>

                        
                    </div>
                    
                </div>
                <div class="sc-area">
                    <div class="dt-order-area">
                        <div class="order-pro-list">
                            <!--商品列表-->
                                <div class="order-pro-list">
                                    <div class="yxspy">
                                        <div class="hv">$v['store_name']}</div>
                                        <div class="bv">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th class="tr-pro">商品</th>
                                                    <th class="tr-price">单价（元）</th>
                                                    <//if condition="($user[discount] neq 1)">
                                                        <!--<th class="tr-price">会员折扣价</th>-->
                                                        <th class="tr-price"></th>
                                                    <///if>
                                                    <th class="tr-quantity">数量</th>
                                                    <th class="tr-subtotal">小计（元）</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="leiliste">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                        
                                            <?php foreach($cartList as $k=>$v2): ?>
                                                if condition="($v2['selected'] eq '1') and ($v2['store_id'] eq $v['store_id'])"}
                                                    <tr>
                                                        <td class="tr-pro">
                                                            <ul class="pro-area-2">
                                                                <li>
                                                                    <a title="<?php echo $v2['goods_name']; ?>" target="_blank" href="<?php echo url('Index/Goods/goodsInfo',array('id'=>$v2['goods_id'])); ?>" seed="item-name"><?php echo $v2['goods_name']; ?></a><?php echo $v2['spec_key_name']; ?>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <!-- 预付订金商品的价格为空 -->
                                                        <td class="tr-price te-al">¥<?php echo $v2['goods_price']; ?></td>
                                                        
                                                            <td class="tr-price te-al"></td>
                                                        
                                                        <td class="tr-quantity te-al"><?php echo $v2['goods_num']; ?></td>
                                                        <td rowspan="1" class="tr-subtotal te-al">
                                                            <p><b>￥<?php echo $v2['goods_fee']; ?></b></p>
                                                        </td>
                                                    </tr>
                                                {/if}
                                            
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="4"><span class="span_ored">优惠券:</span>
                                                    <input type="radio" onclick="ajax_order_price();" value="1" checked="" name="couponTypeSelect"
                                                           class="radio vam ma-ri-10">

                                                    <select onchange="ajax_order_price();" class="vam ou-no" id="coupon_id" name="coupon_id">
                                                        <option value="0">选择优惠券</option>
                                                        
                                                        <?php foreach($couponList as $v3): ?>

                                                            <option value="<?php echo $v3['id']; ?>"><?php echo $v3['name']; ?></option>
                                                        
                                                        <?php endforeach; ?>
                                                    </select>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" onclick="ajax_order_price();" value="2" name="couponTypeSelect" class="radio vam ma-ri-10">
                                                    <input type="text" placeholder="请输入优惠券代码" class="texter vam span-150 ma-ri-10 he18 li-he-18" name="couponCode">
                                                    <input type="button" onclick="ajax_order_price();" value="使用"
                                                           class="button-style-disabled-4 button-action-use-disabled te-al ou-no vam">
                                                </td>
                                                <td rowspan="1" class="tr-subtotal te-al">
                                                    <p>-￥<b id="coupon_price">0</b></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <span class="span_ored">选择物流:</span>
                                                    <select onchange="ajax_order_price();" class="vam ou-no" name="shipping_code">
                                                        
                                                        <?php foreach($shippingList as $k4=>$v4): ?>

                                                            <option value="<?php echo $v4['code']; ?>"  ><?php echo $v4['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td rowspan="1" class="tr-subtotal te-al">
                                                    <p>￥<b id="shipping_price">0</b></p>
                                                </td>
                                            </tr>
                                            
                                                <tr>
                                                    <td colspan="5">
                                                    <span class="span_ored">给卖家留言:</span>
                                                <input class="span_text texter tapassa" type="text" name="user_note" onkeyup="checkfilltextarea('.tapassa','50')" />
                                                <span class="xianzd"><em id="zero">50</em>/50</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br/>
                            <!--商品列表 end-->
                        </div>
                        <div class="order-pro-total">
                            <div class="fl wctmes">
                                <div class="syyouhui pa-to-15">
                                    <div class="duoxuk">
                                        <label class="fo-fa-ta" for="order-chick">使用优惠券:</label>&nbsp;&nbsp;注：优惠券每次只能使用一张，不可多张混合使用
                                    </div>
                                    <div class="byicd">
                                        <div class="zhiwfnka">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="fo-fa-ta" for="order-chick">余额支付:</label>
                                                        <input type="text" id="user_money" name="user_money" class="texter vam span-150 ma-ri-10 he18 li-he-18" placeholder="请输入使用余额" onkeyup="this.value=/^\d+\.?\d{0,2}$/.test(this.value) ? this.value : ''"/>
                                                        <input type="button" class="button-style-disabled-4 button-action-use-disabled te-al ou-no vam" value="使用" onClick="wield(this);"/> 您的可用余额 ¥ <?php echo $user['user_money']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="fo-fa-ta" for="order-chick">积分支付:</label>
                                                        <input type="text" id="pay_points" name="pay_points" class="texter vam span-150 ma-ri-10 he18 li-he-18" placeholder="请输入使用积分" onkeyup="this.value=this.value.replace(/[^\d]/g,'')"/>

                                                        <input type="button" class="button-style-disabled-4 button-action-use-disabled te-al ou-no vam" value="使用" onClick="wield(this);"/>
                                                        php echo tpCache('shopping.point_rate');?>
                                                        积分抵 1元 &nbsp;&nbsp; 您的可用积分 <?php echo $user['pay_points']; ?> 分
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="fo-fa-ta" for="paypwd">支付密码:</label>
                                                        <input type="password" id="paypwd" name="paypwd" class="texter vam span-150 ma-ri-10 he18 li-he-18" placeholder="请输入支付密码"/>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fr wcnhy">
                                <div class="fzoubddv">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td class="tal">商品总金额：</td>
                                            <td class="tar">&nbsp;¥&nbsp;
                                                <em id="order-cost-area"><?php echo $total_price['total_fee']; ?></em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tal">运费：</td>
                                            <td class="tar">&nbsp;¥&nbsp;
                                                <em id="postFee">0.00</em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tal">使用优惠券：</td>
                                            <td class="tar">-&nbsp;¥&nbsp;
                                                <em><span id="couponFee">0.00</span> </em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tal">使用积分：</td>
                                            <td class="tar">-&nbsp;¥&nbsp;
                                                <em><span id="pointsFee">0.00</span> </em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tal">优惠活动：</td>
                                            <td class="tar">-&nbsp;¥&nbsp;
                                                <em><span id="order_prom_amount">0.00</span> </em>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tal">使用余额:</td>
                                            <td class="tar">-&nbsp;¥&nbsp;
                                                <em><span id="balance">0.00</span> </em>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p class="yifje-order">
		                            	<span class="p-subtotal-price"> 应付金额：
		                                    <b class="total">¥</b>
		                                    <b class="total" id="payables">0.00</b>
		                                </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-action-area te-al-ri">
                        <div class="woypdbe sc-acti-list">
                            <!--<span class="p-subtotal-price">应付总额：<b>¥<span class="vab" id="payableTotal">2276.00</span></b></span>-->
                            <a class="Sub-orders gwc-qjs" href="javascript:void(0);" onClick="submit_order();"><span>提交订单</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- 提示切换省份 -->
<div id="changeProvince" style="display: none;">
    <div class="mask mask-cs-05 mask-4">
        <div class="mk-title">
            <h3>温馨提示</h3>
            <i data-x="1" class="mask-close-x changeAddrX"></i></div>
        <div class="mk-adc">
            <div class="cs-01"> 您目前所在的省份为<strong>上海</strong>，选择<strong>安徽省</strong>的收货地址后，您购买的商品及价格将发生变化。</div>
            <div class="cs-03">
                <button class="btn btn-red confirmChangeCity">切换省份</button>
                <button class="btn mask-close-x changeAddrX" data-x="1">取消</button>
            </div>
        </div>
    </div>
</div>
<!-- end 提示切换省份 -->
<!-- 提示配送商品 -->
<div id="sorryTipLayer" style="display:none;">
    <div class="tipLayerCont">
        <p class="tip">对不起，以下商品暂时无法送达至<b>江苏省</b><b>无锡市</b><b>锡山区</b></p>

        <div class="tipLayerList">
            <div class="listHead"><span class="name">商品名称</span> <span class="spec">规格</span> <span class="num">数量</span> <span class="price">金额</span></div>
            <div class="listCont"></div>
        </div>
    </div>
</div>
<!-- end 提示配送商品 -->
<!--footer-s-->
<div class="footer p">
    <include file="public/footer_index" />
</div>
<!--footer-e-->
<script>
    /**
     * 留言字数限制
     * tea ：要限制数字的class名
     * nums ：允许输入的最大值
     * zero ：输入时改变数值的ID
     */
    function checkfilltextarea(tea,nums){
        var len = $(tea).val().length;
        if(len > nums){
            $(tea).val($(tea).val().substring(0,nums));
        }
        var num = nums - len;
        num <= 0 ? $("#zero").text(0): $("#zero").text(num);  //防止出现负数
    }
    $(document).ready(function () {
        ajax_address(); // 获取用户收货地址列表
    });

    function wield(obj){
        if($.trim($(obj).prev().val()) !=''){
            layer.msg('正在计算金额...',{icon:1});
            ajax_order_price(); // 计算订单价钱
        }
    }
    /**
     * 新增修改收货地址
     * id 为零 则为新增, 否则是修改
     *  使用 公共的 layer 弹窗插件  参考官方手册 http://layer.layui.com/
     */
    function add_edit_address(id) {
        if (id > 0)
            var url = "/index.php?m=Home&c=User&a=edit_address&scene=1&call_back=call_back_fun&id=" + id; 
        else
            var url = "/index.php?m=Home&c=User&a=add_address&scene=1&call_back=call_back_fun";	// 新增地址
        layer.open({
            type: 2,
            title: '添加收货地址',
            shadeClose: true,
            shade: 0.8,
            area: ['880px', '580px'],
            content: url,
        });
    }
    // 添加修改收货地址回调函数
    function call_back_fun(v) {
        layer.closeAll(); // 关闭窗口
        ajax_address(); // 刷新收货地址
    }

    // 删除收货地址
    function del_address(id) {
        layer.confirm('确定要删除吗？', {
                    btn: ['确定','取消'] //按钮
                }, function(index){
					layer.close(index);
                    // 确定
                    $.ajax({
                        url: "/index.php?m=Home&c=User&a=del_address&id=" + id,
                        success: function (data) {
                            ajax_address(); // 刷新收货地址
                            $('#ajax_pickup .order-address-list').removeClass('address_current');
							
                        }
                    });
                    layer.closeAll(); // 关闭窗口
                }, function(index){
                    layer.close(index);
                }
        );
    }

    /*
     * ajax 获取当前用户的收货地址列表
     */
    function ajax_address() {
        $.ajax({
            url: "<?php echo url('Index/Cart/ajaxAddress'); ?>",//+tab,
            success: function (data) {
                $("#ajax_address").html('');
                $("#ajax_address").append(data);
                if (data != '') // 有收货地址列表 再计算价钱
                    ajax_order_price(); // 计算订单价钱
            }
        });
    }

    // 切换收货地址
    function swidth_address(obj) {
        var province_id = $(obj).attr('data-province-id');
        var city_id = $(obj).attr('data-city-id');
        var district_id = $(obj).attr('data-district-id');
        if (typeof($(obj).attr('data-province-id')) != 'undefined') {
            ajax_pickup(province_id,city_id,district_id,0);
        }
        $(".order-address-list").removeClass('address_current');
        $(obj).parent().parent().parent().parent().parent().addClass('address_current');
        ajax_order_price(); // 计算订单价格
    }
    /**
     * 获取用户自提点和推荐自提点
     * @param type 1：用户自提点 ，0：用户自提点和推荐自提点
     * @param province_id 省
     * @param city_id 市
     * @param district_id 区
     */
    function ajax_pickup(province_id, city_id, district_id,show) {
        $.ajax({
            type: 'GET',
            url: "<?php echo url('Index/Cart/ajaxPickup'); ?>",//+tab,
            data: {province_id: province_id, city_id: city_id, district_id: district_id,show:show},
            success: function (data) {
                $("#ajax_pickup").html('');
                $("#ajax_pickup").append(data);
                ajax_order_price();
            }
        });
    }
    //更换自提点
    function replace_pickup(province_id, city_id, district_id) {
        var url = "/index.php?m=Home&c=Cart&a=replace_pickup&call_back=call_back_pickup&province_id="+province_id+"&city_id="+city_id+"&district_id="+district_id;
        layer.open({
            type: 2,
            title: '添加收货地址',
            shadeClose: true,
            shade: 0.8,
            area: ['880px', '580px'],
            content: url,
        });
    }
    // 添加自提点地址回调函数
    function call_back_pickup(province_id,city_id,district_id){
        layer.closeAll(); // 关闭窗口
        ajax_pickup(province_id, city_id, district_id,1);
    }
    // 获取订单价格
    function ajax_order_price() {


        $.ajax({
            type : "POST",
            url:"<?php echo url('Index/Cart/cart3'); ?>",//+tab,g
            data : $('#cart2_form').serialize()+"&act=order_price",// 你的formid
            dataType: "json",
            success: function(data){
                if(data.status != 1)
                {
                    //执行有误
                    layer.alert(data.msg, {icon: 2});
                    // 登录超时g
                    if(data.status == -100)
                        location.hrgef ="<?php echo url('Index/User/login'); ?>";
                    return false;
                }
                // console.log(data);
                //$("#couponFee, #pointsFee, #order_prom_amount").css('display','none');

                $("#postFee").text(data.result.postFee); // 物流费
                $("#shipping_price").text(data.result.postFee); // 物流费
                if(data.result.couponFee == null){
                    $("#couponFee").text(0);// 优惠券
                }else{
                    $("#couponFee").text(data.result.couponFee);// 优惠券
                }
                $("#coupon_price").text(data.result.couponFee);// 优惠券
                $("#balance").text(data.result.balance);// 余额
                $("#pointsFee").text(data.result.pointsFee);// 积分支付
                $("#payables").text(data.result.payables);// 应付
                $("#order_prom_amount").text(data.result.order_prom_amount);// 订单 优惠活动
//                layer.alert(data.msg, {icon: 2});
            }
        });
    }

    // 提交订单
    ajax_return_status = 1;
    function submit_order()
    {
        if(ajax_return_status == 0)
            return false;
        ajax_return_status = 0;
        $.ajax({
            type : "POST",
            url:"<?php echo url('Index/Cart/cart3'); ?>",//+tab,
            data : $('#cart2_form').serialize()+"&act=submit_order",// 你的formid
            dataType: "json",
            success: function(data){

                if(data.status != '1')
                {
                    // alert(data.msg); //执行有误
                    layer.alert(data.msg, {icon: 2});
                    // 登录超时
                    if(data.status == -100)
                        location.href ="<?php echo url('Index/User/login'); ?>";

                    ajax_return_status = 1; // 上一次ajax 已经返回, 可以进行下一次 ajax请求

                    return false;
                }
                layer.msg('订单提交成功，正在跳转!', {
                    icon: 1,   // 成功图标
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                }, function(){ // 关闭后执行的函数
                    location.href = "/index.php?m=Home&c=Cart&a=cart4&order_id="+data.result; // 跳转到结算页
                });
            }
        });
    }
</script>
</body>
</html>
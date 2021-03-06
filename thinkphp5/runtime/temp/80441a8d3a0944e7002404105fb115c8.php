<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp64\www\tp5\public/../application/index\view\cart\cart.html";i:1501071023;}*/ ?>
<!DOCTYPE html>
<html id="ng-app">
<head lang="zh">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <link rel="stylesheet" type="text/css" href="/static/index/css/tpshop.css" />
    <title>购物车</title>
    
    <link href="/static/index/css/common.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/static/index/css/jh.css">
    <script src="/static/index/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/global.js"></script>
    <script src="/static/js/pc_common.js"></script>
    <script src="/static/js/layer/layer.js"></script>
</head>
<body class="ng-scope">
<!-- 头部顶栏 start [[-->
<include file="public/sign-header"/>
<!-- 头部顶栏 end ]]-->
<div class="fn-cart-clearing">
    <div class="wrapper1190" my-cart="">
        <!-- cart-title -->
        <div class="order-header">
            <div class="layout after">
                <div class="fl">
                    <div class="logo pa-to-36 wi345"> <a href="/"><img src="/static/images/newLogo.png" alt=""></a> </div>
                </div>
                <div class="fr">
                    <div class="pa-to-36 progress-area">
                        <div class="progress-area-wd"></div>
                        <div class="progress-area-tx" style="display:none"></div>
                        <div class="progress-area-cg" style="display:none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cart-title -->
        <div class="ui_tab">
            <!-- ngIf: !status.overseasEmpty -->
            <div class="ui_tab_content">
                <div class="clearing-c cart-content">
                    <div class="layout after-ta">
                        <div class="sc-list">
                            <form name="cart_form" id="cart_form" action="/index.php/Index/Cart/ajaxCartList.html">
                                <div id="ajax_return"> </div>
                            </form>
                            <div class="sc-acti-list ma-to-20 "> <a class="gwc-jxgw" href="javascript:history.go(-1);">继续购物</a>
                                <a class="gwc-qjs" href="javascript:void(0)" data-url="<?php echo url('Index/Cart/cart2'); ?>">去结算</a>
                            </div>
                        </div>
                    </div>
                </div>
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
            ajax_cart_list(); // ajax 请求获取购物车列表
        });

        // ajax 提交购物车
        var before_request = 1; //  上一次请求是否已经有返回来, 有才可以进行下一次请求
        function ajax_cart_list(){

            if(before_request == 0) // 上一次请求没回来 不进行下一次请求
                return false;
            before_request = 0;


            $.ajax({
                type : "POST",
                url:"/Index/Cart/ajaxCartList",//+tab,
                data : $('#cart_form').serialize(),// 你的formid
                success: function(data){
                    $("#ajax_return").empty().append(data);
                    before_request = 1;
                }
            });
        }

        /**
         * 购买商品数量加加减减
         * 购买数量 , 购物车id , 库存数量
         */
        function switch_num(num,cart_id,store_count)
        {
            var num2 = parseInt($("input[name='goods_num["+cart_id+"]']").val());
            num2 += num;
            if(num2 < 1) num2 = 1; // 保证购买数量不能少于 1
            if(num2 > store_count)
            {
                layer.alert("库存只有 " + store_count + " 件, 你只能买 " + store_count + " 件", {icon: 2});
                num2 = store_count; // 保证购买数量不能多余库存数量
            }

            $("input[name='goods_num["+cart_id+"]']").val(num2);

            ajax_cart_list(); // ajax 更新商品价格 和数量
        }


        /**  全选 反选 **/
        function check_all()
        {
            var vt = $("#select_all").is(':checked');
            $("input[name^='cart_select']").prop('checked',vt);
            // var checked = !$('#select_all').attr('checked');
            // $("input[name^='cart_select']").attr("checked",!checked);
            ajax_cart_list(); // ajax 更新商品价格 和数量
        }

        var isdel=1;
        // ajax 删除购物车的商品
        function ajax_del_cart(ids)
        {
            layer.confirm('您确定要删除吗',{
                btn:['确定','取消']
            },function(){
                $.ajax({
                    type : "POST",
                    url:"<?php echo url('Index/Cart/ajaxDelCart'); ?>",//+tab,
                    data:{ids:ids}, //
                    dataType:'json',
                    success: function(data){
                        layer.closeAll();
                        if(data.status == 1){
                            $('.fn-delete-alert').show();
                            $('.fn-delete-alert').find('.ng-binding').html(isdel);
                            isdel++;
                            ajax_cart_list(); // ajax 请求获取购物车列表
                            layer.msg(data.msg, {icon:1});
                        }else{
                            layer.msg(data.msg, {icon:1});
                        }
                    }
                });
            })

        }

        // 批量删除购物车的商品
        function del_cart_more()
        {
//            if(!confirm('确定要删除吗?'))
//                return false;
            // 循环获取复选框选中的值
            var chk_value = [];
            $('input[name^="cart_select"]:checked').each(function(){
                var s_name = $(this).attr('name');
                var id = s_name.replace('cart_select[','').replace(']','');
                chk_value.push(id);
            });
            // ajax  调用删除
            if(chk_value.length > 0)
                ajax_del_cart(chk_value.join(','));
        }

        $('.gwc-qjs').click(function(){
            var user_id = '<?php cookie('uname')?>';
            console.log(user_id);
            if(user_id == '0'){
                layer.open({
                    type: 2,
                    title: '<b>登陆TPshop</b>',
                    skin: 'layui-layer-rim',
                    shadeClose: true,
                    shade: 0.5,
                    area: ['490px', '460px'],
                    content: "<?php echo url('Index/User/pop_login'); ?>",
                });
            }else{
                window.location.href = $(this).attr('data-url');
            }
        })
    </script>
</body>
</html>
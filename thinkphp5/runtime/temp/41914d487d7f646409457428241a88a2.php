<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:88:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/index\view\goods\goodsinfo.html";i:1501078182;s:86:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/index\view\public\header.html";i:1501078182;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <link rel="stylesheet" type="text/css" href="/static/index/css/tpshop.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/jquery.jqzoom.css">
    <script src="/static/index/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/layer/layer-min.js"></script>
    <script type="text/javascript" src="/static/index/js/jquery.jqzoom.js"></script>
    <script type="text/javascript" src="/static/js/global.js"></script>
    <script type="text/javascript" src="/static/js/pc_common.js"></script>
    <link rel="stylesheet" href="/static/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
</head>

<body>
<!--header-s-->
<div class="tpshop-tm-hander tp_h_alone p">
        <!--导航栏-s-->
        <div class="top-hander p">
            <div class="w1224 pr p">
                <div class="fl">
                    <!-- 收货地址，物流运费 -start-->
                    <link rel="stylesheet" href="static/index/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
                    <div class="sendaddress pr fl">
                        <span>送货至：</span>
                        <span>
                            <ul class="list1">
                                <li class="summary-stock though-line">
                                    <div class="dd" style="border-right:0px;width:200px;">
                                        <div class="store-selector add_cj_p">
                                            <div class="text"><div></div><b></b></div>
                                            <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <!-- 收货地址，物流运费 -end-->
                        <div class="fl nologin">
                            <a class="red" href="<?php echo url('Index/user/login'); ?>">Hi.请登录</a>
                            <a href="<?php echo url('Index/user/reg'); ?>">免费注册</a>
                        </div>
                        <div class="fl islogin">
                            <a class="red userinfo" href="<?php echo url('Home/user/index'); ?>" ></a>
                            <a  href="<?php echo url('Index/user/logout'); ?>"  title="退出" target="_self">安全退出</a>
                        </div>
                </div>
                <div class="top-ri-header fr">
                    <ul>
                        <li><a target="_blank" href="<?php echo url('/Home/User/order_list'); ?>">我的订单</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="<?php echo url('Home/User/visit_log'); ?>">我的浏览</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="<?php echo url('/Home/User/coupon'); ?>">我的优惠券</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="<?php echo url('/Home/User/goods_collect'); ?>">我的收藏</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" title="点击这里给我发消息" href="<?php echo url('Home/Article/detail',array('article_id'=>22)); ?>" target="_blank">在线客服</a></li>
                        <li class="spacer"></li>
                        <li class="hover-ba-navdh">
                            <div class="nav-dh">
                                <span>网站导航</span>
                                <i class="share-a_a1"></i>
                                <div class="conta-hv-nav">
                                    <ul>
                                        <li>
                                            <a href="<?php echo url('Home/Activity/group_list'); ?>">团购</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo url('Home/Activity/flash_sale_list'); ?>">抢购</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--导航栏-e-->
        <div class="nav-middan-z p">
            <div class="header w1224 p">
                <div class="ecsc-logo">
                    <a href="<?php echo url('Index/index'); ?>" class="logo"> <img src="<?php echo $tpshop_config['store_logo']; ?>"></a>
                </div>
                <!--搜索-s-->
                <div class="ecsc-search">
                    <form id="searchForm" name="" method="get" action="<?php echo url('Home/Goods/search'); ?>" class="ecsc-search-form">
                        <input autocomplete="off" name="q" id="q" type="text" value="<?php echo \think\Request::instance()->param('q'); ?>" placeholder="搜索关键字" class="ecsc-search-input">
                        <button type="submit" class="ecsc-search-button" onclick="if($.trim($('#q').val()) != '') $('#searchForm').submit();"><i></i></button>
                        <div class="candidate p">
                            <ul id="search_list"></ul>
                        </div>
                        <script type="text/javascript">
                            /*;(function($){
                                $.fn.extend({
                                    donetyping: function(callback,timeout){
                                        timeout = timeout || 1e3;
                                        var timeoutReference,
                                                doneTyping = function(el){
                                                    if (!timeoutReference) return;
                                                    timeoutReference = null;
                                                    callback.call(el);
                                                };
                                        return this.each(function(i,el){
                                            var $el = $(el);
                                            $el.is(':input') && $el.on('keyup keypress',function(e){
                                                if (e.type=='keyup' && e.keyCode!=8) return;
                                                if (timeoutReference) clearTimeout(timeoutReference);
                                                timeoutReference = setTimeout(function(){
                                                    doneTyping(el);
                                                }, timeout);
                                            }).on('blur',function(){
                                                doneTyping(el);
                                            });
                                        });
                                    }
                                });
                            })(jQuery);

                            $('.ecsc-search-input').donetyping(function(){
                                search_key();
                            },500).focus(function(){
                                var search_key = $.trim($('#q').val());
                                if(search_key != ''){
                                    $('.candidate').show();
                                }
                            });
                            $('.candidate').mouseleave(function(){
                                $(this).hide();
                            });

                            function searchWord(words){
                                $('#q').val(words);
                                $('#searchForm').submit();
                            }
                            function search_key(){
                                var search_key = $.trim($('#q').val());
                                if(search_key != ''){
                                    $.ajax({
                                        type:'post',
                                        dataType:'json',
                                        data: {key: search_key},
                                        url:"<?php echo url('Home/Api/searchKey'); ?>",
                                        success:function(data){
                                            if(data.status == 1){
                                                var html = '';
                                                $.each(data.result, function (n, value) {
                                                    html += '<li onclick="searchWord(\''+value.keywords+'\');"><div class="search-item">'+value.keywords+'</div><div class="search-count">约'+value.goods_num+'个商品</div></li>';
                                                });
                                                html += '<li class="close"><div class="search-count">关闭</div></li>';
                                                $('#search_list').empty().append(html);
                                                $('.candidate').show();
                                            }else{
                                                $('#search_list').empty();
                                            }
                                        }
                                    });
                                }
                            }*/
                        </script>
                    </form>
                    <div class="keyword">
                        <ul>
                            <foreach name="tpshop_config.hot_keywords" item="wd" key="k">
                                <li>
                                    <a href=":url('Home/Goods/search',array('q'=>$wd))}" target="_blank">$wd}</a>
                                </li>
                            </foreach>
                        </ul>
                    </div>
                </div>
                <!--搜索-e-->
                <!--购物车-s-->
                
                <div class="shopingcar-index fr">
                    <div class="u-g-cart fr fixed" id="hd-my-cart">
                        <a href="<?php echo url('Index/Cart/cart'); ?>">
                            <div class="c-n fl" >
                                <i class="share-shopcar-index"></i>
                                <span>我的购物车<em class="sc_z" id="cart_quantity"></em></span>
                            </div>
                        </a>
                        <div class="u-fn-cart u-mn-cart" id="show_minicart"></div>
                    </div>
                </div>
                <!--购物车-e-->
            </div>
        </div>
        <!--商品分类-s-->
        <div class="nav p">
            <div class="w1224 p">
                <div class="categorys2 home_categorys">
                    <div class="dt">
                        <a href="<?php echo url('Index/Goods/all_category'); ?>" target="_blank"><i class="share-a_a2"></i>商品分类</a>
                    </div>
                    <!--全部商品分类-s-->
                    <!-- <div class="dd">
                        <div class="cata-nav">
                            外层循环点
                            <?php foreach($goods_category_tree as $k=>$v): ?>
                                <div class="item fore1">
                                <if condition="$v['level'] eq 1">
                                <div class="item-left">
                                    <div class="cata-nav-name">
                                        <h3>
                                            <div class="contiw-cer"><span class="share-icon-<?php echo $k; ?>"></span></div>
                                            <a href="<?php echo url('Home/Goods/goodsList',array('id'=>$v['id'])); ?>" title="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></a>
                                        </h3>
                                    </div>
                                    <b>&gt;</b>
                                </div>
                                </if>
                                <div class="cata-nav-layer">
                                    <div class="cata-nav-left">
                                        <div class="subitems">
                                        <?php foreach($v['tmenu'] as $k2=>$v2): ?>
                                           
                                                <if condition="$v2[parent_id] eq $v['id']">
                                                <dl>2级循环点
                                                    <dt>
                                                        <a href="<?php echo url('Home/Goods/goodsList',array('id'=>$v2['id'])); ?>" target="_blank"><?php echo $v2['name']; ?><i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                        <?php foreach($v2['sub_menu'] as $k3=>$v3): ?>
                                                        
                                                            <if condition="$v3[parent_id] eq $v2['id']">
                                                            <a href="<?php echo url('Home/Goods/goodsList',array('id'=>$v3['id'])); ?>" target="_blank"><?php echo $v3['name']; ?></a></if>
                                                        
                                                        <?php endforeach; ?>
                                                    </dd>
                                                </dl>
                                                </if>
                                            
                                            <?php endforeach; ?>
                                            商品分类底部广告-s
                                            <div class="advertisement_down">
                                                <ul>                              
                                                    <?php foreach($ad14 as $adk=>$adv): ?>                  
                                                    
                                                        <li>
                                                            <a href="<?php echo $adv['ad_link']; ?>" <?php if($adv['target'] == 1): ?>target="_blank"<?php endif; ?>>
                                                                <img src="<?php echo $adv['ad_code']; ?>" title="<?php echo $adv['ad_name']; ?>" style="$v3[style]}" width="129" height="45"/>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>                                                
                                                </ul>
                                            </div>
                                            商品分类底部广告-e
                                        </div>
                                    </div>
                                    商品分类右侧广告-s
                                    <div class="cata-nav-rigth">
                                        <?php foreach($ad51 as $adk=>$adv): ?>
                                        
                                            <a href="<?php echo $adv['ad_link']; ?>" <?php if($adv['target'] == 1): ?>target="_blank"<?php endif; ?>>
                                                <img src="<?php echo $adv['ad_code']; ?>" title="<?php echo $adv['ad_name']; ?>" style="$adv[style]}"/>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    商品分类右侧广告-e
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div> -->
                    <!--全部商品分类-e-->
                </div>
                <!--导航栏-s-->
                 <div class="navitems" id="nav">
                    <ul>
                        <li class="index_modify">
                            <a href="<?php echo url('Index/index'); ?>" class="selected">首页</a>
                        </li>
                        导航栏
                    </ul>
                    <!-- <div class="wrap-line" style="width: 72px; left: 20px;">
                        <span style="left:15px;"></span>
                    </div> -->
                </div>
                <!--导航栏-e-->
            </div>
        </div>
        <!--商品分类-e-->
    </div>
    <script type="text/javascript">
        $(function() {
            
                $('.dd').hide();
                var uname= getCookie('uname');
                //alert(uname);
                if(uname == ''){
                    $('.islogin').hide();
                    $('.nologin').show();
                }else{
                    $('.nologin').hide();
                    $('.islogin').show();
                    //获取用户名
                    $('.userinfo').html(decodeURIComponent(uname));
                }
        })
    </script>
    <!--header-e-->
    <div class="search-box p">
        <div class="w1224">
            <div class="search-path fl">
                 <div class="search-path fl">
                顶端导航
                
                <div class="havedox">
                    
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="details-bigimg p">
        <div class="w1224">
            <div class="detail-img">
                <div class="product-gallery">
                    <div class="product-photo" id="photoBody">
                        <!-- 商品大图介绍 start [[-->
                        <div class="product-img jqzoom">
                            <img id="zoomimg" src="<?php echo goods_thum_images($goods['goods_id'],400,400); ?>" jqimg="<?php echo goods_thum_images($goods['goods_id'],800,800); ?>">
                        </div>
                        <!-- 商品大图介绍 end ]]-->
                        <!-- 商品小图介绍 start [[-->
                        <div class="product-small-img fn-clear"> <a href="javascript:;" class="next-left next-btn fl disabled"></a>
                            <div class="pic-hide-box fl">
                                <ul class="small-pic" style="left:0;">
                                    
                                    <?php foreach($goods_images_list as $k=>$v): ?>
                                        <li class="small-pic-li <?php if($k == 0): ?>active<?php endif; ?>">
                                        <a href="javascript:;">
                                            <img src="<?php echo get_sub_images($v,$v['goods_id'],60,60); ?>" data-img="<?php echo get_sub_images($v,$v['goods_id'],400,400); ?>" data-big="<?php echo get_sub_images($v,$v['goods_id'],800,800); ?>">
                                            <i></i>
                                        </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <a href="javascript:;" class="next-right next-btn fl"></a> </div>
                        <!-- 商品小图介绍 end ]]-->
                    </div>
                    <!-- 收藏商品 start [[-->
                    <div class="collect">
                        <a href="javascript:void(0);" id="collectLink"><i class="collect-ico collect-ico-null"></i>
                            <span class="collect-text">收藏商品</span>
                            <em class="J_FavCount"></em></a>
                        <!--<a href="javascript:void(0);" id="collectLink"><i class="collect-ico collect-ico-ok"></i>已收藏<em class="J_FavCount">(20)</em></a>-->
                    </div>
                    <!-- 分享商品 -->
                    <!-- <div class="share">
                        <div class="jiathis_style">
                            <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt" target="_blank"><img src="http://v3.jiathis.com/code_mini/images/btn/v1/jiathis1.gif" border="0" /></a>
                        </div>
                        <script>
                            var jiathis_config = {
                                url地址
                                
                                pic地址
                            }
                            var is_distribut = getCookie('is_distribut');
                            var user_id = getCookie('user_id');
                            // 如果已经登录了, 并且是分销商
                            if(parseInt(is_distribut) == 1 && parseInt(user_id) > 0)
                            {
                                jiathis_config.url = jiathis_config.url + "&first_leader="+user_id;
                            }
                        </script>
                        <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
                    </div> -->
                </div>
            </div>
            <form id="buy_goods_form" name="buy_goods_form" method="post" >
                <div class="detail-ggsl">
                <h1><?php echo $goods['goods_name']; ?></h1>
                
                <div class="shop-price-cou">
                    <div class="shop-price-le">
                        <ul>
                            <li class="jaj"><span>商城价：</span></li>
                            <li>
                                <span class="bigpri_jj" id="goods_price"><em>￥</em><?php echo $goods['shop_price']; ?>
                                
                                </span>
                            </li>
                        </ul>
                        <ul>
                            <li class="jaj"><span>市场价：</span></li>
                            <li class="though-line"><span><em>￥</em><?php echo $goods['market_price']; ?></span></li>
                        </ul>
                        
                    </div>
                    <div class="shop-cou-ri">
                        <div class="allcomm"><p>累计评价</p><p class="f_blue"><?php echo $goods['comment_count']; ?></p></div>
                        <div class="br1"></div>
                        <div class="allcomm"><p>累计销量</p><p class="f_blue"><?php echo $goods['sales_sum']; ?></p></div>
                    </div>
                </div>
                <div class="standard p">
                    <!-- 收货地址，物流运费 -start-->
                    <ul class="list1">
                        <li class="jaj"><span>配&nbsp;&nbsp;送：</span></li>
                        <li class="summary-stock though-line">
                            <div class="dd shd_address">
                                <!--<div class="addrID"><div></div><b></b></div>-->
                                <div class="store-selector add_cj_p">
                                    <div class="text" style="width: 150px;"><div></div><b></b></div>
                                    <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
                                </div>
                                <!--<span id="dispatching_msg" style="display: none;">有货</span>-->
                                <select id="dispatching_select" style="display: none;"></select>
                            </div>
                        </li>

                    </ul>
                    <!-- 收货地址，物流运费 -end-->
                </div>
                <div class="standard p">
                    <ul>
                        <li class="jaj"><span>服&nbsp;&nbsp;务：</span></li>
                        <li class="lawir"><span class="service">由<a >本商城</a>发货并提供售后服务</span></li>
                    </ul>
                </div>
                

                <!-- 规格 start [[-->
                
                    
                    <?php foreach($filter_spec as $k=>$v): ?>
                        <div class="standard p">
                            <ul>
                                <li class="jaj"><span><?php echo $k; ?>：</span></li>
                                <li class="lawir colo">
                                    
                                    <?php foreach($v as $k2=>$v2): ?>
                                    

                                        <input type="radio" style="display: none" rel="<?php echo $v2['item']; ?>" name="goods_spec['<?php echo $k; ?>']" value="<?php echo $v2['item_id']; ?>"  <?php if($k2 == 0): ?>checked="checked"<?php endif; ?>/>
                                        
                                        
                                        <input type="radio" style="display: none" rel="<?php echo $v2['item']; ?>" name="goods_spec['<?php echo $k; ?>']" value="<?php echo $v2['item_id']; ?>"  <?php if($k2 == 0): ?>checked="checked"<?php endif; ?>/>
                                        <a   onclick="select_filter(this);" <?php if($k2 == 0): ?> class="red"<?php endif; ?>><?php echo $v2['item' ]; ?></a>
                                    
                                <?php endforeach; ?>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                
                <script>
                    /**
                     * 切换规格
                     */
                    function select_filter(obj)
                    {
                        $(obj).addClass('red').siblings('a').removeClass('red');
                        $(obj).siblings('input').prop('checked',false);
                        $(obj).prev('input').prop('checked',true);;	 // 让隐藏的 单选按钮选中
                        // 更新商品价格
                        get_goods_price();
                    }
                </script>
                <!-- 规格end ]]-->
                <div class="standard p">
                    <ul>
                        <li class="jaj"><span>数&nbsp;&nbsp;量：</span></li>
                        <li class="lawir">
                            <div class="minus-plus">
                                <a class="mins" href="javascript:void(0);" onclick="altergoodsnum(-1)">-</a>
                                <input class="buyNum" id="number" type="text" name="goods_num" value="1" onblur="altergoodsnum(0)" max="<empty name=""><?php echo $goods['store_count']; ?><else/></empty>"/>
                                <a class="add" href="javascript:void(0);" onclick="altergoodsnum(1)">+</a>
                            </div>
                            <div class="sav_shop">剩余库存：<span id="store_count"><empty name="goods['flash_sale']"><?php echo $goods['store_count']-1; ?><else/></empty></span></div>
                        </li>
                    </ul>
                    <script>
                        $('#number').val(1);
                    </script>
                </div>
                
                <div class="standard p">
                    <input type="hidden" name="goods_id" value="<?php echo $goods['goods_id']; ?>" />
                    <a class="paybybill" href="javascript:;" onclick="add2(<?php echo $goods['goods_id']; ?>,1,1);">立即购买</a>
                    <a class="addcar" href="javascript:;" onclick="add2(<?php echo $goods['goods_id']; ?>,1,0);"><i class="sk"></i>加入购物车</a>
             
                    <script type="text/javascript">


                            function add2(goods_id,num,to_catr)
{

    // console.log(I);
        // 如果有商品规格 说明是商品详情页提交
        if($("#buy_goods_form").length > 0){
                $.ajax({
                    // console.log('ffhh');
                        type : "POST",
                        url:"/index/Cart/ajaxAddCart",
                        data : $('#buy_goods_form').serialize(),// 你的formid 搜索表单 序列化提交                        
                        dataType:'json',
                        success: function(data){    
                        
                                if(data.status < 0)
                                {
                                    layer.alert(data.msg, {icon: 2});
                                    return false;
                                }
                               // 加入购物车后再跳转到 购物车页面
                               if(to_catr == 1)  //直接购买
                               {
                                   location.href = "/index/Cart/cart";   
                               }
                               else
                               {
                                    cart_num = parseInt($('#cart_quantity').html())+parseInt($('input[name="goods_num"]').val());
                                    $('#cart_quantity').html(cart_num)
                                    layer.open({
                                          type: 2,
                                          title: '温馨提示',
                                          skin: 'layui-layer-rim', //加上边框
                                          area: ['490px', '386px'], //宽高
                                          content:["/index/Goods/open_add_cart","no"],
                                          success: function(layero, index) {
                                                layer.iframeAuto(index);
                                        }
                                    });
                                    
                               }
                        }
                });     
        }else{ // 否则可能是商品列表页 收藏页 等点击加入购物车的
                $.ajax({
                        type : "POST",
                        url:"/index/Cart/ajaxAddCart",
                        data :{goods_id:goods_id,goods_num:num} ,
                        dataType:'json',
                        success: function(data){
                               if(data.status == -1)
                               {
                                    location.href = "/index/Goods/goodsInfo&id="+goods_id;   
                               }
                               else
                               {
                                    // 加入购物车有误
                                    if(data.status < 0)
                                    {
                                        layer.alert(data.msg, {icon: 2});
                                        return false;
                                    }
                                    cart_num = parseInt($('#cart_quantity').html())+parseInt(num);
                                    $('#cart_quantity').html(cart_num)
                                    layer.open({
                                          type: 2,
                                          title: '温馨提示',
                                          skin: 'layui-layer-rim', //加上边框
                                          area: ['490px', '386px'], //宽高
                                          content:"/index/Goods/open_add_cart"
                                    });                            
                               }                                                           
                        }
                });            
        }
}

// 点击收藏商品
function collect_goods(goods_id){
    $.ajax({
        type : "GET",
        dataType: "json",
        url:"/index.php?m=Mobile&c=goods&a=collect_goods&goods_id="+goods_id,//+tab,
        success: function(data){
            alert(data.msg);
        }
    });
}
                    </script>



                </div>
            </div>
            </form>
            <!--看了又看-s-->
            <div class="detail-ry p">
                <div class="type_more" >
                    <div class="type-top">
                        <h2>看了又看<a class="update_h fr" href="javascript:;" onclick="replace_look();">换一换</a></h2>
                    </div>
                    <div id="see_and_see">
                    </div>
                </div>
            </div>
            <!--看了又看-s-->
        </div>
    </div>
    <div class="detail-main p">
        <div class="w1224">
            <div class="deta-le-ma">
                <div class="type_more">
                    <div class="type-top">
                        <h2>热搜推荐</h2>
                    </div>
                    <div class="type-bot">
                        <ul class="xg_typ">
                            <foreach name="tpshop_config.hot_keywords" item="wd" key="k">
                                <li><a href=":url('index/Goods/search',array('q'=>$wd))}">$wd}</a></li>
                            </foreach>
                        </ul>
                    </div>
                </div>
                <div class="type_more ma-to-20">
                    <div class="type-top">
                        <h2>推荐热卖</h2>
                    </div>
                    <div class="tjhot-shoplist type-bot">
                        <tpshop sql="select goods_id,goods_name,shop_price from __PREFIX__goods where is_recommend=1 and is_on_sale = 1 order by goods_id desc limit 10" item="vo" key="k">
                            <div class="alone-shop">
                                <a href=":url('index/Goods/goodsInfo',array('id'=>$vo[goods_id]))}"><img src="" style="display: inline;"></a>
                                <p class="line-two-hidd"></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span></span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                        </tpshop>
                    </div>
                </div>
            </div>
            <div class="deta-ri-ma">
                <div class="introduceshop">
                    <div class="datail-nav-top">
                        <ul>
                            <li class="red"><a href="javascript:void(0);">商品介绍</a></li>
                            <li><a href="javascript:void(0);">规格及包装</a></li>
                            <li><a href="javascript:void(0);">评价<em>(<?php echo $commentStatistics['c0']; ?>)</em></a></li>
                            <li><a href="javascript:void(0);">售后服务</a></li>
                        </ul>
                    </div>
                    <!--<div class="he-nav"></div>-->
                    <div class="shop-describe shop-con-describe p">
                        <div class="deta-descri">
                            <p class="shopname_de"><span>商品名称：</span><span><?php echo $goods['goods_name']; ?></span></p>
                            <div class="ma-d-uli p">
                                <ul>
                                    
                                    <li><span>货号：</span><span><?php echo $goods['goods_sn']; ?></span></li>
                                    
                                    <?php foreach($goods_attr_list as $k=>$v): ?>
                                    <li><span><?php echo $goods_attribute[$v['attr_id']]; ?>：</span><span><?php echo $v['attr_value']; ?></span></li>
                                    <?php endforeach; ?>
                                    
                                </ul>
                            </div>

                            <div class="moreparameter">
                                <!--
                                <a href="">跟多参数<em>>></em></a>
                                -->
                            </div>
                        </div>
                        <div class="detail-img-b">
                            <?php echo htmlspecialchars_decode($goods['goods_content']); ?>
                        </div>
                    </div>
                    <div class="shop-describe shop-con-describe p" style="display: none;">
                        <div class="deta-descri">
                            <!--
                            <p class="shopname_de"><span>如果您发现商品信息不准确，<a class="de_cb" href="">欢迎纠错</a></span></p>
                            -->
                            <h2 class="shopname_de">属性</h2>
                            
                            <?php foreach($goods_attr_list as $k=>$v): ?>
                                <div class="twic_a_alon">
                                    <p class="gray_t"><?php echo $goods_attribute[$v['attr_id']]; ?></p>
                                    <p><?php echo $v['attr_value']; ?></p>
                                </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                    <div class="shop-con-describe p" style="display: none;">
                        <div class="shop-describe p">
                            <div class="comm_stsh ma-to-20">
                                <div class="deta-descri">
                                    <h2>商品评价</h2>
                                </div>
                            </div>
                            <div class="deta-descri p">
                                <ul class="tebj">
                                    <li class="percen"><span><?php echo $commentStatistics['rate1']; ?>%</span></li>
                                    <li class="co-cen">
                                        <div class="comm_gooba">
                                            <div class="gg_c">
                                                <span class="hps">好评</span>
                                                <span class="hp">（<?php echo $commentStatistics['rate1']; ?>%）</span>
                                                <span class="zz_rg"><i style="width: <?php echo $commentStatistics['rate1']; ?>%;"></i></span>
                                            </div>
                                            <div class="gg_c">
                                                <span class="hps">中评</span>
                                                <span class="hp">（<?php echo $commentStatistics['rate2']; ?>%）</span>
                                                <span class="zz_rg"><i style="width: <?php echo $commentStatistics['rate2']; ?>%;"></i></span>
                                            </div>
                                            <div class="gg_c">
                                                <span class="hps">差评</span>
                                                <span class="hp">（<?php echo $commentStatistics['rate3']; ?>%）</span>
                                                <span class="zz_rg"><i style="width: <?php echo $commentStatistics['rate3']; ?>%;"></i></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="tjd-sum">
                                        <!--<p class="tjd">推荐点：</p>-->
                                        <div class="tjd-a">
                                            买家评论事项：购买后有什么问题, 满意, 或者不不满, 都可以在这里评论出来, 这里评论全部源于真实的评论.
                                        </div>
                                    </li>
                                    <li class="te-cen">
                                        <div class="nchx_com">
                                            <p>您可以对已购的商品进行评价</p>
                                            <a class="jfnuv" href="<?php echo url('index/User/comment'); ?>">发表评论</a>
                                            <!--<p class="xja"><span>详见</span><a class="de_cb" href="">积分规则</a></p>-->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="deta-descri p">
                                <div class="cte-deta">
                                    <ul id="fy-comment-list">
                                        <li data-t="1" class="red">
                                            <a href="javascript:void(0);" class="selected">全部评论（<?php echo $commentStatistics['c0']; ?>）</a>
                                        </li>
                                        <li data-t="2">
                                            <a href="javascript:void(0);">好评（<?php echo $commentStatistics['c1']; ?>）</a>
                                        </li>
                                        <li data-t="3">
                                            <a href="javascript:void(0);">中评（<?php echo $commentStatistics['c2']; ?>）</a>
                                        </li>
                                        <li data-t="4">
                                            <a href="javascript:void(0);">差评（<?php echo $commentStatistics['c3']; ?>）</a>
                                        </li>
                                        <li data-t="5">
                                            <a href="javascript:void(0);">有图（<?php echo $commentStatistics['c4']; ?>）</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="line-co-sunall"  id="ajax_comment_return">
                            </div>
                        </div>
                    </div>
                    <div class="shop-con-describe p" style="display: none;">
                        <div class="shop-describe p">
                            <div class="comm_stsh ma-to-20">
                                <div class="deta-descri">
                                    <h2>售后保障</h2>
                                </div>
                            </div>
                            <div class="deta-descri p">
                                <div class="securi-afr">
                                    <ul>
                                        <li class="frhe"><i class="detai-ico msz1"></i></li>
                                        <li class="wnuzsuhe">
                                            <h2>卖家服务</h2>
                                            <p>全国联保一年</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="frhe"><i class="detai-ico msz2"></i></li>
                                        <li class="wnuzsuhe">
                                            <h2>商城承诺</h2>
                                            <p>商城平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！
注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。
只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="frhe"><i class="detai-ico msz3"></i></li>
                                        <li class="wnuzsuhe">
                                            <h2>正品行货</h2>
                                            <p>商城向您保证所售商品均为正品行货，商城自营商品开具机打发票或电子发票。</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="frhe"><i class="detai-ico msz4"></i></li>
                                        <li class="wnuzsuhe">
                                            <h2>全国联保</h2>
                                            <p>凭质保证书及商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由联系保修，享受法定三包售后服务），与您亲临商场选购的商品享
受相同的质量保证。商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！ </p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="frhe"><i class="detai-ico msz5"></i></li>
                                        <li class="wnuzsuhe">
                                            <h2>退货无忧</h2>
                                            <p>客户购买商城自营商品7日内（含7日，自客户收到商品之日起计算），在保证商品完好的前提下，可无理由退货。（部分商品除外，详情请见各商品细则）</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="comm_stsh ma-to-20">
                                <div class="deta-descri">
                                    <h2>退款说明</h2>
                                </div>
                            </div>
                            <div class="deta-descri p">
                                <div class="fetbajc">
                                    <p>1.若您购买的家电商品已经拆封过，需要退换货，需请联系原厂开具鉴定检测单</p>
                                    <p>2.签收商品隔日起七日内提交退货申请，2-3天快递员与您联系安排取回商品</p>
                                    <p>3.商品退回检验，且必须附上检测单</p>
                                    <p>5.若退回商品有缺件、影响二次销售状况时，退款作业将暂时停止，飞牛网会依商品状况报价，后由客服人员与您联系说明并于订单内扣除费用后退回剩余款项，
或您可以取消退货申请；若符合退货条件者将于商品取回后约1-2个工作日内完成退款</p>
                                    <p>4.通过线上支付的订单办理退货，商品退回检验无误后，商城将提交退款申请, 实际款项会依照各银行作业时间返还至您原支付方式 若您采用货到付款，请于
办理退货时提供退款账户，亦于商品退回检验无误后，将退款汇至您的银行账户中</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-s-->
    <div class="footer p">

        include file="public/footer_index" /}
        include file="public/sidebar_cart" /}
    </div>
<!--看了又看-s-->
<div style="display: none" id="look_see">
    
    <?php foreach($look_see as $k=>$look): ?>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="<?php echo url('Index/Goods/goodsInfo',array('id'=>$look['goods_id'])); ?>"><img class="wiahides" src="<?php echo goods_thum_images($look['goods_id'],206,206); ?>" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="<?php echo url('Index/Goods/goodsInfo',array('id'=>$look['goods_id'])); ?>"><?php echo $look['goods_name']; ?></a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span><?php echo $look['shop_price']; ?></span>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
    
    
<!--看了又看-s-->
</div>
    <!--footer-e-->
    <script src="/static/index/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/index/js/popt.js" type="text/javascript" charset="utf-8"></script>
    <!--------收货地址，物流运费-开始-------------->
    <script src="/static/index/js/location.js"></script>
    <!--------收货地址，物流运费--结束-------------->
    <script type="text/javascript" src="/static/index/js/headerfooter.js" ></script>
    <script type="text/javascript">
        var commentType = 1;// 默认评论类型
        $(document).ready(function () {
            /*商品缩略图放大镜*/
            $(".jqzoom").jqueryzoom({
                xzoom: 500,
                yzoom: 500,
                offset: 1,
                position: "right",
                preload: 1,
                lens: 1
            });
            get_goods_price();
            ajaxComment(commentType,1);// ajax 加载评价列表
            replace_look();
        });

        //看了又看切换
        var tmpindex = 0;
        var look_see_length = $('#look_see').children().length;
        function replace_look(){
            var listr='';
            if(tmpindex*2>=look_see_length) tmpindex = 0;
            $('#look_see').children().each(function(i,o){
                if((i>=tmpindex*2) && (i<(tmpindex+1)*2)){
                    listr += '<div class="tjhot-shoplist type-bot">'+$(o).html()+'</div>';
                }
            });
            tmpindex++;
            $('#see_and_see').empty().append(listr);
        }

        var store_count = <?php echo $goods['store_count']; ?>; // 商品起始库存
        //缩略图切换
        $('.small-pic-li').each(function (i, o) {
            var lilength = $('.small-pic-li').length;
            $(o).hover(function () {
                $(o).siblings().removeClass('active');
                $(o).addClass('active');
                $('#zoomimg').attr('src', $(o).find('img').attr('data-img'));
                $('#zoomimg').attr('jqimg', $(o).find('img').attr('data-big'));

                $('.next-btn').removeClass('disabled');
                if (i == 0) {
                    $('.next-left').addClass('disabled');
                }
                if (i + 1 == lilength) {
                    $('.next-right').addClass('disabled');
                }
            });
        })

        //前一张缩略图
        $('.next-left').click(function () {
            var newselect = $('.small-pic>.active').prev();
            $('.small-pic>.active').removeClass('active');
            $(newselect).addClass('active');
            $('#zoomimg').attr('src', $(newselect).find('img').attr('data-img'));
            $('#zoomimg').attr('jqimg', $(newselect).find('img').attr('data-big'));
            var index = $('.small-pic>li').index(newselect);
            if (index == 0) {
                $('.next-left').addClass('disabled');
            }
            $('.next-right').removeClass('disabled');
        })

        //后前一张缩略图
        $('.next-right').click(function () {
            var newselect = $('.small-pic>.active').next();
            $('.small-pic>.active').removeClass('active');
            $(newselect).addClass('active');
            $('#zoomimg').attr('src', $(newselect).find('img').attr('data-img'));
            $('#zoomimg').attr('jqimg', $(newselect).find('img').attr('data-big'));
            var index = $('.small-pic>li').index(newselect);
            if (index + 1 == $('.small-pic>li').length) {
                $('.next-right').addClass('disabled');
            }
            $('.next-left').removeClass('disabled');
        })
        $(function(){
            $("#area").click(function (e) {
                SelCity(this,e);
            });
        })
        //切换规格
//        $(function(){
//            $('.colo a').click(function(){
//                $(this).addClass('red').siblings('a').removeClass('red');
//            })
//        })
        $(function() {
            // 好评差评 切换
            $('.cte-deta ul li').click(function(){
                $(this).addClass('red').siblings().removeClass('red');
                commentType = $(this).data('t');// 评价类型   好评 中评  差评
                ajaxComment(commentType,1);
            })
        });
        $(function(){
            $('.datail-nav-top ul li').click(function(){
                $(this).addClass('red').siblings().removeClass('red');
                var er = $('.datail-nav-top ul li').index(this);
                $('.shop-con-describe').eq(er).show().siblings('.shop-con-describe').hide();
            })
        })


        /**
         * 加减数量
         * n 点击一次要改变多少
         * maxnum 允许的最大数量(库存)
         * number ，input的id
         */
        function altergoodsnum(n){
            var num = parseInt($('#number').val());
            var maxnum = parseInt($('#number').attr('max'));
            num += n;
            num <= 0 ? num = 1 :  num;
            if(num >= maxnum){
                $(this).addClass('no-mins');
                num = maxnum;
            }
            $('#store_count').text(maxnum-num); //更新库存数量
            $('#number').val(num)
        }

        function get_goods_price()
        {
            var goods_price = <?php echo $goods['shop_price']; ?>; // 商品起始价
            var store_count = <?php echo $goods['store_count']; ?>; // 商品起始库存
            var spec_goods_price = <?php echo $spec_goods_price; ?>;  // 规格 对应 价格 库存表   //alert(spec_goods_price['28_100']['price']);
            // 优先显示抢购活动库存
           /**/
            // 如果有属性选择项
            if(spec_goods_price != null && spec_goods_price !='')
            {
                goods_spec_arr = new Array();
                $("input[name^='goods_spec']:checked").each(function(){
                    goods_spec_arr.push($(this).val());
                });
                var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
                goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格
                store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存
            }

            var goods_num = parseInt($("#goods_num").val());
            // 库存不足的情况
            if(goods_num > store_count)
            {
                goods_num = store_count;
                layer.alert('库存仅剩 '+store_count+' 件',{icon:2});
                $("#goods_num").val(goods_num);
            }
            $('#store_count').html(store_count);    //对应规格库存显示出来
            $('#number').attr('max',store_count); //对应规格最大库存
            $("#goods_price").html('<span>￥</span><span>'+goods_price+'</span>'); // 变动价格显示
        }
        /***用作 sort 排序用*/
        function sortNumber(a,b)
        {
            return a - b;
        }

        /***收藏商品**/
        
        $('#collectLink').click(function(){
            if(getCookie('user_id') == ''){
                layer.msg('请先登录！', {icon: 1});
            }else{
                $.ajax({
                    type:'post',
                    dataType:'json',
                    data:{goods_id:$('input[name="goods_id"]').val()},
                    url:"<?php echo url('index/Goods/collect_goods'); ?>",
                    success:function(res){
                        if(res.status == 1){
                            layer.msg('成功添加至收藏夹', {icon: 1});
                        }else{
                            layer.msg(res.msg, {icon: 3});
                        }
                    }
                });
            }
        });

        /***用ajax分页显示评论**/
        function ajaxComment(commentType,page){
            $.ajax({
                type : "GET",
                url:"/index.php?m=Index&c=goods&a=ajaxComment&goods_id=<?php echo $goods['goods_id']; ?>&commentType="+commentType+"&p="+page,//+tab,
                success: function(data){
                    $("#ajax_comment_return").html('');
                    $("#ajax_comment_return").append(data);
                }
            });
        }
        //ajaxComment(1,1);
        /**
         * 切换图片
         */
        function switch_zooming(img)
        {
            if(img != ''){
                $('#zoomimg').attr('jqimg', img);
                $('#zoomimg').attr('src', img);
            }
        }
    </script>
	</body>
</html>
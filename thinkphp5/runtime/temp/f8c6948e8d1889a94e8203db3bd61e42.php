<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"C:\wamp\www\shop\TP_shop\thinkphp5\public/../application/index\view\index\index.html";i:1501213538;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商城首页</title>

 
    <link rel="stylesheet" type="text/css" href="/static/index/css/alone_index.css"/>
    <script src="/static/index/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/global.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="static/images/favicon.ico" media="screen"/>

</head>
<body class="gray_f5">
    <!--header-s-->
    <div class="tpshop-tm-hander tp_h_alone p">
        <!--导航栏-s-->
        <div class="top-hander p">
            <div class="w1224 pr p">
                <div class="fl">
                    <!-- 收货地址，物流运费 -start-->
                    <link rel="stylesheet" href="/static/index/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
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
                        <?php if(empty ($appa)): ?>
                            <a class="red" href="Index/user/login">Hi.请登录</a>
                            <a href="Index/user/reg">免费注册</a>
                            <?php else: ?>
                            <a class="red" href="Index/user/login"><?php echo $appa; ?></a>
                            <a  href="Index/user/logout"  title="退出" target="_self">安全退出</a>
                            <?php endif; ?>

                            
                        </div>
                        <div class="fl islogin">
                            <a class="red userinfo" href="<?php echo url('Index/user/index'); ?>" ></a>
                            <a  href="Index/user/logout"  title="退出" target="_self">安全退出</a>
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
                    <a href="<?php echo url('Index/index'); ?>" class="logo"> <img src="$tpshop_config['store_logo']}"></a>
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
                        <a href="Index/Cart/cart">
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
                        <a href="<?php echo url('Home/Goods/all_category'); ?>" target="_blank"><i class="share-a_a2"></i>商品分类</a>
                    </div>
                    <!--全部商品分类-s-->
                    <div class="dd">
                        <div class="cata-nav">
                            <!-- 外层循环点-->
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
                                        <?php foreach($v['tmenu'] as $k2=>$v2): if($v2['parent_id'] == $v['id']): ?>
                                                <dl><!-- 2级循环点-->
                                                    <dt>
                                                        <a href="<?php echo url('Home/Goods/goodsList',array('id'=>$v2['id'])); ?>" target="_blank"><?php echo $v2['name']; ?><i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                        <?php foreach($v2['sub_menu'] as $k3=>$v3): ?>
                                                        
                                                            <if condition="$v3['parent_id'] eq $v2['id']">
                                                            <a href="<?php echo url('Home/Goods/goodsList',array('id'=>$v3['id'])); ?>" target="_blank"><?php echo $v3['name']; ?></a></if>
                                                        
                                                        <?php endforeach; ?>
                                                    </dd>
                                                </dl>
                                                <?php endif; endforeach; ?>
                                            <!--商品分类底部广告-s-->
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
                                            <!--商品分类底部广告-e-->
                                        </div>
                                    </div>
                                    <!--商品分类右侧广告-s-->
                                    <div class="cata-nav-rigth">
                                        <?php foreach($ad51 as $adk=>$adv): ?>
                                        
                                            <a href="<?php echo $adv['ad_link']; ?>" <?php if($adv['target'] == 1): ?>target="_blank"<?php endif; ?>>
                                                <img src="<?php echo $adv['ad_code']; ?>" title="<?php echo $adv['ad_name']; ?>" style="$adv[style]}"/>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <!--商品分类右侧广告-e-->
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
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
    <!--header-e-->
    <!--轮播图-s-->
    <div id="myCarousel" class="carousel slide p header-tp" data-ride="carousel">
        <ol class="carousel-indicators">

        </ol>
        <div class="carousel-inner">
            <?php foreach($ad2 as $adk=>$adv): ?>
                <div class="item <?php if($adk++ == 1): ?>active<?php endif; ?>" style="background:white;">
                    <a href="<?php echo $adv['ad_link']; ?>"<?php if($adv['target'] == 1): ?>target="_blank"<?php endif; ?>>
                        <img  src="<?php echo $adv['ad_code']; ?>" title="<?php echo $adv['ad_name']; ?>" style="$adv['style']}">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        <!--轮播图右侧广告-s-->
        <div class="adcertiserment_head">
            <div class="w1224">
                <ul>
                    <?php foreach($ad52 as $adk=>$adv): ?>
                        <li>
                            <a href="<?php echo $adv['ad_link']; ?>" <?php if($adv['target'] == 1): ?>target="_blank"<?php endif; ?>>
                            <img src="<?php echo $adv['ad_code']; ?>" title="<?php echo $adv['ad_name']; ?>" style="$v[style]}"/>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!--轮播图右侧广告-e-->
    </div>
    <!--轮播图-e-->
    <!--轮播图底部广告-s-->
    <div class="adv3 p">
        <div class="w1224">
            <ul>
                <?php foreach($ad53 as $adk=>$adv): ?>
                    <li>
                        <a href="<?php echo $adv['ad_link']; ?>" <?php if($adv['target'] == 1): ?>target="_blank"<?php endif; ?>>
                            <img src="<?php echo $adv['ad_code']; ?>" title="<?php echo $adv['ad_name']; ?>" style="$v[style]}"/>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!--轮播图底部广告-e-->
    <div class="adver_line">
        <div class="w1224">
            <?php foreach($ad3 as $adk=>$adv): ?>
                <a href="<?php echo $adv['ad_link']; ?>" <?php if($adv['target'] == 1): ?>target="_blank"<?php endif; ?>>
                <img src="<?php echo $adv['ad_code']; ?>" width="1200" height="160"  title="<?php echo $adv['ad_name']; ?>" style="$v[style]}"/>
                </a> 
            <?php endforeach; ?>
        </div>
    </div>


<!--------楼层-开始-------------->
   <?php if(!empty($cateList)): foreach($cateList as $k=>$v): ?>
    <!--商品楼层-s-->
        <div class="layer-floor " id="floor<?php echo $k+1; ?>">
            <div class="w1224">
            <div class="top_title_layer p">
                <div class="part-title"><?php echo $v['name']; ?></div>
                <div class="part-hot">
                    <ul>
                        
                        <?php foreach($v['tmenu'] as $k2=>$v2): ?>
                            <li>
                                <a href="<?php echo url('Home/Goods/goodsList',array('id'=>$v2['id'])); ?>"><?php echo $v2['name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="main_layer p">

                <div class="hoste_ri">
                    <ul>
                        
                        <?php foreach($v['hot_goods'] as $gk=>$g): if($gk < 8): ?>
                                <li>
                                    <a href="<?php echo url('Index/Goods/goodsInfo',array('id'=>$g['goods_id'])); ?>">
                                        <img class="picture_main" src="<?php echo goods_thum_images($g['goods_id'],200,200); ?>"/>
                                        <span class="name_main"><?php echo $g['goods_name']; ?></span>
                                        <?php 
    
                                        ?>
                                        <span class="price_main"><i>￥</i><?php echo $g['shop_price']; ?></span>
                                    </a>
                                </li>
                            <?php endif; endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    <!--商品楼层-e-->
    <?php endforeach; endif; ?>
    <!--楼层导航-s-->
    <div class="floornav_left">
        <ul>
            
            <?php foreach($cateList as $k=>$v): ?>
                <li class="elevators">
                    <a ><?php echo $k+1; ?>F<span class="cofin_floor"><?php echo $v['name']; ?></span></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!--楼层导航-e-->
<!--------楼层-结束-------------->

    <!--footer-s-->
    <div class="foot-alone tp_h_alone">
        <div class="foot-banner">
            <div class="w1224">
                <div class="sum_baner">
                    <div class="baner-item">
                        <a href="">
                            <i class="icon1">7</i>
                            7天无理由退货
                        </a>
                    </div>
                    <div class="baner-item">
                        <a href="">
                            <i class="icon1">15</i>
                            15天免费换货
                        </a>
                    </div>
                    <div class="baner-item">
                        <a href="">
                            <i class="icon1">99</i>
                            满99元包邮
                        </a>
                    </div>
                    <div class="baner-item">
                        <a href="">
                            <i class="icon1">服</i>
                            手机特色服务
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot-main">
            <div class="w1224">
                <div class="sum_main">
                    tpshop标签文章分类
                    <dl class="foot-con continue">
                        <dt>联系我们</dt>
                        <dd>
                            <span class="cellphone_con">$tpshop_config['phone']}</span>
                            <span class="time_con">周一至周日8:00-18:00</span>
                            <span class="cost_con">（仅收市话费）</span>
                            <a class="software_con" href="tencent://message/?uin=$tpshop_config['qq']}&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
                                <img src="__STATIC__/images/continue.png"/>
                            </a>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="foot-bottom">
            <p>Copyright © 2016-2025 $tpshop_config['shop_info_store_name']|default='TPshop商城'} 版权所有 保留一切权利 备案号:$tpshop_config['shop_info_record_no']}</p>
        </div>
    </div>
    <!--侧边栏-s-->
    <div class="tp_h_alone">
        <div class="slidebar_alo">
            <ul>
                <li class="re_cuso"><a title="点击这里给我发消息" href="tencent://message/?uin=$tpshop_config['qq']}&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">客服服务</a></li>
                <li class="re_wechat">
                    <a target="_blank" href="" >微信关注</a>
                    <div class="rtipscont" style="">
                        <span class="arrowr-bg"></span>
                        <span class="arrowr"></span>
                        <img src="__STATIC__/images/qrcode.png" />
                        <p class="tiptext">扫码关注官方微信<br>先人一步知晓促销活动</p>
                    </div>
                </li>
                <li class="re_phone">
                    <a target="_blank" href="<?php echo url('Mobile/Index/index'); ?>" >手机商城</a>
                    <div class="rtipscont rstoretips" style="">
                        <span class="arrowr-bg"></span>
                        <span class="arrowr"></span>
                        <img src="__STATIC__/images/qrcode.png" />
                        <p class="tiptext">扫码关注官方微信<br>先人一步知晓促销活动</p>
                    </div>
                </li>
                <li class="re_top"><a target="_blank" href="javascript:void(0);" >回到顶部</a></li>
            </ul>
        </div>
    </div>
    <!--侧边栏-e-->
    <!--footer-e-->
    <script src="/static/index/js/common.js" type="text/javascript" charset="utf-8"></script>
    <!-- 轮播插件 -->
    <script src="/static/index/js/carousel.js" type="text/javascript" charset="utf-8"></script>

    <script src="/static/index/js/transition.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/index/js/headerfooter_alone.js" type="text/javascript" charset="utf-8"></script>
    <!--------收货地址，物流运费-开始-------------->
    <script src="/static/index/js/location.js"></script>
    <!--------收货地址，物流运费--结束-------------->
    <script type="text/javascript">
        $(function() {
            //首页商品分类显示
            $('.categorys2 .dd').show();
            //alert(getCookie('uname'));

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
        $(function() { //轮播自动播放
            $(".carousel").carousel({interval: 2000});
        });
        $(function() { //floor分类鼠标滑动
            $(".f_tab li").each(function() {
                $(this).hoverDelay({
                    hoverEvent: function() {
                        $(this).addClass('ft');
                        $(this).siblings().removeClass('ft');
                    },
//                      outEvent: function(){
//                          $(this).siblings().removeClass('ft'); 
//                      }
                });
            })
        });
        /**
         * 鼠标移动端到头部购物车上面 就ajax 加载
         */
        // 鼠标是否移动到了上方
        var header_cart_list_over = 0;
        $("#hd-my-cart > .c-n").hover(function(){
            if(header_cart_list_over == 1)
                return false;
            header_cart_list_over = 1;

             $.ajax({
                        type : "GET",
                        url:"/index/cart/header_cart_list",
                        //data : $('#buy_goods_form').serialize(),// 你的formid 搜索表单 序列化提交                        
                        dataType:'json',
                        success: function(data){    
                                $("#show_minicart").html(data);
                            }
              });
                     


        })
    //楼层按钮
        //楼层添加data-mid
    $(function(){
        var Dum = {};
        Dum.brand = {
            i:0,
            ri:function(e){
                $(e).each(function(){
                    $(this).attr('id','brand_' + Dum.brand.i);
                    Dum.brand.i++
                })
                Dum.brand.i = 0;
                return Dum.brand.i;
            },
        }
        Dum.brand.ri(".layer-floor");
    })
    //侧边导航
    $(function(){
        $(window).scroll(function(){
            var main_brand = $('.adv3').offset().top;
            var scr = $(document).scrollTop();
            if(scr >= main_brand){
                $('.floornav_left').addClass('showfloornav');
            }else{
                $('.floornav_left').removeClass('showfloornav');
            }
        })

        var _index=0;
        var scr = $(document).scrollTop();
        $(".floornav_left ul li").click(function(){
            _index=$(this).index();
            //通过拼接字符串获取元素，再取得相对于文档的高度
            var _top=$("#brand_"+_index).offset().top + 1;//Firefox有1px的误差
            //scrollTop滚动到对应高度
            $("body,html").animate({scrollTop:_top},500);
        });
        $(window).scroll(function(){
            var tj = [];
            var strlength = $('.layer-floor').length;
            var stheigh = $('.layer-floor').eq(strlength - 1).height();//最后一个楼层的高度
            var scr = $(document).scrollTop();
            $('.layer-floor').each(function(i){
                var sthei = $(this).offset().top;
                tj.push(sthei);//楼层距离顶部的高度添加进数组
            })
            for(var n = 0;n < strlength;n++){
                if(scr >= tj[n] && scr <= tj[n] + stheigh){
                    $(".floornav_left ul li").eq(n).addClass("darkshow").siblings().removeClass("darkshow");
                }
            }
        });
    })
    </script>
</body>
</html>

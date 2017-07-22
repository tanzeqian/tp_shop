<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp64\www\tp5\public/../application/index\view\goods\goodsinfo.html";i:1500688748;}*/ ?>
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
    <script src="/static/js/global.js"></script>
    <script src="/static/js/pc_common.js"></script>
    <link rel="stylesheet" href="/static/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
</head>

<body>
<!--header-s-->
include file="public/header" w="w1224"/}
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
                <!--商品抢购 start-->
                <!-- <notempty name="goods['flash_sale']">
                    <div class="presale-time">
                        <div class="pre-icon fl">
                            <span class="ys"><i class="detai-ico"></i>抢购活动</span>
                        </div>
                        <div class="pre-icon fr">
                            <span class="per"><i class="detai-ico"></i><em>0</em>人预定</span>
                            <span class="ti"><i class="detai-ico"></i>剩余时间：<span id="surplus_text"></span></span>
                        </div>
                        <script>
                            // 倒计时
                           /**/
                        </script>
                    </div>
                </notempty> -->
                <!--商品抢购  end-->
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
                <if condition="$goods['exchange_integral'] gt 0">
                    <div class="standard p">
                        <ul>
                            
                        </ul>
                    </div>
                </if>

                <!-- 规格 start [[-->
                
                    
                    <?php foreach($filter_spec as $k=>$v): ?>
                        <div class="standard p">
                            <ul>
                                <li class="jaj"><span><?php echo $k; ?>：</span></li>
                                <li class="lawir colo">
                                    
                                    <?php foreach($v as $k2=>$v2): if($v2['src'] != ''): ?>

                                        <input type="radio" style="display: none" rel="<?php echo $v2['item']; ?>" name="goods_spec[<?php echo $k; ?>]" value="<?php echo $v2['item_id']; ?>"  <?php if($k2 == 0): ?>checked="checked"<?php endif; ?>/>
                                        <a   onclick="switch_zooming('<?php echo $v2['src']; ?>');select_filter(this); <?php if(!empty($v2['src'])): ?> $('#zoomimg').attr('src','<?php echo $v2['src']; ?>')<?php endif; ?>" <?php if($k2 == 0): ?> class="red"<?php endif; ?>>
                                        <img src="<?php echo $v2['src']; ?>" style="width: 40px;height: 40px;"/>
                                        <span class="dis_alintro"><?php echo $v2['item']; ?></span>
                                        </a>
                                        <else/>
                                        <input type="radio" style="display: none" rel="<?php echo $v2['item']; ?>" name="goods_spec[<?php echo $k; ?>]" value="<?php echo $v2['item_id']; ?>"  <?php if($k2 == 0): ?>checked="checked"<?php endif; ?>/>
                                        <a   onclick="select_filter(this);" <?php if($k2 == 0): ?> class="red"<?php endif; ?>><?php echo $v2['item']; ?></a>
                                    <?php endif; endforeach; ?>
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
                    <a class="paybybill" href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,1);">立即购买</a>
                    <a class="addcar" href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,0);"><i class="sk"></i>加入购物车</a>
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
                            <foreach name="goods_attr_list" item="v" key="k">
                                <div class="twic_a_alon">
                                    <p class="gray_t"><?php echo $goods_attribute[$v['attr_id']]; ?></p>
                                    <p><?php echo $v['attr_value']; ?></p>
                                </div>
                            </foreach>
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

        <include file="public/footer_index" />
        <include file="public/sidebar_cart" />
    </div>
<!--看了又看-s-->
<div style="display: none" id="look_see">
    
    看了又看
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
                url:"/index.php?m=Home&c=goods&a=ajaxComment&goods_id=<?php echo $goods['goods_id']; ?>&commentType="+commentType+"&p="+page,//+tab,
                success: function(data){
                    $("#ajax_comment_return").html('');
                    $("#ajax_comment_return").append(data);
                }
            });
        }
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
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp64\www\tp5\public/../application/index\view\user\index.html";i:1501058575;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的账户</title>
		<link rel="stylesheet" type="text/css" href="/static/index/css/tpshop.css" />
		<link rel="stylesheet" type="text/css" href="/static/index/css/myaccount.css" />
		<link rel="shortcut  icon" type="image/x-icon" href="/static/index/images/favicon.ico" media="screen"  />
		<script src="/static/index/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body class="bg-f5">
		include file="user/header"/}
		<div class="home-index-middle">
			<div class="w1224">
				<div class="g-crumbs">
			       	<a href="<?php echo url('Index/User/index'); ?>">我的商城</a>
			    </div>
			    <div class="home-main">
					include file="user/menu"/}
			    	<div class="ri-menu fr">
			    		<div class="menu-ri-t p">
			    			<div class="mu-head fl">
			    				<img width="100" height="100" src="<?php echo (isset($user['head_pic']) && ($user['head_pic'] !== '')?$user['head_pic']:'/static/images/pers.png'); ?>"/>
			    			</div>
			    			<div class="mu-midd fl">
			    				<a class="mu-m-phone" href="<?php echo url('Index/User/index'); ?>"><?php echo $user['nickname']; ?></a>
			    				<a class="mu-m-vip">注册会员</a>
			    				
			    			</div>
			    			<div class="mu-afte fl">
			    				<ul class="mu-a1">
			    					
			                        <li class="">
			                            <a href="<?php echo url('Home/User/recharge'); ?>">
			                               <i class="icon-balance"></i>
			                               <span>账户余额</span>
			                               <em class="mu-unit">&nbsp;元</em>
			                               <em class="mu-num"><?php echo $user['user_money']; ?></em>
			                               <i class="icon-ar"></i>
			                            </a>
			                        </li>
			    				</ul>
			    				<ul class="mu-a2">
			    					
			                        <li>
			                            
			                        </li>
			    				</ul>
			    			</div>
			    		</div>
			    		<div class="order-list p">
			    			<div class="ddlb-ayh">
			    				<div class="ddlb-tit">
			                       <h1>我的订单</h1>
			                       <a class="u-view-all" href="<?php echo url('Home/User/order_list'); ?>">查看全部订单</a>
			                       <!--<i class="u-sep"></i>-->
			                       <!--<a class="u-view-pre" href="">预售单<span class="hide">(待付款 <em>0</em>)</span></a>-->
			    				</div>
								
								<?php if(empty($limitorder) || ($limitorder instanceof \think\Collection && $limitorder->isEmpty())): ?>
									<div class="car-none-pl">
										<i class="account-acco1"></i>您最近没有待处理订单，<a href="/">快去逛逛吧~</a>
									</div>
								<?php endif; ?>
								<div class="order-alone-li">
									
									<?php foreach($data as $list): 
           									$list = set_btn_order_status($list);  // 添加属性  包括按钮显示属性 和 订单状态显示属性
           								?>
										<table width="100%" border="" cellspacing="" cellpadding="">
											<tr class="time_or">
												<td colspan="6">
													<div class="fl_ttmm">
														<span class="time-num">下单时间：<em class="num"><?php echo date('Y-m-d H:i:s',$list['add_time']); ?></em></span>
														<span class="time-num">订单编号：<em class="num"><?php echo $list['order_sn']; ?></em></span>
														<div class="paysoon">
														<?php if($list['pay_btn'] == 1): ?>
															<a class="ps_lj" href="<?php echo url('/Home/Cart/cart4',array('order_id'=>$list['order_id'])); ?>"  target="_blank">立即支付</a>
														<?php endif; if($list['receive_btn'] == 1): ?>
															<a onclick=" if(confirm('你确定收到货了吗?')) location.href='<?php echo url('Home/User/order_confirm',array('id'=>$list['order_id'])); ?>'"  href="javascript:void(0);" class="ps_lj">确认收货</a>
														<?php endif; if($list['cancel_btn'] == 1): ?>
															<a class="consoorder" href="javascript:void(0);" onClick="cancel_order(<?php echo $list['order_id']; ?>)" >取消订单</a>
														<?php endif; ?>
														</div>
														<!--<div class="dele"></div>-->
													</div>
													<div class="fr_ttmm"></div>
												</td>
											</tr>
											
												<tr class="conten_or">
													<td class="sx1">
														<div class="shop-if-dif">
															<div class="shop-difimg">
																<img src="<?php echo goods_thum_images($list['goods_id'],100,100); ?>"/>
															</div>
															<div class="shop_name"><a href="<?php echo url('Index/Goods/goodsInfo',array('id'=>$list['goods_id'])); ?>"><?php echo $list['goods_name']; ?></a></div>
														</div>
													</td>
													<td class="sx2"><span>￥</span><span><?php echo $list['member_goods_price']; ?></span></td>
													<td class="sx3">x<?php echo $list['goods_num']; ?></td>
													if condition="$key eq 0"}
														<td class="sx4" rowspan="$goods_list|count}">
															<div class="pric_rhz">
																<p class="d_pri"><span>￥</span><span><?php echo $list['total_amount']; ?></span></p>

																<p class="d_yzo">
																	<span>含运费：</span>
																	<span><?php echo $list['shipping_price']; ?></span></p>
																<p class="d_yzo"><a href="javascript:void(0);"><?php echo $list['pay_name']; ?></a></p>
															</div>
														</td>
													{/if}
													<td class="sx5">
														<div class="detail_or">
															<p class="d_yzo">
																<?php if($list['is_comment'] == 1): ?>
																	已完成
																	<?php elseif($list['is_comment'] != 1 and $list['shipping_status'] == 2): if($list['is_send'] == 0): ?>
																		待发货
																		<?php else: ?>
																		已发货
																	<?php endif; else: ?>
																	<?php echo $list['order_status_desc']; endif; ?>
                                                            </p>
                                                            <p><a href="<?php echo url('Index/User/order_detail',array('id'=>$list['order_id'])); ?>">查看详情</a></p>
															
														</div>
													</td>
													<td class="sx6">
														<div class="rbac">
															<?php if(($list['return_btn'] == 1) and ($list['is_send'] < 2)): ?>
																<p><a href="<?php echo url('Index/User/return_goods',array('order_id'=>$list['order_id'],'order_sn'=>$list['order_sn'],'goods_id'=>$list['goods_id'],'spec_key'=>$list['spec_key'],'goods_num'=>$list['goods_num'])); ?>">退货/退款</a></p>
															<?php endif; ?>
															<p class=""><a href="<?php echo url('Home/Goods/goodsInfo',array('id'=>$list['goods_id'])); ?>">再次购买</a></p>
															<?php if(($list['comment_btn'] == 1) and ($list['is_comment'] == 0)): ?>
																<p class="inspect"><a href="<?php echo url('Home/User/comment'); ?>">评价</a></p>
															<?php endif; ?>
														</div>
													</td>
												</tr>
											</tpshop>
										</table>
									<?php endforeach; ?>
								</div>
			    			</div>
			    		</div>
			    		<div class="order-list bgno p">
			    			<div class="ddlb-zy">
			    				<div class="coll-coupon fl">
			    					<div class="coll-etl">
										<tpshop sql="select c.*,g.shop_price from __PREFIX__goods_collect c INNER JOIN __PREFIX__goods g on c.goods_id = g.goods_id  where c.user_id = $user[user_id] order by collect_id desc limit 3" result_name="collect_result"></tpshop>
										<div class="ddlb-tit">
					                       <h1>我的收藏</h1>
					                       
					                       <a class="u-view-all" href="<?php echo url('Home/User/goods_collect'); ?>">查看更多</a>
					    				</div>
					    				<div class="shop-sc-t">
					    					<ul>
												
					    					</ul>
					    				</div>
			    					</div>
			    				</div>
			    				<div class="coll-coupon malrh fl">
			    					<div class="coupon-etl">
			    						<div class="ddlb-tit">
					                       <h1>我的优惠券</h1>
					                       <a class="u-view-all" href="<?php echo url('Home/User/coupon'); ?>">查看更多</a>
					    				</div>
					    				<div class="shop-sc-t">
											
					    				</div>
			    					</div>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
		<div class="footer p"><include file="public/footer_index" /> </div>
    <script>
        //取消订单
        function cancel_order(id){
            layer.confirm('确定取消订单?', {
                        btn: ['确定','取消'] //按钮
                    }, function(){
                        // 确定
                        location.href = "/index.php?m=Index&c=User&a=cancel_order&id="+id;
                    }, function(index){
                        layer.close(index);
                    }
            );
        }    </script>
	</body>
</html>
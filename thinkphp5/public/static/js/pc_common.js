//  /**
//  * addcart 将商品加入购物车
//  * @goods_id  商品id
//  * @num   商品数量
//  * @form_id  商品详情页所在的 form表单
//  * @to_catr 加入购物车后再跳转到 购物车页面 默认不跳转 1 为跳转
//  */

// function add2(){

// 	console.log(222);
// }

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
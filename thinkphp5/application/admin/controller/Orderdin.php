<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Order;
use app\admin\model\Order_goods;
use app\admin\model\Goods;
use app\admin\model\Region2;
class Orderdin extends Controller
{
	protected $order;
	public function _initialize()
	{
		$this->order_goods = new Order_goods();
		$this->order = new Order();
		$this->city = new Region2();
	}
	//订单列表
	public function order_list(Order $order)
	{
		// $oder = $order->din();
		// $arr = [];
		// foreach ($oder as $key => $value) {
		// 	$arr[] =  $value->toArray();
		// }
		// foreach ($arr as $key => $value) {
		// 	$district = $value['district'];
		// 	$city = $value['city'];
			
		// }
		
		//$pro = $this->orderlistb($district,$city);
		// $prr = $this->orderlistbb($city);
		// $arrr = [];
		// foreach ($prr as $key => $value) {
		// 	$arrrr[] =  $value->toArray();
		// }
		// $arrr = [];
		// foreach ($pro as $key => $value) {
		// 	$arrr[] =  $value->toArray();
		// }
		// $proo = $arrr;
		// //$pron = $arrrr;
		$list= $this->order->orderpage();
		
		//dump($page);die;
		$this->assign('list',$list);
		//$this->assign('oder',$oder);
		$page = $list->render();
		return $this->fetch('',['page'=>$page]);
	}
	public function orderlistbianli()
	{
		$id = ['order_id'=>input('id')];
		$hate = $this->order->orderlissel($id);
		return $hate;
	}
	// public function orderlistb($city)
	// {
	// 	$ha = $this->city->province($city);
	// 	return $ha;
	// }
	// public function orderlistbb($district)
	// {
	// 	$ha = $this->city->provincee($district);
	// 	return $ha;
	// }
	public function order_detail()
	{
		$din = $this->orderlistbianli();
		$dinnn = $this->detail();

		$this->assign('din',$din);
		$this->assign('dinnn',$dinnn);

		return $this->fetch();
	}
	public function detail()
	{
		$id = ['order_id'=>input('id')];
		$dinn = $this->order_goods->dinxinn($id);
		return $dinn;
	}

	// public function detail()
	// {
	// 	$id = ['order_id'=>input('id')];
	// 	$dinn = $this->order_goods->dinxinn($id);
	// 	return $dinn;
	// }


	
	
}


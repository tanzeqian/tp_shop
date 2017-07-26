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

<<<<<<< HEAD
	// public function detail()
	// {
	// 	$id = ['order_id'=>input('id')];
	// 	$dinn = $this->order_goods->dinxinn($id);
	// 	return $dinn;
	// }


	
	
=======
		$id = input('id');
		if($id == 2){
			$dinn = $order->daifukuan();
			return $dinn;
		}else if($id == 3){
			$dinn = $order->daikuan();
			return $dinn;
		}
		
	}	
	public function wuliudan(Order $order)
	{
		
		$wul = input('wu');
		$id = $_GET['id'];
		$addtime = time();
		if ($this->order->orderwuliu($id,$wul,$addtime)) {
			$this->success('发货成功');
		} else {
			$this->error('删除失败');
		}
		
	}
	public function xiuga(Order $order)
	{
		
		$name = input('name');
		$model = input('model');
		$dizhi = input('dizhi');
		$id = $_GET['id'];
		if ($this->order->xiugai($id,$name,$model,$dizhi)) {
			$this->success('修改成功');
		} else {
			$this->error('删除失败');
		}
		
	}
>>>>>>> 5da2eae904d6e5d6d68c4996c4bccc5ca43580c5
}


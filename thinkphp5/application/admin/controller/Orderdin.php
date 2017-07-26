<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Order;
use app\admin\model\Order_goods;
use app\admin\model\Goods;
use app\admin\model\Region2;
use think\Db;
use think\Request;
use vendor\csl\Page as MyPage;
class Orderdin extends Controller
{
	protected $order;
	public function _initialize()
	{
		$this->order_goods = new Order_goods();
		$this->order = new Order();
	}
	//订单列表
	public function order_list(Request $request)
	{
		
		if ($request->isAjax()) {
			$data = $this->order->paginate(10);
			$page = $data->render();
			echo json_encode(['data'=>$data,'page'=>$page]);
		} else {
			$data = $this->order->paginate(10);
			$page = $data->render();
			return $this->fetch('',['data'=>$data,'page'=>$page]);
		}

	}
	public function doPage()
	{
		$page = 10;//input('page');
		$data = $this->order->getThePage($page,10);

		echo json_encode($data);

	}
	public function deleDe()
	{
		$idd = $_GET['id'];
		//$dele= $this->order->orderdele($idd);
		if ($this->order->orderdele($idd)) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
	}
	public function orderlistbianli()
	{
		$id = ['order_id'=>input('id')];
		$hate = $this->order->orderlissel($id);
		return $hate;
	}
	public function order_detail()
	{
		$din = $this->orderlistbianli();
		$dinnn = $this->detail();
		$this->assign('din',$din);
		$this->assign('dinnn',$dinnn);
		return $this->fetch();
	}
	public function order_xiu()
	{
		$id = $_GET['id'];
		$dii = $this->order->xiu($id);
		$dina = $this->detail();
		$this->assign('dii',$dii);
		$this->assign('dina',$dina);

		return $this->fetch();
	}
	public function detail()
	{
		$id = ['order_id'=>input('id')];
		$dinn = $this->order_goods->dinxinn($id);
		return $dinn;
	}	
	public function daiFu(Order $order)
	{

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
}


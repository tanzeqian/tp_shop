<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Session;
use app\admin\model\Order;
use app\admin\model\Order_goods;
use app\admin\model\Goods;
use app\admin\model\Region2;
use think\Db;
use think\Request;
use vendor\csl\Page as MyPage;
class Orderdin extends Base
{
	protected $order;
	public function _initialize()
	{
		$this->order_goods = new Order_goods();
		$this->order = new Order();
		if (!session('?user_name')){
      $this->error("请先登录","/admin/adminlog/login");
    }
	}
	//订单列表
	public function order_list(Request $request)
	{
		
		if ($request->isAjax()) {
			$data = $this->order->paginate(10);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$page = $data->render();
			echo json_encode(['data'=>$data,'page'=>$page]);
		} else {
			$data = $this->order->paginate(10);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$page = $data->render();
			return $this->fetch('',['data'=>$data,'dat'=>$dat,'role'=>$role,'page'=>$page]);
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
		$data = Session::get('user_name');
		$role = Session::get('role_id');
		$this->assign('data',$data);
		$this->assign('din',$din);
		$this->assign('dinnn',$dinnn);
		$this->assign('role',$role);
		return $this->fetch();
	}
	public function order_xiu()
	{
		$id = $_GET['id'];
		$dii = $this->order->xiu($id);
		$dina = $this->detail();
		$data = Session::get('user_name');
		$role = Session::get('role_id');
		$this->assign('data',$data);
		$this->assign('dii',$dii);
		$this->assign('dina',$dina);
		$this->assign('role',$role);
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
		if($id == 4){
			$dinnn = $order->daikuan1();
			return $dinnn;
		}
		if($id == 5){
			$dinnnn = $order->daikuan2();
			return $dinnnn;
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
	public function chazha()
	{
		$chaa = input('chaa');
		$bb = $this->order->chaAa($chaa);
		return $bb;
	}	
}


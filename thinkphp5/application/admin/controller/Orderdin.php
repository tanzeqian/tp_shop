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
use think\Paginator;
//use vendor\csl\Page as MyPage;
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
			$id = input('id');
			switch ($id) {
				case '1':
					$where = '';
					break;
				case '2':
					$where = ['pay_status' => 0];
					break;
				case '3':
					$where = ['shipping_status' => 0 , 'pay_status' => 1];
					break;
				case '4':
					$where = ['shipping_status' => 1 , 'confirm_time' => 0];
					break;
					case '5':
					$where = 'confirm_time > 0';
					break;
				
				default:
					break;
			}
			$data = db('order')->where($where)->paginate(10);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$page = $data->render();
			return ['data'=>$data,'page'=>$page];
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
	public function kuaidi(){
			$hao = input('hao');

		 	$host = "http://jisukdcx.market.alicloudapi.com/express/query";
		    $method = "GET";
		    $appcode = "08b6509579a3463d84095fefd7965199";
		    $headers = array();
		    array_push($headers, "Authorization:APPCODE " . $appcode);
		    $querys = "number=$hao&type=auto";
		    $bodys = "";
		    $url = $host . "?" . $querys;

		    $curl = curl_init();
		    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
		    curl_setopt($curl, CURLOPT_URL, $url);
		    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		    curl_setopt($curl, CURLOPT_FAILONERROR, false);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($curl, CURLOPT_HEADER, true);
		    if (1 == strpos("$".$host, "https://"))
		    {
		        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		    }
		    	curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);
                    $response = curl_exec($curl);
                    $header_size    = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
                    //echo  $header_size;
                    $headers        = substr($response, 0, $header_size);
                    //echo  $headers;
                    $body       = substr($response, $header_size);
                    return $body = json_decode($body,true);

			}
}


<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Goods;
use app\admin\model\Brand;
use app\admin\model\Goods_category;
class Index extends Controller
{
	
	public function index()
	{
		return $this->fetch();
	}
	public function product_detail()
	{

		 
		return $this->fetch();
	}
	public function product_list(Goods $goods)
	{
		$data = $goods->adminGood();
		//var_dump($data);die;
		$this->assign('data',$data);
		return $this->fetch();
	}
	public function product_cha(Goods $goods)
	{
		$inp = input('tt');
		$data = $goods->chaGood($inp);
		//var_dump($data);die;
		$this->assign('data',$data);
		return $this->fetch();
	}
	public function pinCha(Brand $brand)
	{
		//$pin = input('pin');
		$data = $brand->chaPinb();
		//var_dump($data);die;
		return $data;
	}
	public function pageCha(Goods_category $goods_category)
	{
		//$pin = input('pin');
		$data = $goods_category->chaPage();
		//var_dump($data);die;
		return $data;
	}
	public function paCha(Goods_category $goods_category)
	{
		$haha = input("testdiv");
		//$pin = input('pin');
		$data = $goods_category->chPage($haha);
		//var_dump($data);die;
		return $data;
	}

}


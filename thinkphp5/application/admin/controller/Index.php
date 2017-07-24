<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Goods;
use app\admin\model\Brand;
use app\admin\model\Goods_category;
use app\admin\model\Goods_type;
use app\admin\model\Goods_attribute;
use app\admin\model\Spec;
use app\admin\model\Goods_attr;
class Index extends Controller
{
	
	public function index()
	{
		return $this->fetch();
	}
	public function product_detail(Goods_category $goods_category,Goods_type $goods_type)
	{
		$data = $goods_category->chaPage();
		$dat = $goods_type->shuPage();
		//var_dump($data);die;
		$this->assign('data',$data);
		$this->assign('dat',$dat);	 
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
		return $this->fetch();
	}
	public function pinCha(Brand $brand)
	{
		//$pin = input('pin');
		$data = $brand->chaPinb();
		//var_dump($data);die;
		return $data;
	}
	public function paCha(Goods_category $goods_category)
	{
		$haha = input('testdiv');
		$data = $goods_category->chPage($haha);
		return $data;
	}
	public function ppCha(Goods_category $goods_category)
	{
		$haha = input('testdiv');
		$data = $goods_category->chhPage($haha);
		return $data;
	}
	public function guuCha(Goods_attr $goods_attr)
	{
		$haha = input('testdiv');
		$data = $goods_attr->ggCha($haha);

		return $data;
	}
	public function guCha(Goods_attribute $goods_attribute)
	{
		$haha = input('testdiv');
		$data = $goods_attribute->guCha($haha);
		return $data;
	}
	public function guigeCha(Goods_spec $goods_spec)
	{
		$haha = input('testdiv');
		$data = $goods_attribute->guigePage($haha);
		return $data;
	}

}


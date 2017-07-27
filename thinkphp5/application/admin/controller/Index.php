<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Session;
use app\admin\model\Goods;
use app\admin\model\Brand;
use app\admin\model\Goods_category;
use app\admin\model\Goods_type;
use app\admin\model\Goods_attribute;
use app\admin\model\Spec;
use app\admin\model\Goods_attr;
use app\admin\model\Spec_item;
class Index extends Base
{

	public function index()
	{
		$data = Session::get('user_name');
		$role = Session::get('role_id');
		$this->assign('data',$data);
		$this->assign('role',$role);
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
	public function guigeCha(Spec $spec)
	{
		$haha = input('testdiv');
		$data = $spec->guigePage($haha);
		return $data;
	}
	public function guige1Cha(Spec_item $spec_item)
	{
		$haha = input('testdiv');
		$data = $spec_item->guige1Page($haha);
		return $data;
	}
	public function upload(){
		// 获取表单上传文件 例如上传了001.jpg
		$file = request()->file('image');
		// 移动到框架应用根目录/public/uploads/ 目录下
		$info = $file->move('upload');
		if($info){
		// 成功上传后 获取上传信息
		// 输出 jpg
		echo $info->getExtension();
		// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
		echo $info->getSaveName();
		// 输出 42a79759f284b767dfcb2a0197904287.jpg
		echo $info->getFilename();
		}else{
		// 上传失败获取错误信息
		echo $file->getError();
		}
	}
	//上传商品
	public function shangchuan(Goods $goods)
	{
		//查询数据库
		$ming = input('ming');
		$huohao = input('huohao');
		$pin = input('pin');
		$pag = input('pag');
		$guige = input('guige');
		$kucun = input('kucun');
		$benjia = input('benjia');
		$shijia = input('shijia');
		$image = input('image');
		$xiang = input('xiang');
		$shu = input('shu');
		if ($goods->shangPinb($ming,$huohao,$pin,$pag,$guige,$kucun,$benjia,$shijia,$image,$xiang,$shu)) {
			$this->success('注册成功','admin/index/index');
		} else {
			$this->error('注册失败');
		}
	}


}


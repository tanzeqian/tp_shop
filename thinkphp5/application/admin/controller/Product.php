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
use think\Db;
use think\Request;
use vendor\csl\Page as MyPage;
class Product extends Base
{
	protected $goods;
	protected $goods_category;
	protected $goods_type;
	public function _initialize()
	{
		
	
      $this->goods = new Goods();
      $this->goods_category = new Goods_category();
      $this->goods_type = new Goods_type();
      if (!session('?user_name')){
      $this->error("请先登录","/admin/adminlog/login");
 	 }

	}
	public function product_detail()
	{
		$data = $this->goods_category->chaPage();
		$dat = $this->goods_type->shuPage();
		$daa = Session::get('user_name');
		$role = Session::get('role_id');
		$this->assign('data',$data);
		$this->assign('dat',$dat);
		$this->assign('daa',$daa);
		$this->assign('role',$role);		 
		return $this->fetch();
	}
	public function product_list(Request $request)
	{

		if ($request->isAjax()) {
			$data = $this->goods->paginate(10);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$fen = $this->goods_category->fenlei();
			$page = $data->render();
			echo json_encode(['data'=>$data,'dat'=>$dat,'role'=>$role,'page'=>$page,'fen'=>$fen]);
		} else {
			$data = $this->goods->paginate(10);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$fen = $this->goods_category->fenlei();
			$page = $data->render();
			return $this->fetch('',['data'=>$data,'dat'=>$dat,'role'=>$role,'page'=>$page,'fen'=>$fen]);
		}

	}
	public function doPage()
	{
		$page = 10;//input('page');
		$data = $this->goods->getThePage($page,10);

		echo json_encode($data);

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
		return $info->getExtension();
		// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
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
		$image = "/upload/$image";
		$xiang = input('xiang');
		$shu = input('shu');
		if ($goods->shangPinb($ming,$huohao,$pin,$pag,$guige,$kucun,$benjia,$shijia,$image,$xiang,$shu)) {
			$this->success('上传成功','/admin/product/product_list');
		} else {
			$this->redirect('上传失败');
		}
	}
	public function fenFen()
	{
		$id = input('id');
		$a = $this->goods->fenBie($id);
		return $a;
	}	
	public function shangJia()
	{
		$id = $_GET['id'];
		if ($this->goods->shangAa($id)){
			$this->redirect("/admin/product/product_list");
		}
	}
	public function xiaJia()
	{
		$id = $_GET['id'];
		if ($this->goods->shangXia($id)){
			$this->redirect("/admin/product/product_list");
		}
	}
	public function chazha()
	{
		$chaa = input('chaa');
		$bb = $this->goods->chaAa($chaa);
		return $bb;
	}
	public function product_shan()
	{
		$id = $_GET['id'];
		if ($this->goods->proShan($id)) {
			$this->redirect("/admin/product/product_list");
		} else {
			$this->error('删除失败');
		}
	}		


}


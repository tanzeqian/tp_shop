<?php
namespace app\admin\model;
use think\Model;
use think\DB;
class Goods extends Model
{
	public function adminGood()
	{

		 $data = $this->field('goods_name,goods_sn,store_count,original_img,shop_price,is_new,is_hot,is_recommend,is_on_sale')
		->where('goods_id<46')
		->select();

		return $data;
	}
	public function chaGood($inp)
	{

		 $data = $this->field('goods_name,goods_sn,store_count,original_img,shop_price,is_new,is_hot,is_recommend,is_on_sale')
		->where("goods_sn='{$inp}' OR email='{$username}' OR phone='{$username}'")
		->select();

		return $data;
	}
	public function chaPinb()
	{

		 $data = $this->field('brand_id')
		 ->where('goods_id<46')
		->select();

		return $data;
	}

	public function fenBie($id)
	{
		return $this->where("cat_id = $id")->select();
	}
	public function shangAa($id)
	{
		$data = ['is_on_sale' => 0];
		return $this->where("goods_id = $id")->update($data);
	}
	public function shangXia($id)
	{
		$data = ['is_on_sale' => 1];
		return $this->where("goods_id = $id")->update($data);
	}
	public function chaAa($chaa)
	{
		return $this->where("goods_sn = '{$chaa}' OR keywords = '{$chaa}'")->select();
	}
	//分页数据
	public function getThePage($page,$num)
	{
		return db('goods')->page($page,$num)->select();
	}
	public function shangPinb($ming,$huohao,$pin,$pag,$guige,$kucun,$benjia,$shijia,$image,$xiang,$shu)
	{
		$data = [
					['goods_name' => $ming, 'goods_sn' => $huohao, 'brand_id' => $pin, 'cat_id' =>$pag, 'spec_type' => $guige, 'store_count' => $kucun, 'shop_price' => $benjia, 'market_price' => $shijia, 'original_img' => $image, 'goods_remark' => $xiang, 'goods_type' =>$shu],
				];
		return $this->insertAll($data);
	}
	public function proShan($id)
	{
		return $this->where('goods_id',$id)
					 ->delete();	
	}
	
}
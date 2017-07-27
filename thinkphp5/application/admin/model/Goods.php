<?php
namespace app\admin\model;
use think\Model;

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

}
<?php
namespace app\admin\model;
use think\Model;

class Goods_attr extends Model
{
	
	public function ggCha($haha)
	{

		 $data = $this->field('attr_value,goods_attr_id')
		 ->where("attr_id='{$haha}'")
		->select();

		return $data;
	}
	
}
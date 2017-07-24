<?php
namespace app\admin\model;
use think\Model;

class Goods_attribute extends Model
{
	
	public function guCha($haha)
	{

		 $data = $this->field('attr_name,attr_id')
		 ->where("type_id='{$haha}'")
		->select();

		return $data;
	}
	
}
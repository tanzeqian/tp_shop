<?php
namespace app\admin\model;
use think\Model;

class Order_goods extends Model
{
	
	public function dinxinn($id)
	{

		return $this->where($id)->select();
	}
	
}
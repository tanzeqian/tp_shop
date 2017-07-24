<?php
namespace app\admin\model;
use think\Model;

class Goods_type extends Model
{
	
	public function shuPage()
	{

		 $data = $this->field('name,id')
		
		->select();

		return $data;
	}
	
}
<?php
namespace app\admin\model;
use think\Model;

class Goods_category extends Model
{
	
	public function chaPage()
	{

		 $data = $this->field('name,id')
		 ->where('parent_id = 0')
		->select();

		return $data;
	}
	public function chPage($haha)
	{

		 $data = $this->field('name,id')
		 ->where("parent_id='{$haha}'")
		->select();

		return $data;
	}
	public function chhPage($haha)
	{

		 $data = $this->field('name,id')
		 ->where("parent_id='{$haha}'")
		->select();

		return $data;
	}
	public function fenlei()
	{

		return $this->field('name,id')->where('parent_id != 0')->select();
	}
	
	
	

}
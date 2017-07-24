<?php
namespace app\admin\model;
use think\Model;

class Spec_item extends Model
{
	
	public function guige1Page($haha)
	{

		 $data = $this->field('item,id')
		 ->where("spec_id='{$haha}'")
		->select();

		return $data;
	}
	
}
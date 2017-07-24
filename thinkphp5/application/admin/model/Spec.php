<?php
namespace app\admin\model;
use think\Model;

class Spec extends Model
{
	
	public function guigePage($haha)
	{

		 $data = $this->field('name,id')
		 ->where("type_id='{$haha}'")
		->select();

		return $data;
	}
	
}
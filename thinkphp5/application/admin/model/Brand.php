<?php
namespace app\admin\model;
use think\Model;

class Brand extends Model
{
	
	public function chaPinb()
	{

		 $data = $this->field('name')
		 
		->select();

		return $data;
	}

}
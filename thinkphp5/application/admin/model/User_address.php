<?php
namespace app\admin\model;
use think\Model;

class User_address extends Model
{
	
	public function address($id)
	{

		 $data = $this->field('address')->where("user_id = '{$id}'")		
		->select();

		return $data;
	}
	
}
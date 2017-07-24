<?php
namespace app\admin\model;
use think\Model;

class Region2 extends Model
{
		public function province($city)
	{

		 $data = $this->where("id=$city")
		->select();

		return $data;
	}
		public function provincee($district)
	{

		 $data = $this->where("id = $district")
		->select();

		return $data;
	}
}

<?php
namespace app\admin\model;
use think\Model;

class Order extends Model
{
		public function din()
	{

		 $data = $this->where('order_id < 100 ')
		->select();

		return $data;
	}
	public function orderlissel($id)
	{

		return $this->where($id)->select();
	}
	public function orderpage()
	{

		return $this->where('order_status',2)->paginate(10);
	}
}

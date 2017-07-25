<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Order extends Model
{
	
	public function orderlissel($id)
	{

		return $this->where($id)->select();
	}
	public function orderdele($idd)
	{

		return $this->where("order_id='{$idd}'")->delete();
	}
	//分页数据
	public function getThePage($page,$num)
	{
		return db('order')->page($page,$num)->select();
	}
	public function daifukuan()
	{

		return $this->where("pay_status = 0")->select();
	}
	public function daikuan()
	{

		return $this->where("shipping_status = 0")->select();
	}
	public function orderwuliu($id,$wul)
	{
		$data = ['wuliu' => $wul,'shipping_status'=>1];
		return $this->where("order_id = $id")->update($data);
	}
	public function xiu($id)
	{
		return $this->where("order_id = $id")->select();
	}
	public function xiugai($id,$name,$model,$dizhi)
	{
		//$data = ['consignee' => $name,'mobile'=>$model,'address'=>$dizhi];
		return $this->where('order_id',$id)->update(['consignee' => $name,'mobile'=>$model,'address'=>$dizhi]);
	}
}

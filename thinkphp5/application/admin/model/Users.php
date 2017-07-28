<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Users extends Model
{
	//分页数据
	public function getThePage($page,$num)
	{
		return db('users')->page($page,$num)->select();
	}
	public function xiangQing($id)
	{
		return db('users')->where("user_id = $id")->select();
	}
	public function jinZhi($id)
	{
		return db('users')->where('user_id',$id)->update(['is_lock' => '1']);
	}
	public function jiechu($id)
	{
		return db('users')->where('user_id',$id)->update(['is_lock' => '0']);
	}
	public function shan($id)
	{
		return db('users')->where('user_id',$id)->delete();
	}
	
 }
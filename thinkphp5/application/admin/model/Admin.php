<?php
namespace app\admin\model;
use think\Model;

class Admin extends Model
{
	public function adminUser($username,$password)
	{

		$data = $this->where('user_name',$username)
					 ->where('password',md5($password))
					 ->select();

		return $data?true:false;
	}

	//返回用户列表
	public function getUserList()
	{
		$res = $this->paginate(3);
		$render = $res->render();
		return ['data'=>$res,'render'=>$render];
	}
}
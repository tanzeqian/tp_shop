<?php
namespace app\admin\model;
use think\Model;

class Admin extends Model
{
	public function adminUser($username,$password)
	{

		return $this->field('role_id')->where('user_name',$username)
					 ->where('password',md5($password))
					 ->select();
	}

	public function xiuUser($id)
	{
		return $this->where('admin_id',$id)
					 ->select();	
	}
	public function xiuXiu($id,$username,$password,$role,$email)
	{
		$password = md5($password);
		return $this->where('admin_id',$id)->update(['user_name' => $username,'password'=>$password,'role_id'=>$role,'email'=>$email]);
	}
}
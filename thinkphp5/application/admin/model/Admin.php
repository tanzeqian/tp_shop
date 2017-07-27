<?php
namespace app\admin\model;
use think\Model;
use think\Db;
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
	public function xiuShan($id)
	{
		return $this->where('admin_id',$id)
					 ->delete();	
	}
	public function xiuXiu($id,$username,$password,$role,$email)
	{
		$password = md5($password);
		return $this->where('admin_id',$id)->update(['user_name' => $username,'password'=>$password,'role_id'=>$role,'email'=>$email]);
	}
	public function admin_user($username,$password,$role,$email,$time)
	{
		$data = [
					['user_name' => $username, 'password' => $password, 'role_id' => $role, 'email' =>$email, 'add_time' => $time],
				];
		return $this->insertAll($data);
	}
}
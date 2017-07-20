<?php
namespace app\index\model;
use think\Model;

class User extends Model
{
	//登录处理
	public function checkUser($username,$password)
	{

		$data = $this->where("username='{$username}' OR email='{$username}' OR phone='{$username}'")
					 ->where('password',md5($password))
					 ->find();
		return $data?true:false;
	}
	//注册处理
	public function zhuceUser($email,$password)
	{
			$password = md5($password);
		$data = $this->insert(['email'=>$email, 'password'=>$password]);
		return $data?true:false;
	}
	//用户名是否存在
	public function loginUser($username)
	{

		$data = $this->where("username='{$username}' OR email='{$username}' OR phone='{$username}'")
					 //->where('password',md5($password))
					 ->find();
		return $data?true:false;
	}
	//密码是否存在
	public function loginPass($arr)
	{

			return $this->where($arr)->select();
	}
	
	//注册邮箱名判断
	public function loginEmail($email)
	{
		$reg = '/\w+@(\w+\.)+(com|cn|net)$/';
		if (!preg_match($reg,$email)) {
			return !empty($email);
		}
		$data = $this->where("email='{$email}'")
					 //->where('password',md5($password))
					 ->find();
		return $data?true:false;
		
		//return $data?true:false;
	}
	//注册邮箱名判断是否存在
	public function goEmail($email)
	{
		
		$data = $this->where("email='{$email}'")
					 //->where('password',md5($password))
					 ->find();
		return $data?true:false;
	}
	//注册密码判断
	public function passEmail($password)
	{
		
		if (strlen($password) < 6) {
		return !empty($password);
		}
	}
	//确认密码判断
	public function passRepeat($password,$passwordRepeat)
	{
		
		if ($password != $passwordRepeat) {
		return !empty($passwordRepeat);
		}
	}

	//注册手机号判断
	public function loginPhone($phone)
	{
		$reg = '/^((1[3,5,8][0-9])|(14[5,7])|(17[0,1,3,5,6,7,8]))\d{8}$/';
		if (!preg_match($reg,$phone)) {
			return !empty($phone);
		}
		$data = $this->where("phone='{$phone}'")
					 //->where('password',md5($password))
					 ->find();
		return $data?true:false;
		
		//return $data?true:false;
	}
	//注册密码判断
	public function passDuanxin($pwd)
	{
		
		if (strlen($pwd) < 6) {
		return !empty($pwd);
		}
	}
	//确认密码判断
	public function psdRepeat($pwd,$pwdRepeat)
	{
		
		if ($pwd != $pwdRepeat) {
		return !empty($pwdRepeat);
		}
	}
	//手机注册处理
	public function phoneUser($phone,$pwd)
	{
			$pwd = md5($pwd);
		$data = $this->insert(['phone'=>$phone, 'password'=>$pwd]);
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
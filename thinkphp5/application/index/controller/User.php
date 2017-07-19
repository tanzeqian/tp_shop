<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;
class User extends Controller
{
	//登录页面
	public function login()
	{
		return $this->fetch();
	}
	//判断用户是否存在
	public function goLogin(UserModel $user)
	{

		//查询数据库
		$username = input('username');
		if ($user->loginUser($username)) {	
			$this->success('');
		}else {
			$this->error('用户名不存在');
		}
	}
	//判断密码
	public function pwdLogin(UserModel $user)
	{

		//查询数据库
		$username = input('username');
		$password = input('password');
		if ($user->loginPass($username)) {	
			$this->success('');
		}else {
			$this->error('密码不存在');
		}
	}
	//判断邮箱
	public function goEmail(UserModel $user)
	{

		//查询数据库
		$email = input('email');
		if ($user->loginEmail($email)) {	
			$this->success('邮箱格式不正确或者该邮箱已被注册');
		}else {
			$this->error('');
		}
	}
	//判断密码格式
	public function pwdEmail(UserModel $user)
	{

		//查询数据库
		$password = input('password');

		if ($user->passEmail($password)) {	
			$this->success('密码不能少于6位');
		}else {
			$this->error('');
		}
	}
	//确认密码
	public function passwordRepeat(UserModel $user)
	{

		//查询数据库
		$passwordRepeat = input('passwordRepeat');
		$password = input('password');
		if ($user->passRepeat($password,$passwordRepeat)) {	
			$this->success('两次密码不一样');
		}else {
			$this->error('');
		}
	}
	//用户登录
	public function doLogin(UserModel $user)
	{
		// //验证失败
		// $res = $this->validate(input(),'User');
		// if ($res !== true) {
		// 	$this->error($res);
		// 	die;
		// }
		//查询数据库
		$username = input('username');
		$password = input('password');
		if ($user->checkUser($username,$password)) {
			session('user',$username);
			$this->success('登陆成功','index/index/index');
		} else {
			$this->error('登录失败');
		}
	}
	//注册页面
	public function register()
	{
		return $this->fetch();
	}
}
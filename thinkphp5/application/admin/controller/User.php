<?php
namespace app\admin\controller;
use think\Controller;
<<<<<<< HEAD

=======
use think\Session;
use app\admin\model\Users;
>>>>>>> 5da2eae904d6e5d6d68c4996c4bccc5ca43580c5
use app\admin\model\Admin;

class User extends Controller
{
	public function login()
	{
		return $this->fetch();
	}

	//登录处理
	//$user 依赖注入
	public function adminLogin(Admin $user)
	{

		//验证失败
		$res = $this->validate(input(),'User');
		if ($res !== true) {
			$this->error($res);
			die;
		}
		//查询数据库
		$username = input('username');
		$password = input('password');
		//var_dump($user->adminUser($username,$password));die;
		//dump($password);die;
		if ($user->adminUser($username,$password)) {
			session('user_name',$username);
			$this->success('登陆成功','admin/index/index');
		} else {
			$this->error('登录失败');
		}
	}
}
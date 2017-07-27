<?php
namespace app\admin\controller;
use think\Session;
use think\Controller;
use app\admin\model\Admin;
use think\Db;
use think\Request;
use vendor\csl\Page as MyPage;
class Adminlog extends Controller
{
	public function login()
	{
		Session::delete('user_name');
		return $this->fetch();
	}
	//登录处理
	//$user 依赖注入
	public function adminLogin(Admin $user)
	{

		//查询数据库
		$username = input('username');
		$password = input('password');
		//var_dump($user->adminUser($username,$password));die;
		$data = $user->adminUser($username,$password);
		if (!empty($data)) {
			session('user_name',$username);
			session('role_id',$data[0]['role_id']);
			$this->redirect('admin/index/index');
		} else {
			$this->error('登录失败');
		}
	}

}
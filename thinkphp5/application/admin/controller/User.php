<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
use app\admin\model\Users;
use app\admin\model\Admin;
use think\Db;
use think\Request;
use vendor\csl\Page as MyPage;
class User extends Controller
{
	protected $users;
	public function _initialize()
	{
		$this->users = new Users();
	}
	public function login()
	{

		return $this->fetch();
	}
	public function user_list(Request $request)
	{
		if ($request->isAjax()) {
			$data = $this->users->paginate(10);
			$page = $data->render();
			echo json_encode(['data'=>$data,'page'=>$page]);
		} else {
			$data = $this->users->paginate(10);
			$page = $data->render();

			return $this->fetch('',['data'=>$data,'page'=>$page]);
		}
	}
	public function doPage()
	{
		$page = 10;//input('page');
		$data = $this->users->getThePage($page,10);

		echo json_encode($data);

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
	public function user_detail(Users $users)
	{
		$id = $_GET['id'];
		$tan = $users->xiangQing($id);
		$this->assign('tan',$tan);
		return $this->fetch();
	}
	public function user_jinzhi(Users $users)
	{
		$id = $_GET['id'];
		if ($users->jinZhi($id)) {
			//session('username',$username);
			$this->success('禁止成功');
		} else {
			$this->error('登录失败');
		}
		return $tan;
	}
	public function user_jiechu(Users $users)
	{
		$id = $_GET['id'];
		if ($users->jiechu($id)) {
			//session('username',$username);
			$this->success('解除成功');
		} else {
			$this->error('解除失败');
		}
		return $tan;
	}
	public function user_shan(Users $users)
	{
		$id = $_GET['id'];
		if ($users->shan($id)) {
			//session('username',$username);
			$this->success('删除成功');
		} else {
			$this->error('删除失败');
		}
		return $tan;
	}
}
<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Session;
use app\admin\model\Users;
use app\admin\model\User_address;
use app\admin\model\Admin;
use think\Db;
use think\Request;
use vendor\csl\Page as MyPage;
class User extends Base
{
	protected $users;
	protected $user_address;
	public function _initialize()
	{
		$this->users = new Users();
		$this->user_address = new User_address();
		if (!session('?user_name')){
      $this->error("请先登录","/admin/adminlog/login");
  		}
	}
	public function user_list(Request $request)
	{
		if ($request->isAjax()) {
			$data = $this->users->paginate(10);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$page = $data->render();
			echo json_encode(['data'=>$data,'page'=>$page]);
		} else {
			$data = $this->users->paginate(10);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$page = $data->render();

			return $this->fetch('',['data'=>$data,'dat'=>$dat,'role'=>$role,'page'=>$page]);
		}
	}
	public function doPage()
	{
		$page = 10;//input('page');
		$data = $this->users->getThePage($page,10);

		echo json_encode($data);

	}
	public function user_detail(Users $users)
	{
		$id = $_GET['id'];
		$tan = $users->xiangQing($id);
		$data = Session::get('user_name');
		$role = Session::get('role_id');
		$this->assign('data',$data);
		$this->assign('tan',$tan);
		$this->assign('role',$role);
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
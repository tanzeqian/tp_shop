<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Session;
use app\admin\model\Admin;
use think\Db;
use think\Request;
use vendor\csl\Page as MyPage;
class Adminuser extends Base
{
	protected $adminrole;
	public function _initialize()
	{
		$this->adminrole = new Admin();
		if (!session('?user_name')){
      $this->error("请先登录","/admin/adminlog/login");
  		}
	}
	public function admin_detail()
	{	
			$data = Session::get('user_name');
			$role = Session::get('role_id');
			$this->assign('data',$data);
			$this->assign('role',$role);
			return $this->fetch();
	}
	public function admin_tian()
	{
		
		$username = input('username');
		$password = input('password');
		$role = input('role');
		$email = input('email');
		$time = time();
		if ($this->adminrole->admin_user($username,$password,$role,$email,$time)) {
			$this->success('添加成功',"/admin/adminuser/user_rank");
		} else {
			$this->error('添加失败');
		}
	}
	public function user_rank(Request $request)
	{	

			if ($request->isAjax()) {
			$data = $this->adminrole->paginate(5);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$page = $data->render();
			echo json_encode(['data'=>$data,'page'=>$page]);
		} else {
			$data = $this->adminrole->paginate(5);
			$dat = Session::get('user_name');
			$role = Session::get('role_id');
			$page = $data->render();
			return $this->fetch('',['data'=>$data,'dat'=>$dat,'role'=>$role,'page'=>$page]);
		}
	}
	public function adminPage()
	{
		$page = 5;//input('page');
		$data = $this->adminrole->adminPage($page,5);

		echo json_encode($data);

	}
	public function aduser_detail()
	{	
		$id = $_GET['id'];
		$data = $this->adminrole->xiuUser($id);
		$daa = Session::get('user_name');
		$role = Session::get('role_id');
		$this->assign('data',$data);
		$this->assign('daa',$daa);
		$this->assign('role',$role);
		return $this->fetch();
	}
	public function admin_xiu()
	{
		$id = $_GET['id'];
		$username = input('username');
		$password = input('password');
		$role = input('role');
		$email = input('email');
		if ($this->adminrole->xiuXiu($id,$username,$password,$role,$email)) {
			$this->redirect("/admin/adminuser/aduser_detail?id=$id");
		} else {
			$this->error('修改失败');
		}
	}
	public function admin_shan()
	{
		$id = $_GET['id'];
		if ($this->adminrole->xiuShan($id)) {
			$this->redirect("/admin/adminuser/user_rank");
		} else {
			$this->error('删除失败');
		}
	}

	
}


<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Account as AccountModel;
class Account extends Controller
{
	protected $account;
	public function _initialize()
	{
		$this->account = new AccountModel();
	}
	public function index()
	{
		if($this->account->add()) {
			echo '用户新增成功';
		}
		dump($this->account->id);
	}
}
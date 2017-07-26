<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller
{
  public function _initialize(){
    if (!session('?user_name')){
      $this->error("请先登录","/admin/user/login");
    }
  } 
}
<?php
namespace app\index\controller;
use think\Controller;
use extend\alidayu\TopClient;
use extend\alidayu\AlibabaAliqinFcSmsNumSendRequest;
use app\index\model\User as UserModel;
class User extends Controller
{
	protected $user;
	public function _initialize(){
		$this->user = new UserModel();
	}
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
	public function pwdLogin(UserModel $user)
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
			//session('user',$username);
			$this->success('');
		} else {
			$this->error('密码错误请重新输入');
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
			$this->success('登陆成功','index/index');
		} else {
			$this->error('登录失败');
		}
	}
	//注册页面
	public function register()
	{
		return $this->fetch();
	}
	//用户注册
	public function zhuLogin(UserModel $user)
	{
		// //验证失败
		// $res = $this->validate(input(),'User');
		// if ($res !== true) {
		// 	$this->error($res);
		// 	die;
		// }
		//查询数据库
		$email = input('email');
		$password = input('password');
		if ($user->zhuceUser($email,$password)) {
			session('email',$email);
			$this->success('注册成功','index/index/index');
		} else {
			$this->error('注册失败');
		}
	}
	//判断手机号是否合法
	public function phoneRepeat(UserModel $user)
	{
		//echo "string";die;
		//查询数据库
		$phone = input('phone');

		if ($user->loginPhone($phone)) {	
			$this->success('手机号不合法或已被注册');
		}else {
			$this->error('');
		}
	}
	//判断密码格式
	public function pwdDuan(UserModel $user)
	{

		//查询数据库
		$pwd = input('pwd');

		if ($user->passDuanxin($pwd)) {	
			$this->success('密码不能少于6位');
		}else {
			$this->error('');
		}
	}
	//确认密码
	public function pwwdRepeat(UserModel $user)
	{

		//查询数据库
		$pwdRepeat = input('pwdRepeat');
		$pwd = input('pwd');
		if ($user->psdRepeat($pwd,$pwdRepeat)) {	
			$this->success('两次密码不一样');
		}else {
			$this->error('');
		}
	}
	//手机用户注册
	public function phoneLogin(UserModel $user)
	{
		// //验证失败
		// $res = $this->validate(input(),'User');
		// if ($res !== true) {
		// 	$this->error($res);
		// 	die;
		// }
		//查询数据库
		$phone = input('phone');
		$pwd = input('pwd');
		if ($user->phoneUser($phone,$pwd)) {
			session('phone',$phone);
			$this->success('注册成功','index/index/index');
		} else {
			$this->error('注册失败');
		}
	}
	//短信验证
	public function sendSMS()
	{
		//echo "string";die;
		$tel = input('phone');//手机号  
		//dump($tel);die;        
		$c = new TopClient;//大于客户端   
		$c->format = 'json';//设置返回值得类型

		$c->appkey = "24554031";//阿里大于注册应用的key

	    $c->secretKey = "11be8a3a641cf1782ef6db4443e6e380";//注册的secretkey
	                                                       
	    //请求对象，需要配置请求的参数   
		$req = new AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("123456");//公共回传参数，可以不传
		$req->setSmsType("normal");//短信类型，传入值请填写normal
		
		//签名，阿里大于-控制中心-验证码--配置签名 中配置的签名，必须填
		$req->setSmsFreeSignName("谭泽乾");
		//你在短信中显示的验证码，这个要保存下来用于验证
		$num = rand(100000,999999);
		$_SESSION['smscode'] = $num;

		//短信模板变量，传参规则{"key":"value"}，key的名字须和申请模板中的变量名一致，传参时需传入{"code":"1234","product":"alidayu"}
		$req->setSmsParam("{\"number\":\"$num\"}");//模板参数
		                                           
		//短信接收号码。
	     $req->setRecNum($tel);

		//短信模板。阿里大于-控制中心-验证码--配置短信模板 必须填
		$req->setSmsTemplateCode("SMS_71335933");
		$resp = $c->execute($req);//发送请求
		return $resp;
		
	}
}
<?php
namespace app\index\controller;
use think\Controller;
//解决重名问题，是用as
use app\index\model\User as UserModel;
use think\Db;
class User extends Controller
{
	
	protected $user;
	public function _initialize()
	{
		$this->user = new UserModel();
	}

	public function temp()
	{
		$user = new UserModel();
		$user->password = '123456';
		$data = $user->select();
		// dump($data);die;
		//指定模板文件名，模板文件名和方法名不一致
		return $this->fetch('kkk',['title'=>"不知道啥名",'content'=>'随便写','arr'=>['name'=>'tom'],'obj'=>$user,'data'=>$data]);
	}
	public function listUser()
	{
		$data = $this->user->getUserInfo();
		$this->assign('data',$data);
		// return $this->fetch();
	}

	//登录
	public function login()
	{
		return $this->fetch();
	}
	//处理登录
	public function doLogin()
	{
		$data=input();
		dump($data);
		if (!captcha_check($data['yzm'])) {
			echo '验证码错误';
		}
	}


	//图片处理
	public function clipImage()
	{
		// $image = \think\Image::open('./1.jpg');
		// //将图片裁剪为300x300并保存为crop.png
		// $image->crop(600, 600)->save('./crop.png');
		
		$image = \think\Image::open('./1.jpg');
		// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
		$image->thumb(150, 150)->save('./thumb.png');
	}

	//路由
	public function see($id)
	{
		echo $id;
	}

	public function multi()
	{
		$data = $this->user->multiTable();
		var_dump($data);
		die;
	}
	public function test()
	{
		//1 find和select的区别
		//find只取第一条数据，返回一维数组 如果没有结果返回null
		//select 返回多条数据，返回二维数组，如果没有结果返回一个
		//空数组
		// var_dump($this->user->countUser());
		// $user = $this->user->where("uid=3")->find();
		// var_dump($user,$user->type);
		// $this->user->name="擎天柱";
		// $this->user->password=md5('123456');
		// $this->user->save();
		// $user = $this->user->where('uid=?',[6])->find();
		// var_dump($user);
		// //$user->delete();
		// dump($this->user->select());
		// dump($this->user->allData());]
		// dump($this->user->processData());
		//模型操作
		// dump($this->user->model());
		// $data = $this->user->model();
		// // foreach ($data as $value) {
		// // 	echo $value->name .'----'.$value['password'].'<br/>';
		// // }
		// // 使用获取器必须使用对象访问
		// var_dump($data);
		// dump($data->type);//管理员、普通用户
		//新创建user对象
		// $user = new UserModel();
		// $user->name= '福文';
		// $user->password = '123456';
		// $user->save();

		// var_dump($user->password);
		// 
		//软删除
		$user = $this->user->model();
		// var_dump($user);die;
		// dump($user->destroy(13));
		// dump($user->select());
		
		// dump(Db::name('user')->select());
	}

	function list()
	{
		$data = UserModel::all();
		$title = '用户列表';
		// $this->assign('title',$title);
		$this->assign('data',$data);
		return $this->fetch();
	}

	//分页
	public function page()
	{

		//分页 表示每页有两条数据
		$data = UserModel::paginate(2,true);
		// var_dump($data);
		// 获取分页的url
		$render = $data->render();
		// var_dump($render);
		$this->assign('data',$data);
		$this->assign('render',$render);
		return $this->fetch();
	}

	//文件上传
	function fileupload()
	{
		return $this->fetch();
	}

	function upload()
	{
		// 获取表单上传文件 例如上传了001.jpg
		$file = request()->file('image');
		// 移动到框架应用根目录/public/uploads/ 目录下
		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		if($info){
			// 成功上传后 获取上传信息
			// 输出 jpg
			echo $info->getExtension();
			// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
			echo $info->getSaveName();
			// 输出 42a79759f284b767dfcb2a0197904287.jpg
			echo $info->getFilename();
		}else{
		// 上传失败获取错误信息
			echo $file->getError();
		}
		
	}
	function register()
	{
		return $this->fetch();
	}
	public function doRegister()
	{
		$data = input();
		// dump($data);die;
		$res = $this->validate($data,'User');
		if ($res !== true) {
			$this->error($res);
		} else {
			session('id',5);
		}
		dump(session('id'));
		dump(session('?id'));

		// dump($res);

	}

}
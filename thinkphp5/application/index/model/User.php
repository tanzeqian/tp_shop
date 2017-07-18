<?php
namespace app\index\model;
use think\Model;//引入model类
use think\Db;
use app\index\model\Profile;

//1 软删除第一步 引入系统trait
use traits\model\SoftDelete;
class User extends Model
{
	//自动更新
	protected $auto = [ 'password'];
	protected $insert = [];
	protected $update = [];

	use SoftDelete;//2 软删除  使用trait
	//时间戳 只针对当前表
	protected $autoWriteTimestamp = 'datetime';

	//3 添加软删除标志字段
	protected static $deleteTime = 'delete_time';
	public function getUserInfo()
	{
		// $data = Db::table('php_user')
		// 			->select();
		//name不用带表的前缀
		// $data = Db::name('user')
		// 		->where('uid','>','1')
		// 		->select();
		// //where的用法
		// $data = Db::name('user')
		// 		->where('uid > 2')
		// 		->select();	
		//where的第三种用法	
		$con['uid'] = ['>', 1]; //等价语法uid > 1
		$con['type'] = 1;
		$data = Db::name('user')
				->where($con)
				->buildSql();



		// $data = Db::name('user')
		// 		->where('uid > 2')
		// 		// ->fetchSql(true)//查看sql语句
		// 		->select();
		//有两种方式查看sql语句：fetchSql和buildSql
		// $data = Db::name('user')
		// 		->where('uid > 2')
		// 		->buildSql();
		dump($data);
		die;
				// ->select();	
		// return $data;
	}


	function multiTable()
	{
		//1 多表链接 where中需要时用字符串方式写链接条件
		// $data = Db::table('php_blog b ,php_category c')
		// 		->where("b.cid = c.cid")
		// 		->select();
		//2 使用join进行多表链接
		$data = Db::table('php_blog')
				->alias('b') //命名别名
				->join('php_category c','b.cid=c.cid')
				->select();

		return $data;
	}

	public function find()
	{

		// return Db::name('user')->where('uid < 0')->select();
		return Db::name('user')->where('uid < 0')->find();

	}

	public function multiCondition()
	{
		// return Db::name('user')
		// 		->where('name' ,'like','%天%')
		// 		->whereor('uid','<' ,3)
		// 		->select();
		return Db::name('user')
				->where("name like '%天%' or uid <3")		
				->select();
	}

	function tableInfo()
	{
		return Db::getTableInfo('php_user');
	}

	function time1()
	{
		//3使用英文单词表示
		// return Db::name('blog')->whereTime('create_time', 'last week')
		// 					->buildSql();

		//原生字时间比较，
		// return Db::name('blog')
		//         ->where('create_time','<' ,'2017-07-05 0:0:0')
			    // ->buildSql();
			    // 
		//使用whereTime
	    return Db::name('blog')
		        ->whereTime('create_time','<' ,'2017-07-05 0:0:0')
			    ->buildSql();
			   
	}

	//聚合查询
	function countUser()
	{
		//助手函数表名不带前缀
		// return db('user')->count("case when type = 0 then 1 end");
		return db('user')->field("count(distinct type)")->where("type=0")->buildSql();

		//去重统计 count\avg\sum
		//SELECT  count(DISTINCT type)    FROM php_user
	}

	//获取器
	//get后必须是字段名（小驼峰规则),结尾必须以Attr
	public function getTypeAttr($value)
	{
		$arr =[0=>'普通用户',1=>'管理员'];
		return $arr[$value];
	}

	//修改器
	public function setPasswordAttr($value)
	{
		return md5($value);
	}

	public function allData()
	{
		return $this->select();
		// return db('user')->select();
		// db('user')->where('uid=6')->delete(); 
	}

	public function processData()
	{
		//增删改
		// return db('user')->insert(['name'=>'振宇','password'=>md5('123456')]);
		// return db('user')->where('uid=8')->update(['name'=>'王振宇','password'=>md5('123456')]);
		// return db('user')->update(['name'=>'王振宇','password'=>md5('9999'),'uid'=>8]);
		// 干掉主键值等于7
		// return db('user')->delete(7);
		// 条件删除
		// return db('user')->where('uid<3')->delete();
		// //字段自增
		// return Db::table('account')->where('id=1')->setInc('balance',-50);
		
		//防止sql注册
		// $id = 2;
		// // return Db::table('account')->where('id=?',[$id])->setInc('balance',800);
		// return Db::table('account')->where('id=:id',['id'=>$id])->
		// setInc('balance',-300);
		// die;
		// 
		//原生sql操作
		//// 查询就用query
		// return Db::query("select uid,name,password from php_user where uid =?",[3]);
		//增删改就用execute
		$pwd = md5('123456');
		return Db::execute("insert into php_user(name,password) values('tom','$pwd')");
	}

	//模型操作
	public function model()
	{
		// return db('user')->select();
		// return $this->select();
		// 1 get根据主键值进行查询
		// return User::get(3);\
		// return $this->where("uid",'in' ,[3,4,5])->select();
		// 
		// return $this->where('uid=3')->value('name');
		// //返回某一列的值，一维数组
		// return $this->column('name');
		
		//返回对象
		// return $this->where('uid=3')->find();

		return $this->where('uid=3')->find();
	}

	//模型关联
	//函数名称必须是另外一个表的表名
	public function profile()
	{
		return $this->hasOne('profile','user_id','uid');
	}

	//关联写入
	public function add()
	{
		echo 111;
		$user = new User();
		$user->data(['name'=>'萧峰','password'=>'123456']);
	
		if ($user->save()) {
			$profile = new Profile();
			$profile->address='燕京';
			$user->profile()->save($profile);
			return '新增成功';
		} else {
			return $user->getError();
		}
	}

	public function autoComplete()
	{
		$this->data = ['name'=>'小明1111','password'=>'123456'];
		$this->save();
	}
}


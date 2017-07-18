<?php
namespace app\index\model;
use think\Model;

class Blog extends Model
{
	public function add($data)
	{
		//1 保存单条记录
		// $this->data= $data;
		// 
		// $this->data = ['title'=>'tp5','content'=>'模型'];
		//不要修改name属性，这是表名
		
		// return $this->save();
		// 
		// 2多条数据
		// $arrr = [
		// 	['title'=>'1111','content'=>'2222']
		// ];
		// $dat =  $this->saveAll($arrr);
		// return count($dat);

		//3获取主键值
		// $this->data = ['title'=>'tp5','content'=>'模型'];
		// $this->save();
		// return $this->bid;
		
		//4 字段过滤
		 $this->data = ['title'=>'tp5','content'=>'模型','ddds'=>1111];
		 return $this->allowField(true)->save();
	}

	public function update1()
	{
		//1
		// $blog = $this->where('bid=5')->find();
		// $blog->title = '新标题';
		// // dump($blog);die;
		// $blog->save();
		//2 
		$this->where('bid=6')->update(['content'=>'vvvvv5']);
	}
	public function delete1()
	{
		//1
		$this->where('bid=6')->delete();
	}
}
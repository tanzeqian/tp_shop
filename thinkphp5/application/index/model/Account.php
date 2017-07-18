<?php
namespace app\index\model;
use think\Model;
class Account extends Model
{
	protected $table='account';
	public function add()
	{
		$this->username='霸天虎';
		$this->balance = 2000;
		return $this->save();
	}
}
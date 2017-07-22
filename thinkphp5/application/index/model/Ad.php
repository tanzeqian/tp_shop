<?php
namespace app\index\model;

use think\Db;

class Ad
{
	public function getAd()
	{
		return db('ad')->order('start_time','desc')->limit(5)->cache(true,1)->select();
		 
	}
}
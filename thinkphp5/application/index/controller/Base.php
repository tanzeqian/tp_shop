<?php

namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;

class Base extends Controller {
    public $session_id;
    public $cateTrre = array();
    /*
     * 初始化操作
     */
    public function _initialize() {
        Session::start();
        header("Cache-control: private");  // history.back返回后输入框值丢失问题 参考文章 http://www.tp-shop.cn/article_id_1465.html  http://blog.csdn.net/qinchaoguang123456/article/details/29852881
    	$this->session_id = session_id(); // 当前的 session_id
        define('SESSION_ID',$this->session_id); //将当前的session_id保存为常量，供其它方法调用
       
        $this->public_assign();
    }
    /**
     * 保存公告变量到 smarty中 比如 导航 
     */
    public function public_assign()
    {
        
       $tpshop_config = array();
       $tp_config = db('config')->cache(true,1/*TPSHOP_CACHE_TIME*/)->select();   
       var_dump($tp_config);
       foreach($tp_config as $k => $v)
       {
       	 // if($v['name'] == 'hot_keywords'){
       	 // 	 $tpshop_config['hot_keywords'] = explode('|', $v['value']);
       	 // }       	  
        $tpshop_config = $v;
         //dump($v);
          
       }                        
       dump($tp_config);die;  
       $goods_category_tree = get_goods_category_tree();    
       $this->cateTrre = $goods_category_tree;
       $this->assign('goods_category_tree', $goods_category_tree);
       foreach ($goods_category_tree as $key => $value) {
        // var_dump($value['name']);
         //die;
       }

       //dump($goods_category_tree);die;

       $brand_list = db('brand')->cache(true)->field('id,name,parent_cat_id,logo,is_hot')->where("parent_cat_id>0")->select();
       $this->assign('brand_list', $brand_list);
       $this->assign('tpshop_config', $tpshop_config);

    }

    /*
     * 
     */
    public function ajaxReturn($data)
    {
        exit(json_encode($data));
    }
}
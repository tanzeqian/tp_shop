<?php
/**
 * tpshop
 * ============================================================================
 * * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tpshop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 采用TP5助手函数可实现单字母函数M D U等,也可db::name方式,可双向兼容
 * ============================================================================
 * $Author: IT宇宙人 2015-08-10 $
 *
 */ 
namespace app\index\controller; 
use think\Controller;
use think\Session;
use think\Url;
use think\Config;
use think\Page;
use think\Verify;
use think\Image;
use think\Db;
use app\index\model\Ad;
use vendor\disanfang\open;
use vendor\disanfang\open51094;
class Index extends Base {
    public function index(){
        $name = null;    
        $open = new open51094();
        if (!empty($_GET['code'])) {
            $code = $_GET['code'];

            $name = $open->me($code);
           
            session('username',$name['name']);

            $appa = session('username');
            $this->assign('appa',$appa);
        }

       
        
        //轮播图
        $ad2 = db('ad')->where('pid=2')->order('start_time','desc')->limit(5)->cache(true,1)->select();   
        $this->assign('ad2',$ad2);

        //商品分类底部
        $ad14 = db('ad')->where('pid=14')->order('start_time','desc')->limit(1)->cache(true,1)->select();   
        $this->assign('ad14',$ad14);

        //商品分类右侧
        $ad51 = db('ad')->where('pid=51')->order('start_time','desc')->limit(1)->cache(true,1)->select();   
        $this->assign('ad51',$ad51);

        //轮播图右侧广告
        $ad52 = db('ad')->where('pid=52')->order('start_time','desc')->limit(2)->cache(true,1)->select();   
        $this->assign('ad52',$ad52);

        //轮播图底部广告
        $ad53 = db('ad')->where('pid=53')->order('start_time','desc')->limit(3)->cache(true,1)->select();   
        $this->assign('ad53',$ad53);

        //轮播图底部2
        $ad3 = db('ad')->where('pid=3')->order('start_time','desc')->limit(1)->cache(true,1)->select();   
        $this->assign('ad3',$ad3);


        $hot_goods = $hot_cate = $cateList = array();
        $sql = "select a.goods_name,a.goods_id,a.shop_price,a.market_price,a.cat_id,b.parent_id_path,b.name from ".config('database.prefix')."goods as a left join ";
        $sql .= config('database.prefix')."goods_category as b on a.cat_id=b.id where a.is_hot=1 and a.is_on_sale=1 order by a.sort";//二级分类下热卖商品       
        $index_hot_goods = cache('index_hot_goods');
        if(empty($index_hot_goods))
        {
            $index_hot_goods = Db::query($sql);//首页热卖商品
            //dump($index_hot_goods);
            cache('index_hot_goods',$index_hot_goods,1);
        }
       
        if($index_hot_goods){
              foreach($index_hot_goods as $val){
                  $cat_path = explode('_', $val['parent_id_path']);
                  //dump($cat_path);
                  $hot_goods[$cat_path[1]][] = $val;
                  
              }
              //dump($hot_goods);
        }
        $hot_category = db('goods_category')->where("is_hot=1 and level=3 and is_show=1")->cache(true,1)->select();//热门三级分类
        //dump($hot_category);die;
        foreach ($hot_category as $v){
        	$cat_path = explode('_', $v['parent_id_path']);
        	$hot_cate[$cat_path[1]][] = $v;
        }
        //dump($this->cateTrre[1]['tmenu'][0]['sub_menu']);die;
        foreach ($this->cateTrre as $k=>$v){
            if($v['is_hot']==1){
        		$v['hot_goods'] = empty($hot_goods[$k]) ? '' : $hot_goods[$k];
        		$v['hot_cate'] = empty($hot_cate[$k]) ? '' : $hot_cate[$k];
        		$cateList[] = $v;
        	}
        }
        $this->assign('cateList',$cateList);
        //dump($cateList[0]['hot_goods']);
        return $this->fetch();


    
 
   
   
        /* 添加背景图 */
        if ($back_img && file_exists($back_img)) {
            $back =Image::open($back_img);
            $back->thumb($QR_width, $QR_height, \think\Image::THUMB_CENTER)
             ->water($qr_code_file, \think\Image::WATER_NORTHWEST, 60);//->save($qr_code_file);
            $QR = $back;
        }
        
        /* 添加头像 */
        if ($head_pic) {
            //如果是网络头像
            if (strpos($head_pic, 'http') === 0) {
                //下载头像
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, $head_pic); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $file_content = curl_exec($ch);
                curl_close($ch);
                //保存头像
                if ($file_content) {
                    $head_pic_path = $qr_code_path.time().rand(1, 10000).'.png';
                    file_put_contents($head_pic_path, $file_content);
                    $head_pic = $head_pic_path;
                }
            }
            //如果是本地头像
            if (file_exists($head_pic)) {
                $logo = Image::open($head_pic);
                $logo_width = $logo->height();
                $logo_height = $logo->width();
                $logo_qr_width = $QR_width / 5;
                $scale = $logo_width / $logo_qr_width;
                $logo_qr_height = $logo_height / $scale;
                $logo_file = $qr_code_path.time().rand(1, 10000);
                $logo->thumb($logo_qr_width, $logo_qr_height)->save($logo_file);
                $QR = $QR->water($logo_file, \think\Image::WATER_CENTER);     
                unlink($logo_file);
            }
            if ($head_pic_path) {
                unlink($head_pic_path);
            }
        }
        
        if ($valid_date && strpos($url, 'weixin.qq.com') !== false) {
            $QR = $QR->text('有效时间 '.$valid_date, "./vendor/topthink/think-captcha/assets/zhttfs/1.ttf", 6, '#00000000', Image::WATER_SOUTH);
        }
        $QR->save($qr_code_file);
        
        $qrHandle = imagecreatefromstring(file_get_contents($qr_code_file));
        unlink($qr_code_file); //删除二维码文件
        header("Content-type: image/png");
        imagepng($qrHandle);
        imagedestroy($qrHandle);
        exit;
    }

    // 验证码
    public function verify()
    {
        //验证码类型
        $type = I('get.type') ? I('get.type') : '';
        $fontSize = I('get.fontSize') ? I('get.fontSize') : '40';
        $length = I('get.length') ? I('get.length') : '4';
        
        $config = array(
            'fontSize' => $fontSize,
            'length' => $length,
            'useCurve' => true,
            'useNoise' => false,
        );
        $Verify = new Verify($config);
        $Verify->entry($type);    
		exit();    
    }

    function truncate_tables (){
        $tables = DB::query("show tables");
        $table = array('tp_admin','tp_config','tp_region','tp_system_module','tp_admin_role','tp_system_menu','tp_article_cat','tp_wx_user');
        foreach($tables as $key => $val)
        {                                    
            if(!in_array($val['Tables_in_tpshop2.0'], $table))                             
                echo "truncate table ".$val['Tables_in_tpshop2.0'].' ; ';
                echo "<br/>";         
        }                
    }

    /**
     * 猜你喜欢
     * @author lxl
     * @time 17-2-15
     */
    public function ajax_favorite(){
        $p = I('p/d',1);
        $i = I('i',5); //显示条数
        $favourite_goods = M('goods')->where("is_recommend=1 and is_on_sale=1")->order('goods_id DESC')->page($p,$i)->cache(true,TPSHOP_CACHE_TIME)->select();//首页推荐商品
        $this->assign('favourite_goods',$favourite_goods);
        return $this->fetch();
    }
    
    public function test(){
    	header("Content-type: text/html; charset=utf-8");
    	$tables = DB::query("show tables");
    	$a = $b = 0;
    	foreach($tables as $key => $val)
    	{
    		$tb = $val['Tables_in_tpshop2.0'];//tpshop为数据库名称
			$fields = DB::query("show full fields from `$tb`");
			//dump($fields);
			foreach ($fields as $v){
				if(strpos($v['Type'],'int') && empty($v['Extra'])){
					if(empty($v['Default'])){
						DB::query("alter table $tb alter column `{$v['Field']}` set default 0");
						$a++;
					}
				}else{
					if(strpos($v['Type'],'char') && empty($v['Default'])){
						if($v['Null'] == 'YES'){
							//可以为空不做修改
						}else{
							//不能为空严格模式要求设默认值
							$sql = "ALTER TABLE `$tb` MODIFY COLUMN `{$v['Field']}` {$v['Type']} CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '".$v['Comment']."';";
							DB::query($sql);
							$b++;
						}
					}
				}
			}
    	}
    	echo $a.'<br>'.$b;
    	exit;
    }
}
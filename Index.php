<?php

namespace app\index\controller;


use think\Controller;
use think\Request;
use think\Db;
use think\Config;

use think\Cache;



class Index extends ApiBase
{

  


    private function isMobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset($_SERVER['HTTP_VIA'])) {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile', 'MicroMessenger');
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }
        return false;
    }

    //
    private function isWeixin() {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { 
            return true; 
        } else {
            return false; 
        }
    }

    public function share(){

    	$url=input('url');
        $v=input('v',1);

        $url=base64_decode($url);
        
        if($v!=1){
            $plaf_info=db('plat_setting')->field('qb_appid,qb_login_domain')->where(['id' => 1])->find();
            $url=$plaf_info['qb_login_domain']. '/apilogin/index.html#/phoneRegister?gameId='.$plaf_info['qb_appid'].$url;
        }
    	if(empty($url))
    		die('推广域名错误');
       return $this->assign('url',$url)->fetch();
    }


    public function str_api(){
        $HOST='12';
        $DBNAME='001';
        $USER='user';
        $PASS='230';
        $str='define(\'HOST\',\''.$HOST.'\');'.PHP_EOL.'define(\'DBNAME\',\''.$DBNAME.'\');'.'define(\'USER\',\''.$USER.'\');'.'define(\'PASS\',\''.$PASS.'\');';
        echo $str;


    }
    public function queue(){
        $jobHandlerClassName  = 'app\index\job\Demo'; 
        echo "2019";
        // 2.当前任务归属的队列名称，如果为新队列，会自动创建
        $jobQueueName  	  = "helloJobQueue"; 
        
        // 3.当前任务所需的业务数据 . 不能为 resource 类型，其他类型最终将转化为json形式的字符串
        //   ( jobData 为对象时，存储其public属性的键值对 )
        $jobData       	  = [ 'ts' => time(), 'bizId' => uniqid() , 'a' => 1 ] ;
        
        // 4.将该任务推送到消息队列，等待对应的消费者去执行
        $isPushed = Queue::push( $jobHandlerClassName , $jobData , $jobQueueName );	
        
        // database 驱动时，返回值为 1|false  ;   redis 驱动时，返回值为 随机字符串|false
        if( $isPushed !== false ){  
            echo date('Y-m-d H:i:s') . " a new Hello Job is Pushed to the MQ"."<br>";
        }else{
            echo 'Oops, something went wrong.';
        }
    }
    public function redis_api(){
        $redis = new \Redis();
 
        $redis->connect('127.0.0.1',6379);
        $arr = array('c','c++','php','java','go','python');
        foreach($arr as $k=>$v){
            $redis->rpush("myqueue",$v);
            echo $k."号入队成功"."<br/>";

        }
    }

    public function redis_out(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1',6379);
        // $has=$redis->hGet('go');
        var_dump($has);
        $value = $redis->lpop('myqueue');
        if($value){
            echo "出队的值".$value;
        }else{
            echo "出队完成";
 
        }


    }
    public function isJson($data){
        $data = json_decode($data, true);
 	
        if (is_array($data)&&!empty($data)) 
        {   
           

            return true; 
        } 
        return false; 
    }
    public function addjson($data){
     
    // $data = array('json'=>'656');
    $data=json_encode($data); 
    $isjson=$this->isJson($data);

    if($isjson){
         $datas=base64_encode($data);
         $data2['info']=$datas;
         $res=db("info")->insert($data2);
         return true;
    }
    return false;
    }
    public function getjson(){
        $where=array(
            'id'=>1
        );
        $res=db("info")->where($where)->find();
        if($res){
            $json=$res['info'];
            $dejosn=base64_decode($json);//反base64
            $oldArray = json_decode($dejosn,true);
            var_dump($oldArray);
        }
    }
    public function addGameModel(){
        header('Access-Control-Allow-Origin:*');
        header("Content-Type: text/html;charset=utf-8");
        $request = Request::instance();
        $param=$request->param();
        if($param&&!empty($param['config'])){
        $config=$param['config'];
       $res=$this->isJson($config);
       $data=array();
       if($res&&$param['api']){  
           $res2=base64_encode($config);
           var_dump($res2);
           $data['info']=$res2;
           $data['api']=$param['api'];
         $rest=db("model")->insert($data);
        //     echo $rest;
       }
        }else{
            echo "参数错误";
        }
      


    }


    public function upload_img(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        $thismonth=date('Ymd');
        $request = Request::instance();
        $domain=$request->domain();
      
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $file_path=ROOT_PATH . 'public' . DS . 'uploads/'.$thismonth.'/';
            $info = $file->rule('date')->move($file_path,'',false);
         
            if($info){
                $filename=$domain."/public/uploads/".$thismonth.'/'.$info->getSaveName();
                $data=[
                    'img'=>$filename
                ];
                $img=db('sys_img')->insert($data);
                
                $res=array(
                    'status'=>1,
                    'msg'=>'success',
                    'data'=>[
                        'filename'=>$filename
                    ]
                    );
                    echo json_encode($res);
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    public function get_sysimg_list(){
        $page=input('page');
        $res=db('sys_img')->order('addtime desc')->page($page)->select();
        if($res){
            $rest=array(
                'status'=>1,
                'msg'=>'success',
                'data'=>$res
                );
                echo json_encode($rest);
        }
    }


    public function getapp(){
        header('Access-Control-Allow-Origin:*');
        header("Content-Type: text/html;charset=utf-8");
        $request = Request::instance();
        $param=$request->param();
        $unionid=$param['unionid'];
        $api=$param['api'];
        $where=[
            'api'=>$api,
        ];
        $res=db('model')->where($where)->order('addtime')->find();
        var_dump($res);
        if($res){
            $where=[
                'mid'=>$res['id']
            ];
            $apidata=db('api')->where($where)->order('order asc')->select();
            var_dump($apidata);
        }
    }
    public function add_app(){
        header('Access-Control-Allow-Origin:*');
        header("Content-Type: text/html;charset=utf-8");
        $request = Request::instance();
        $param=$request->post();
        if($param){
            $param['uname']='admin';
            if($param['isshow']=='true'){
                $param['isshow']=1;
            }else{
                $param['isshow']=0;
            }
            $res=db('wxapp')->insert($param);
            var_dump($res);
            var_dump($param);
        }
      echo "bucuzna";
    }

    public function get_app_list(){
        header('Access-Control-Allow-Origin:*');
        header("Content-Type: text/html;charset=utf-8");
        $page=input('page');
        $where=[
            'isshow'=>1,
         
        ];

        $res=db("wxapp")->where('id','<>','100')->order('addtime,order')->limit(10)->page($page)->select();
      
        $data=array(
            'status'=>1,
            'msg'=>'success',
            'data'=>$res
            );
            echo json_encode($data);
    }
    public function appstatus(){
        $isshow=input("isshow");
        $appid=input("myappid");
        $where=[
            'appid'=>$appid
        ];
        $res=db('wxapp')->where($where)->update(['isshow' => $isshow]);
        $data=array(
            'status'=>1,
            'msg'=>'success',
            'data'=>$res
            );
            echo json_encode($data);
    }
    public function apistatus(){
        $isshow=input("isshow");
        $id=input("id");
        $where=[
            'id'=>$id
        ];
        $res=db('api')->where($where)->update(['isshow' => $isshow]);
        $data=array(
            'status'=>1,
            'msg'=>'success',
            'data'=>$res
            );
            echo json_encode($data);
    }
    public function deldetailapi(){
        $id=input("id");
        $where=[
            'id'=>$id
        ];
        $res=db('api')->where($where)->delete();
        $data=array(
            'status'=>1,
            'msg'=>'success',
            'data'=>$res
            );
            echo json_encode($data);
    }
    public function getGameApi(){
        $appid=input('myappid');
        $page=input("page");
        $where=[
            'appid'=>$appid
        ];
        $res=db('model')->where($where)->order("order desc,addtime desc")->select();
        if($res){
            $arr=array();
            foreach ($res as $key => $value) {
                # code...
                $info=$value['info'];
                $arr[$key]['info']=base64_decode($info);
                $newarr=json_decode($arr[$key]['info'],true);
                $arr[$key]['modelname']=isset($newarr['modelname'])?$newarr['modelname']:'默认模型a';
                $arr[$key]['addtime']=$value['addtime'];
                $arr[$key]['id']=$value['id'];
                $arr[$key]['api']=$value['api'];
            }
            $data=array(
                'status'=>1,
                'msg'=>'success',
                'data'=>$arr
                );
                echo json_encode($data);
        }
   
    }
    public function getAllGameModel(){
        $limit=5;
        $page=input("page");
        if(!$page){
            $page=5;
        }
        $res=db('model')->limit($limit)->page($page)->order('addtime desc')->select();
        if($res){
            $arr=array();
            foreach ($res as $key => $value) {
                # code...
                $info=$value['info'];
                $arr[$key]['info']=base64_decode($info);
                $newarr=json_decode($arr[$key]['info'],true);
                $arr[$key]['modelname']=isset($newarr['modelname'])?$newarr['modelname']:'默认模型a';
                $arr[$key]['addtime']=$value['addtime'];
                $arr[$key]['id']=$value['id'];
                $arr[$key]['api']=$value['api'];
            }
            $data=array(
                'status'=>1,
                'msg'=>'success',
                'data'=>$arr
                );
                echo json_encode($data);
        }

    }
    public function delGameApi(){
        $api=input("api");
        $appid=input("myappid");
        $where=[
            'appid'=>$appid,
            'api'=>$api
        ];
        $res=db('model')->where($where)->find();
        if($res){
            $rest=db('model')->where('id',$res['id'])->delete();
            if($rest){
                $data=array(
                    'status'=>1,
                    'msg'=>'success',
                    'data'=>[]
                    );
                    echo json_encode($data);
            }
        }
     
    }

    public function getGameModel(){
        $id=input("id");
        if(!$id){
            $id=2;
        }
        $where=array(
            "id"=>$id
        );
        $res=db("model")->where($where)->find();
        $arr=array();
        if($res){
           
            $rest=base64_decode($res['info']);
            $arr['info']=$rest;
        
        $data=array(
            'status'=>1,
            'msg'=>'success',
            'data'=>$arr
            );
            echo json_encode($data);
            // $this->return_json($arr);
        }else{
            echo "bucunz";
        }
    }
    public function get_apidata(){
        header('Access-Control-Allow-Origin:*');
        header("Content-Type: text/html;charset=utf-8");
        $mid=input("mid");
        if($mid){
            $where=[
                'mid'=>$mid,
            ];
            $res=db('api')->where($where)->select();
            $data=array(
                'status'=>1,
                'msg'=>'success',
                'data'=>$res
                );
            echo json_encode($data);
        }
    }
    public function add_apidata(){
        header('Access-Control-Allow-Origin:*');
        header("Content-Type: text/html;charset=utf-8");
        $request = Request::instance();
        $param=$request->param();
       
        if($param&&!empty($param['mid'])){

      
        $unionid=$param['unionid'];
        $admin=$param['mid'];
        $info=$param['info'];
        $order=$param['order'];
        $mid=$param['mid'];//api模型id
        $isshow=$param['isshow'];
        if($isshow=='true'){
            $isshow=1;
        }else{
            $isshow=0;
        }
        $data=array(
            'unionid'=>$unionid,
            'admin'=>$admin,
            'info'=>$info,
            'order'=>$order,
            'aid'=>0,
            'mid'=>$mid,
            'isshow'=>$isshow

        );
        $res=db('api')->insert($data);
        $status=0;
        if($res){
            $status=1;
        }
            $data=array(
            'status'=>$status,
            'msg'=>'success',
            'data'=>$data
            );
        echo json_encode($data);
    }
    }
    public function gamemodel(){
        

    }
    
   //插入更新 on DUPLICATE key 测试insertBykey
    public function insertKey(){
        echo "2000";
        $day=date('Y-m-d H:i:s');
        var_dump($day);
        $data=array(
            'openid'=>'201991',
            'name'=>'n0000999919'
        );
        $execute_sql="Create table `bc_ab_log`(`name` varchar(255) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '这是表');";

        $kog_sql="Create table `bc_ab_log`(`goodname` varchar(255) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '日志表');";
        // Db::execute($execute_sql);
        $keydata=array(
            'openid'=>'openid',
            'sex'=>10

        );
        $table='goods';
        $sqldata=array(
            'id'=>'id',
            'goodnum'=>'int',
            'addtime'=>'time',
            // 'status'=>array(
            //     'type'=>'int',
            //     'default'=>0,
            // )

        );
        $res=$this->addTable($table,$sqldata);
        $table="ab_goods";
        $goods=array(
            'id'=>'id',
            'count'=>'int',//总数
            'amount'=>'int',//价格
            'addtime'=>'time',
        );
        $res=$this->addTable($table,$goods);
        $table="ab_order";
        $order=array(
            'id'=>'id',
            'user_id'=>'int',
            'goods_id'=>'int',
            'price'=>'int',
            'status'=>'int',
            'order_sn'=>'string',
            'addtime'=>'time',
        );
        $res=$this->addTable($table,$order);

        $table="ab_log";
        $log=array(
         'id'=>'id',
         'count'=>'int',//总数
         'status'=>'int',//价格
         'addtime'=>'time',
     );
     $res=$this->addTable($table,$log);
        var_dump($res);
        // $user=db('main_info')->insertByKey($data,$data);

        // $userId = Db::name('main_info')->getLastInsID();
    }
    public function tableData(){
        $table="ab_order";
        $day=date('Y-m-d H:i:s');
        $order=array(
            'id'=>1,
            'user_id'=>1,
            'goods_id'=>1,
            'price'=>2,
            'status'=>1,
            'order_sn'=>'string',
            'addtime'=>$day,
        );
        $res=db($table)->insert($order);
        var_dump($res);
        echo "插入";
        $table="ab_goods";
        $goods=array(
            'id'=>1,
            'count'=>60,//总数
            'amount'=>2,//价格
            'addtime'=>$day,
        );
       $res=db($table)->insert($goods);

       var_dump($res);
    }
    //动态创建表函数
    public function addTable($table,$data = []){
 
      
        $table=config('database.prefix').$table;
        $data=$this->array2string($data);

        echo "<br>";
        $sql="Create table IF NOT EXISTS `{$table}`({$data})";
        var_dump($sql);
        $res=Db::execute($sql);
        var_dump($res);
    }

    //数组转单行字符串进行计算

    public function array2string($array,$inc=false){
      
 
        $string = [];
     
        if($array && is_array($array)){
     
            foreach ($array as $key=> $value){
         
                   $string[]=$this->str_type($key,$value);
                   
            }
        }
     
        return implode(',',$string);
  
}

public function str_type($key,$value){
    switch ($value){
        case "id":
        $string=" id int(6) auto_increment not null primary key ";
        break;
        case 'int':
        $string="`".$key."`"." int(10) ";
        break;
        case 'string':
        $string="`".$key."`"." varchar(250) ";
        break;
        case 'time':
        $string="`".$key."`"." TIMESTAMP ";
        break;
   
        default:
        $string="";
    }
    return $string;
}

public function delTable($table){
    $sql="DROP TABLE {$table}";
    $res=Db::execute($sql);
    return $res;

}

    public function test_api(){
        // $asset=NewQb::get_app_asset(); 
        // print_r($asset);
        
        // $balance=NewQb::get_wallet_balance(); 
        // print_r($balance);
        // die();
        
        $addr=NewQb::recharge_addr(5,3);
        $balance=NewQb::add_coin(5,3,1000);
        print_r($balance);

        die();

    }

    public function tmp_read_excel(){
        $arr=readExcel('./static/20190226.xlsx');
        foreach ($arr as $key => $item) {

            $etlt= floor($item['1']*100000000)/100000000;
            $check=Db::table('bc_user_etle_tmp')->where(['nickname'=>$item['0'],'etlt'=>$etlt])->find();
            if(!empty($check))
                continue;

            $user_info=Db::table('bc_user')->field('id')->where(['nickname'=>$item['0']])->find();
            $user_id=empty($user_info['id']) ? 0 :$user_info['id'];
            Db::table('bc_user_etle_tmp')->insert([ 'user_id' => $user_id,'nickname' => $item['0'], 'etlt' => $etlt, 'status' => 0]);
        }
        die();
    }


}

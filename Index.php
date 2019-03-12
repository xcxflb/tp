<?php

namespace app\index\controller;


use think\Controller;
use think\Request;
use think\Db;
use think\Config;

use think\Cache;



class Index extends ApiBase
{

  
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

   //插入更新 on DUPLICATE key 测试insertBykey
    public function insertKey(){
     
        $data=array(
            'openid'=>'201991',
            'name'=>'n0000999919'
        );
        // $execute_sql="Create table `bc_test`(`name` varchar(255) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '这是表');";
        // Db::execute($execute_sql);
        $keydata=array(
            'openid'=>'openid',
            'sex'=>10

        );

        $user=db('main_info')->insertByKey($data,$data);

        $userId = Db::name('main_info')->getLastInsID();

        $where=array(
            'openid'=>'201991'
        );
        if($user==false){
            $res=db('main_info')->where($where)->update($data);
    
        }
 
    
    }

    public function array2string($array){
      
 
            $string = [];
         
            if($array && is_array($array)){
         
                foreach ($array as $key=> $value){
                    $string[] = $key.'='.$value;
                }
            }
         
            return implode(',',$string);
      
    }
    

}

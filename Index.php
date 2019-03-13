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
     

//生成唯一订单

function build_order_no(){

    return date('ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

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
//生成数据表
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
//sql字段类型
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

}

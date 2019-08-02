<?php
//封装把数据库数据转换成标准格式的json数据

class Response{
    public static function json($code,$msg='',$data=array()){
        if(!is_numeric($code)){
           //如果$code不是数字，就直接退出
            return '';
        }

        $result=array(
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data
        );

//        var_dump($result);
        echo json_encode($result);
    }

//    将传递过来的键值对转化成php能用的数据
//            传递过来的是一个全新的数组
//           [ '{"title":"gwregre","status":0}' => string ''] =$data
    public static function transData($data){

        $a = '';  //值 解析为字符串 string ''
        $trans = array_flip($data);
        $b = $trans[$a];  //键中包含想要的数据 '{"title":"gwregre","status":0}'

//            将字符串转换成对象
          return json_decode($b);  //{"title":"gwregre","status":0}

    }
}
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
}
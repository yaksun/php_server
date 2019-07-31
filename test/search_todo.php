<?php

require_once 'response.php';
require_once 'todoService.class.php';




//$arr=array('id'=>1,'title'=>'hehe','status'=>1);

//var_dump($arr);

//$newArr=iconv('UTF-8','GBK','');
//转换编码UTF-8为GBK
//json_encode必需要UTF-8编码
// Response::json(200,'获取数据成功',$arr);

$res =todoService::searchTodo();

//var_dump($res);

Response::json(200,'获取数据成功',$res);
<?php

namespace app\index\controller;

//use app\index\model\Todo;
use think\Db;



class Index
{
    public function index()
    {
        return 'hello';
    }

    public function search()
    {
       $res = Db::name('todo')->select();
//        var_dump($res);
        \Response::json(200,'数据获取成功',$res);

    }
}

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
    

//    获取待办，并返回json格式数据
    public function search()
    {
       $res = Db::name('todo')->select();
//        var_dump($res);
        \Response::json(200,'数据获取成功',$res);

    }
    
    
    //更新待办
    public function update()
    {
        if(!empty($_POST)){
            $data = $_POST;
            echo ('你来了');
        }

    }
}

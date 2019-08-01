<?php

namespace app\index\controller;



//use app\index\model\Todo;
use function MongoDB\BSON\fromJSON;
use think\Db;
use think\response\Json;


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

    //增加待办
    public function add()
    {
        if(!empty($_POST)){
//           var_dump($_POST);
//            传递过来的是一个全新的数组
//           [ '{"title":"gwregre","status":0}' => string '']
//           根据value取出对应的key
           $a = '';
            $trans = array_flip($_POST);
            $b = $trans[$a];
//            '{"title":"gwregre","status":0}'

//            将字符串转换成对象
                $c = json_decode($b);

//                echo $c->title;
                $data=[];
                $data['title']=$c->title;
                $data['status']=$c->status;
                 $id = Db::name('todo')->insertGetId($data);
                 if($id){
                     \Response::json(200,'添加待办成功','');
                 }



    }

    }

    //删除待办
    public function delete($_POST)
    {

        var_dump($_POST);
//            $res = Db::name('todo')->delete($id);
//
//        if ($res) {
//            \Response::json(200, '删除待办成功', ['id' => $id]);
//        }
    }




}

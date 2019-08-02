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
//           调用封装的方法
           $data = \Response::transData($_POST);

           $res = Db::name('todo')
                ->where('id', $data->id)
                ->data(['title' => $data->title,'status'=>$data->status])
                ->update();
        }

        if($res){
            \Response::json(200,'待办更新成功','hehe');
        }
    }

    //切换所有待办是否被选中
    public function check(){
        if(!empty($_POST)){

            $a = '';
            $trans = array_flip($_POST);
            $b = $trans[$a];

            if($b==='true'){
                 $res = Db::name('todo')->where('status',0)->update(['status'=>1]);
            }else{
               $res =  Db::name('todo')->where('status',1)->update(['status'=>0]);
            }

            if($res){
                \Response::json(200,'待办更新成功','hehe');
            }
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
    //只能接受$id
    //参数写$_POST页面报错
    public function delete($id=0)
    {
//        当不传参数的时候，默认为0
//        删除状态为1的所有待办
        if($id==0){
           $res = Db::name('todo')->where('status',1)->delete();
        }else{
            $res = Db::name('todo')->delete($id);
        }


        if ($res) {
            \Response::json(200, '删除待办成功', ['id' => $id]);
        }
    }




}

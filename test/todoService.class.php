<?php

require_once 'sqlHelper.class.php';
class todoService{

    //增加TODO
    public static function addTodo($title,$status){
        $sql="insert into todo (title,status) VALUES ($title,$status) ";
        $sqlhelper = new sqlHelper();
        return $sqlhelper->sql_dml($sql);
    }

    //    删除TODO
    public static function delTodo($title){
        $sql="delete from todo where title=$title";
        $sqlhelper = new sqlHelper();
        return $sqlhelper->sql_dml($sql);

    }


    //更新TODO
    public static function upTodo($title,$status){
        $sql="update todo set status=$status where title=$title";
        $sqlhelper = new sqlHelper();
        return $sqlhelper->sql_dml($sql);
    }

    //查询TODO
    public static function searchTodo(){
        $sql="select * from todo";
        $sqlhelper = new sqlHelper();
        return $sqlhelper->sql_dql($sql);
    }
}

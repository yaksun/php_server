<?php

//直接操作数据库
class sqlHelper{
    public $mysqli;
    private static $host='localhost';
    private static $user='root';
    private static $pass='';
    private static $db='todolist';


    function __construct(){
        $this->mysqli=new mysqli(self::$host,self::$user,self::$pass,self::$db);
        if($this->mysqli->connect_errno){
            echo "连接失败".$this->mysqli->connect_error;
        }

        $this->mysqli->query("set names utf8");
    }

    //增删改
    function sql_dml($sql){
        $res = $this->mysqli->query($sql)or die('操作失败'.$this->mysqli->error);

        if(!$res){
            return 0;//失败
        }else{
            if($this->mysqli->affected_rows>0){
                return 1;//成功
            }else{
                return 2;//没有行受影响
            }
        }
    }

    //查询
    function sql_dql($sql){
        $res = $this->mysqli->query($sql);

        return $res;

    }

}


?>
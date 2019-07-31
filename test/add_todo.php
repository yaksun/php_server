<?php


require_once 'todoService.class.php';


    function add($title,$status){
        $todo= new todoService();
        $todo->addTodo($title,$status);
//        echo 'hello';
    }

    add('ppp',1);
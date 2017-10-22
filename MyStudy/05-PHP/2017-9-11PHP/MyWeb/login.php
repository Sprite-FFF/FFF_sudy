<?php
    // 用数组来模拟数据库

    $users = array(
        'admin'=>'123456',
        'test'=>'12345'
    );

    // 获取用户的表单提交

    $name = $_POST['name'];
    $pwd = $_POST['pwd'];

    // 检测用户名和密码

    if(array_key_exists($name,$users)){
        if($pwd == $users[$name]){
            echo "登陆成功";
            header('Refresh: 2;url=./index.php');
        }else{
            echo "密码错误";
        }
    }else{
        echo "用户名不存在";
    }
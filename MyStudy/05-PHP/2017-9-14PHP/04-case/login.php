<?php
    // 获取用户提交上来的用户名和密码

    $username = $_POST['user'];
    $password = $_POST['pwd'];

    // 从数据库(文件)查询数据
    // 1、打开文件
    $res = fopen('./users.txt','r');

    // 取出所有用户信息 存入一个数组中

    $users = array();

    // 使用fget()方法逐行获取
    while ($txt = fgets($res)){
        array_push($users,$txt);
    }

    print_r($users);
    // 关闭文件
    fclose($res);

    // 将数组改造为一个关联数组
    $user_arr = array();
    foreach ($users as $key => $value) {
        $user = explode(' ',$value);
        array_pop($user);
        $user_arr[$user[0]] = $user[1];
    }

    // 做登陆验证
    if (array_key_exists($username,$user_arr)) {
        // 判断密码是否一致
        if($password == $user_arr[$username]){
            echo '登陆成功';
        }else {
            echo '用户名或密码错误';
        }
    }else {
        echo '用户名不存在';
    }

<?php 
    //php可以获取请求头信息
    // 通过超全局变量来获取
    // $_SERVER
    // 也是一个数组

    print_r($_SERVER);
    // 可以通过判断请求头客户端信息
    $agent = $_SERVER['HTTP_USER_AGENT'];
    var_dump(strpos($agent,'iPhone'));
?>
<?php

    // session 存储在服务端的数据、主要记录客户端的访问状态 

    // 在PHP中需要通过session_start先开启session
    session_start();

    // 通过超全局数组?$_SESSION可以操作session
    // 当使用$_SESSION在服务端存一个session时
    // 会自动设置一个响应头Set-Cookie，浏览器看到这个响应头
    // 会自动设置一个名为PHPSESSID的cookie，并且这个cookie在下次请求时
    // 会将这个cookie以请求头的方式返回到服务器端，根据PHPSESSID来获取数据
    $_SESSION['name'] = '小明'
?>
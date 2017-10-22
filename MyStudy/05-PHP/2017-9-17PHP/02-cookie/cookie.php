<?php
    // 使用$_COOKIE超全局数组可以获得客户端请求里的cookie信息
    // print_r($_COOKIE);
    // 使用 setcookie函数可以指挥浏览器设置cookie
    // 当调用setcookie后、会自动设置一个响应头
    // Set-Cookie   当浏览器看到这样一个响应头后、会乖乖设置一个cookie
    setcookie('user','绘里',strtotime('1day'),'/');
?>
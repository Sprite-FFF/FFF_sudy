<?php
    // PHP 中使用time可以获取服务器时间
    // echo time();    //获取当前秒数
    // echo microtime();

    // php中可以将时间戳格式化

    echo date('Y-m-d',time());
    echo date('y-m-d',time());
    echo date('Y/m/d',time());

    // php中可以将某些特殊字符串转换为时间戳
    echo date('Y-m-d',strtotime('-1day'));
?>
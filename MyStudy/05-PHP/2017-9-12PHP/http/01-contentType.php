<?php
    header('Content-Type: text/css');
    echo 'body{background-color:red;}';
    
    // header('Content-Type:text/javascript');
    // echo 'alert(123)';

    // 缓存
    // 通知浏览器60秒之内不用再来请求我了,暂时不会有更改
    header('Cache-Control:max-age=60');
    // 读取文件内容
    $count = file_get_contents('./test.txt');
    $count++;
    file_put_contents('./test.txt',$count);
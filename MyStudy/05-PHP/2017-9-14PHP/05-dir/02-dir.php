<?php

    // 创建目录
    // 默认不支持多级创建(递归创建)
    // mkdir('./test');
    // mkdir('./test/css/my');      // 报错

    // 第二个参数可以用来设置目录访问权限

    // 通过第三个参数可以实现递归创建
    // mkdir('./test/css/my',000,true);


    // 删除目录
    // 只能删除空文件夹
    // rmdir('./test/css/my'); 
    // rmdir('./test/css');
    // rmdir('./test');
    // rmdir('./demo');

    // 要想查看某个目录下的文件，需要先打开文件夹
    $res = opendir(__DIR__);
    // echo $res;   //资源ID
    // 查看目录
    // echo readdir($res); //  .
    // echo '<br>';
    // echo readdir($res);  // ..
    // echo('<br>');
    // echo(readdir($res));
    // echo('<br>');
    // echo(readdir($res));
    // echo('<br>');
    // var_dump(readdir($res));    //false
    // 使用readdir 每次读取一个目录或文件
    // . 和 .. 本质是目录 只是默认隐藏
    // 当读取不到时就返回false
    
    // 关闭
    closedir($res);

    // scandir() 查找指定目录文件及子目录
    // 返回一个数组
    print_r(scandir(__DIR__));
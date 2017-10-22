<?php

    // 修改文件名和路径
    // 原来文件不会存在
    // 相当于剪切的功能

    $path = './pan/dog.jpg';
    
    // 修改为一个不存在的路径并不会去创建
    // echo rename($path,'./pan/img/dog.jpg');

    // 修改成功返回 true
    echo rename($path,'./pan/dog1.jpg');
<?php

    $path = './pan/demo.txt';
    $img = './pan/dog.jpg';

    // echo file_get_contents($img);    
    // 可以读取文件的内容
    echo file_get_contents($path);

    // 写入数据
    // 写入数据支持字符串和数组
    // 如果不是字符串会隐式转换为字符串
    // file_put_contents($path,"醉里挑灯看剑");

    file_put_contents($path,array('name'=>'绘里','age'=>'18'));
    // 没有第三个参数内容会覆盖
    // 追加内容
    file_put_contents($path,'妹子',FILE_APPEND);
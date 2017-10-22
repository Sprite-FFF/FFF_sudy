<?php
    // 数组指针
    $arr = array('html','css','js','C#','python');

    // 通过current()可以返回数组中的某个单元

    // 输出当前指针指向的单元值，默认为第0个
    // echo current($arr);

    // next()将指针后移一步

    // next($arr);
    // echo current($arr);

    next($arr);
    next($arr);
    next($arr);

    // 可以这样输出
    echo next($arr);

    // 返回当前指针位置
    echo key($arr);

    // prev()   将指针前移一步
    echo prev($arr);
    // end()    将指针指向最后一个单元
    // reset()  将指针指向第一个单元

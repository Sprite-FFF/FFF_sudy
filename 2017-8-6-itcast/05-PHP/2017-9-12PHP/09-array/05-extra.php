<?php

    $user = array('name'=>'无心',age=>1000,'gender'=>'男');

    // 将数组key键名取出，组成一个新数组
    array_keys($user);

    // 通过array_values 可以将所有单元的value值取出，组成一个新数组

    array_values($users);

    // 通过array_key_exists 可以判断一个数组中是否存在某个key
    // 有则返回true 无则返回false
    array_key_exists('name',$users);  
    
    // 去除数组中重复的 值 
    array_unique($arr);

    // array_pop 将数组最后一个单元删除
    // 操作原数组
    // 返回弹出的值
    array_pop($user);

    // array_push 可以在数组末尾添加一个单元
    // 操作原数组
    array_push($users,'aaa');

    // array_shift 从数组开头弹出一个

    // array_unshift 从数组开头添加一个


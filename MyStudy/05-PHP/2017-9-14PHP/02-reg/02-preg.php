<?php
    // php支持正则表达式
    // 主要有4个函数
    // preg_match preg_replace preg_split preg_grep

    // preg_match
    // 根据正则查找内容
    $str = '但是龙城飞将在，不教23胡马度阴山';

    preg_match('/\d+/',$str,$re);

    // 查询到的结果是一个数组
    print_r($re);

    // preg_replace()   根据正则替换内容
    // 返回替换后的字符串
    echo preg_replace('/\d+/',"18",$str);

    // preg_split() 可以根据正则表达式拆分内容
    // 返回拆分的数组
    $info = 'to be or not to be';
    print_r(preg_split('/\s/',$info));

    // preg_grep 可以在数组中根据正则表达式查找符合条件的单元
    $arr = array('name'=>'桃谷','age'=>'18','score'=>'96');
    var_dump(preg_grep('/\d+/',$arr));
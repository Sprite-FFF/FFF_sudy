<?php

    $str = 'I love coding';

    // 将字符串使用定界符拆分为字符串数组
    
    print_r(explode(' ',$str));
    // 将数组转化为字符串
    $arr = array('我','秦','始皇','打钱');

    print_r(implode('',$arr));
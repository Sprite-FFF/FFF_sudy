<?php

    // strpos() 查找字符串    从左往右开始查找    返回该字符串首次出现的位置
    // 查找不到返回false

    $str = 'boys and girls';

    echo strpos($str,'a');
    var_dump(strpos($str,'z'));

    $cn = '醉里挑灯看剑、梦回吹角连营';

    echo mb_stripos($cn,'剑');

    // strrpos()    从右往左查找
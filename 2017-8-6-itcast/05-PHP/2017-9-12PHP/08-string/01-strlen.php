<?php
    // 字符串
    // $str = 'hello world!';
    // echo strlen($str);

    $ch = "我叫小明";
    // 一个汉字占3个字节
    // echo strlen($ch);    12

    // mb_strlen()  宽字符方法
    // echo mb_strlen($ch);    4

    $str = "my name is 小明";
    echo mb_strlen($str);   //英文字母也会被当做一个字符

?>
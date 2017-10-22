<?php
    $str = 'vollenteer';

    // 截取字符串

    // 从索引值2截取到最后
    echo substr($str,2);

    // 第二个参数：截取的位置
    // 第三个参数：截取的长度
    echo substr($str,2,4);


    $cn = '落霞与孤鹜齐飞，秋水共长天一色';
    // 
    // echo substr($cn,2,4);    只能截取3的倍数

    // mb_substr()  宽字符
    echo mb_substr($cn,2,5);
?>
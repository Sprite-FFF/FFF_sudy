<?php
    $path = './中文文件夹';

    // is_dir要去磁盘中判断有没有$path这个目录
    // $path 这个路径是记录在Windows系统中的
    // 路径在Windows中是以gbk编码存在的
    // var_dump(is_dir($path)); //fales

    // 将utf-8转换为gbk对比
    $path = iconv('utf-8','gbk',$path);
    var_dump(is_dir($path));    //true
    

?>
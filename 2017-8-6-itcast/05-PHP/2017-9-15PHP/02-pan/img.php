<?php
    $path = $_GET['path'];
    // $path 是一个utf-8编码的路径
    $path = iconv('utf-8','gbk',$path);
    readfile($path);
?>
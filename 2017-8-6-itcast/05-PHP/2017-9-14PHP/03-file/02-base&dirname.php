<?php

$path = './pan/demo.txt';
echo dirname($path);    //目录名称

echo '<br>';

echo basename($path);   //完整文件名

// 注意细节
// pathinfo 和dirname basename并不检测路径是否真的存在
// 只是单纯分析路径格式
// 另外还要注意文件名不一定都有拓展名
echo '<br>';

$str = './public/css/index';
print_r(pathinfo($str));
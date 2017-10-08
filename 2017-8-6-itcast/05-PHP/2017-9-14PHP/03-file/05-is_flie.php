<?php

    // is_fire
    // is_dir

    // 会检测文件是否存在
    // 如果存在再检测是否为文件和文件夹
    $pathdir = './pan';
    $path = './pan/demo.txt';

    // 返回true 和 false
    var_dump(is_file($pathdir));
    var_dump(is_dir($pathdir));

    var_dump(is_file($path));
    var_dump(is_dir($path));
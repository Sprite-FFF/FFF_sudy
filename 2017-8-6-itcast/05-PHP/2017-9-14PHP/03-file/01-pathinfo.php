<?php

    $path = './pan/demo.txt';
    // 获得一个关联数组
    // 四个单元
    // 1.dirname    目录名称
    // 2.basename   完整文件名
    // 3.extention   拓展名
    // 4.filename   文件名
    print_r(pathinfo($path));
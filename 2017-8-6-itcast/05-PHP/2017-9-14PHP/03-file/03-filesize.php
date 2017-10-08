<?php

    $path = './pan/dog.jpg';

    // filesize会检测文件是否存在
    // 如果不存在会报错
    // 获取文件大小   字节

    // 直接获取文件夹是不可以的
    // 文件夹大小是 0

    
    echo filesize($path);
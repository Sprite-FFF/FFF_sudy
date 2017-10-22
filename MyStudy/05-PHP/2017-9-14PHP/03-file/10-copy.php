<?php
    // copy()复制文件
    $path = './pan/dog.jpg';
    // copy($path,'./pan/img/222.jpg');

    // 复制到相同文件夹下的相同文件不会报错
    copy($path,'./pan/dog.jpg');

    echo 123;
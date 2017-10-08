<?php

    $file = '../pan/demo.css';

    $res = fopen($file,r+);

    // 逐行读取文件(以行为单位)
    echo fgets($res);
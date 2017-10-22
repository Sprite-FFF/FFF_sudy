<?php

    // 自动检测路径是否存在
    // 然后返回绝对路径
    $path = './pan/demo.txt';

    echo realpath($path);
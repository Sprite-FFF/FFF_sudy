<?php

    $path = './pan/dog.jpg';

    // 通过文件检测是否存在然后再进行其他操作
    // 可以避免不必要的错误出现 使逻辑更健壮

    // flie_exists  文件检测
    // 如果存在返回 true 不存在返回false
    var_dump(file_exists($path));

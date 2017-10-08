<?php
    // 下载的资源路径
    $img = './01.jpg';
    // 响应内容为2进制数据流
    header('Content-Type: application/octet-stream');
    // 下载时的文件名
    header('Content-Disposition: attachment;filename=girl.jpg');
    // 清空缓存区
    ob_clean();
    // 读取文件
    readfile($img);
?>
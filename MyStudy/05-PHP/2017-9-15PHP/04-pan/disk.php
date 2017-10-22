<?php 
    // 硬盘信息
    // 定义一个常量去保存盘符
    define('DISK','D:\\');
    $total = round(disk_total_space(DISK)/1024/1024/1024,2);
    $free = round(disk_free_space(DISK)/1024/1024/1024,2);
    $used = $total-$free;
    return array(
        'total'=> $total,
        'free' => $free,
        'used'=> $used,
        'percent'=> round($used/$total,2)*100 . '%'
    );
?>
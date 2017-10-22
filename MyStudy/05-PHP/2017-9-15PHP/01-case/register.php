<?php

// 打开文件     a&w 模式下 如果文件不存在会自动创建
$res = fopen('./users.txt','a');

// 给文件添加内容要有一定格式
// 在php中单引号内的内容会被当做纯字符串来解析
// 双引号内的特殊字符会得到解析

// rewind($res);
array_push($_POST,",\r\n"); 

// 将数组以空格分割为字符串
$user = implode(' ',$_POST);

// 写入文件
// 如果fwrite写入失败会返回false
if(fwrite($res,$user)){
    echo '注册成功';
}

// 关闭文件

fclose($res);


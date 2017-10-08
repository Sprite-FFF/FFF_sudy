<?php

// php通过超全局变量来获取客户端提交过来的数据

// $_GET  $_POST  $_REQUEST;

// $_GET    是一个数组 客户端以get方式提交上来的数据会自动保存到$_GET中

// print_r($_GET);

//$_POST    是一个数组   客户端以post方式提交上来的数据会自动保存包$_POST中

// print_r($_POST);

// $_REQUEST 是一个数组，浏览器（客户端）
// 以 get 或 post 提交上来的数据会被自动放到
// $_REQUEST 这个数组中

// print_r($_REQUEST);

// 使用超全局变量 $_FILES 可以获取浏览器（客户端）提交上来的文件
// $_FILES 就一个二维数组，数组中记录了上传文件的详情

print_r($_FILES);
?>
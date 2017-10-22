<?php
$users = array('admin'=>'12345','FFF'=>'23456');

$data = $_GET['name'];

$flag = array_key_exists($data,$users);

if(!$flag){
    echo "用户名可用";
}else{
    echo "用户名已存在";
}
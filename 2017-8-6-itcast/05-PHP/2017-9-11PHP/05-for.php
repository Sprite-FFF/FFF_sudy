<?php

// 数组遍历
// 索引数组

$arr = array('python','javaScript','java','C#','php');
// php中使用count()来计算数组长度
for($i = 0;$i < count($arr);$i++){
    echo $arr[$i];
}

// 关联数组

$array = array('name'=>'坂田银时','age'=>24,'gender'=>'男');

// foreach()遍历数组

foreach ($array as $key => $value) {
    echo($key . "  ");
    echo $value;
}

// 遍历索引数组

foreach ($arr as $k => $val){
    echo $val;
}
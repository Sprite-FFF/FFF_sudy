<?php

	// php中定义变量用$符号
	// 
	// $a = 123;
	// echo $a;

	// PHP 和  JS 同属于弱类型

    // 变量无需要声明类型，变量的类型根据的变化来变化
    // 
    // 数据类型：
    // 数值类型：整数和浮点数
   	// $num = 123;
   	// $float = 1.2;
   	// echo $num;
   	// echo $float;
   	// 
   	// 
    // 字符串
    // // 1、在php中使用 '' 或 "" 来定义字符串
    $str = "hello ";
    $str1 = 'world';
    // echo $str;
    // echo $str1;

    // 在PHP中单/双引号有差别:
    // / 使用单引号定义字符串不能对变量进行解析
    $world1 = '$str world!';
    echo $world1;
    echo "<br>";
    // 使用单引号定义字符串可以对变量进行解析
    $world2 = "$str world!";
    echo $world2;
    // 
    // 数组：
    // php用array关键字来定义数组
    // 
    // 索引数组
    // 通过下标访问数据
    $arr = array(1,2,4,5,3);
    echo $arr[1];
    // // 关联数组，通过键/值对来定义数组单元，并且通过键来访问单元值
    $arr1 = array('name'=>'糯米','age'=>'2');
    echo $arr1['name'];
    // 对象
    // null
?>
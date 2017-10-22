<?php

/**
 * @Author: FFF
 * @Date:   2017-09-11 09:26:51
 * @Last Modified by:   FFF
 * @Last Modified time: 2017-09-11 10:15:29
 */

//  class 关键字来定义一个类
class Person{
	public $name = '桃桃';
	public $age = '16';
	function sayHi(){
		echo "你好";
	}
}

// new关键字来实例化一个对象
$p = new Person();
// 用->来调用对象的属性和方法
echo $p->name;
echo $p->age;
$p -> sayHi();

// is_null()用来检测变量是否为null
// 如果是则返回true	如果不是则返回false
// echo只能输出字符串类型、如果输出内容不是字符串
// 会进行隐式数据类型转换	true被转换为 1	false被转换为''空字符串
$a = null;
echo '<br>';
echo is_null($a);
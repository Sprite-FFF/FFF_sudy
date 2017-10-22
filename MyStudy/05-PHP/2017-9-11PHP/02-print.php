<?php

$str = 'hello world!';
echo $str;  // hello world!

$num = 222;
echo $num;  // 222

$bool = true;
echo $bool; // 1

$bool1 = false;
echo $bool1; // '' 空字符串

echo '<br>';

$arr = array('小丁猫','大白','桃桃');
// echo $arr;  // echo不能直接有意义的输出

// 使用print_r()来输出数组结构的数据

print_r($arr);
echo '<br>';

// 使用var_dump()方法输出变量详细信息

var_dump($str);
var_dump($bool);
var_dump($arr);
var_dump($num);

class Person {
    public $name = '小丁猫';
    public $age = 18;
    public function sayHi(){
        echo '少年不知愁滋味';
    }
}
$p = new Person();
var_dump($p);
echo '<br>';
$p -> sayHi();
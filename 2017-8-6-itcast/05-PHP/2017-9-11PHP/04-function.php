<?php

// 函数：
// php中函数和js中函数相同

// function fn (){
//     echo '子非鱼、安知鱼之乐';
// }
// fn();

// 可以设置返回值
// function fn(){
//     return 100;

//     // 后面代码不会执行
// }
// echo fn();

// 可以设置参数   

// function fn($a,$b){
//     return $a+$b;
// }

// echo fn(3,4);


// php  参数可以设置默认值
// ES6中也可以给函数参数设置默认值

function fn($a = 2,$b = 3){
    return $a+$b;
}
echo fn();
echo fn(20,40);
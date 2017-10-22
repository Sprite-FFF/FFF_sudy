<?php
    // 静态变量
    function fn(){
        // 使用static关键字声明一个静态变量
        static $count = 1;
        $count++;
        echo $count;
    }
    // 函数执行完毕后不会被清理掉
    fn(); 
    fn(); 
    fn(); 
    fn(); 
    fn(); 
?>
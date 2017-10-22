<?php

    // 定义在函数外部的变量为全局变量
    $name = '小明'; 
    function fn (){
        // 局部也不能访问全局变量
        global $name;   //在这里是不可以赋值的
        // 如果想要在局部访问全局变量
        // 需要global关键字 指定
        // 在局部声明global后是可以改变全局变量的

        //除了可以使用global关键字 可以访问全局变量
        // 还可以使用 超全局数组 $GLOBALS
        // $GLOBALS 将所有的全局变量都存起来了
        $name = '小红';
        echo $name;
        echo $GLOBALS['name'];
    }
    fn();
?>
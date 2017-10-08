<?php

    class Person {
        // 类里的属性可以设置可见性的
        // 访问权限
        // public   公开的
        // protected    受保护的
        // private  私有的

        // 解构函数
        // 在实例化后会自动调用
        // 实例化时可以接收实例化时所传递的参数

        function __construct(){
            echo
        }
        public $eye = 2;
        protected $arm = 2;
        private $leg = 2;
    }

    class Chinese extends Person{

    }
?>
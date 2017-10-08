<?php
    // 多态
    // 覆盖   重载   虚方法    接口
    class Person{
        public $name = '绘里';
    }

    // 使用extends关键字实现继承
    class Student extends Person{
        public function sayHi(){
            echo $this->name;
        }
    }

    $p = new Student();

    $p->sayHi();
?>
<?php
    // 继承
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
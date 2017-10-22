<?php

    // 通过list 可以将数组中的单元值可以一次性赋值给某些变量

    list($a,$b,$c) = array('html','css','javascript','python');

    echo $a;    //html
    echo $b;    //css
    echo $c;    //javascript

    // es6  结构赋值
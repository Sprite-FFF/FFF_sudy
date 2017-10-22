<?php 
    // 访问数据库

    // 1.链接数据库
    // 默认情况下，php是不支持访问mysql的、需要开一个扩展才能支持
    // extension=php_mysql.dll
    // extension=php_mysqli.dll
    // 返回资源类型
    $connect = mysqli_connect('localhost','root','wait991016');
    // var_dump($connect);

    // 2、选择数据库
    mysqli_select_db($connect,'Students');

    // 3、设置编码集
    mysqli_set_charset($connect,'utf-8');

    // 4、
    mysqli_query($connect,"insert into stuInfo values('亚丝娜',16,'女','刀剑')");
?>
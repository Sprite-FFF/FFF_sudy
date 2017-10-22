<?php 
    print_r($_POST);

    //  链接数据库
    $connect = mysqli_connect('127.0.0.1','root','wait991016');
    // 
    mysqli_select_db($connect,'web');
    // 
    mysqli_set_charset($connect,'utf8');
    // 插入数据
    $sql = "insert into users values(null,'".$_POST['user']."','".$_POST['pwd']."','".$_POST['gender']."','". implode('|',$_POST['hobby'])."','".$_POST['address']."')";
    echo $sql;
    mysqli_query($connect,$sql);
?>
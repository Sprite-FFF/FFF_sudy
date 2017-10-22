<?php
    require '../function.php';
    // 先判断是否有这个文件夹
    // 如果没有创建文件夹

    if(!file_exists('../uploads')){
        mkdir('../uploads');
    };

    $filename = time().$_FILES['avatar']['name'];
    $path = '/uploads/'.$filename;
    move_uploaded_file($_FILES['avatar']['tmp_name'],'..'.$path);
    session_start();
    $uid = $_SESSION['user_info']['id'];
    update('users',array('avatar'=>$path),$uid);
    $_SESSION['user_info']['avatar'] = $path;   //更换完头像后、更新一下session中的数据
    echo $path;
?>
<?php 

// 模拟数据库存储数据
$arr = array('admin'=>'123456','test'=>'t123');

// 获取客户端提交来的数据
$user = $_POST['userName'];
$pwd = $_POST['pwd'];

// 判断用户提交的数据
// 
if(array_key_exists($user,$arr)){
    if($pwd == $arr[$user]){
        echo('登陆成功');
    }else{
        echo '密码错误';
    }
}else{
    echo '找不到用户名';
}

?>
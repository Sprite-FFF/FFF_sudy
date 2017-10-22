<?php
    // $arr = array('name'=>'绘里','age'=>18);
    // 通过json_encode()可以将一个数组或者对象转化为一个json格式的字符串
    // 
    // echo json_encode($arr);

    // json_decode 可以将一个json格式的字符串转化成为一个对象或数组
    $data = json_decode($_GET['test']);
    print_r($data);
    echo $data -> name;
    echo $data -> age;
    echo $data -> gender;
?>
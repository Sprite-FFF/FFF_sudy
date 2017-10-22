<?php
    // echo "我叫".$_POST['name']."今年".$_POST['age']."了、俄罗斯老流氓爱你呦!";
    // print_r($_POST);
    // echo json_decode($_POST);

    // 当以不同的方式向服务端发送数据时
    // 服务端需要以不同的方式进行接收

    // $_POST   是专门用来处理 Content-Type:application/x-www-form-urlencoded

    // 通过file_get_contents('php://input');可以接收
    // Content-Type:application/json
    // var_dump(file_get_contents('php://input'));
    echo file_get_contents('php://input');
    // echo json_encode(file_get_contents('php://input'));
?>
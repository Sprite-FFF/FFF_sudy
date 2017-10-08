<?php 
    $connect = mysqli_connect('127.0.0.1','root','wait991016');
    mysqli_select_db($connect,'web');
    mysqli_set_charset($connect,'utf8');
    $rows = mysqli_query($connect,'select*from users');

    // 从查询结果中   逐行将数据取出来
    // 每次只读一行数据
    // mesqli_fetch_assoc()

    $list = array();
    while ($row = mysqli_fetch_assoc($rows)){
        $list[] = $row;
    }
    // var_dump($list);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <?php foreach($list as $key => $val){?>
        <tr>
            <td><?php echo $val['id']?></td>
            <td><?php echo $val['user']?></td>
            <td><?php echo $val['pwd']?></td>
            <td><?php echo $val['gender']?></td>
            <td><?php echo $val['hobby']?></td>
            <td><?php echo $val['address']?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
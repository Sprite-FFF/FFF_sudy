<?php 
    // 分页
    // 1、要根据数据库总的数据的条数来确定有多少页
    // 2、确定每页的记录条数

    // 总数据
    $total = 100;
    // 每页的条数
    $pageSize = 8;
    // 一共有多少页
    $pageCount = ceil($total / $pageSize);
    // 当前页
    $currentPage = isset($_GET['page'])?$_GET['page']:1;
    // 上一页
    $prevPage = $currentPage-1;
    // 下一页
    $nextPage = $currentPage + 1;
    // 当前显示几个页码
    // 
    $pageLimit = 6;
    // 根据当前页码判断页面的终点
    $end = $currentPage + floor($pageLimit/2);
    // 判断边界值
    $end = $end >=$pageCount ? $pageCount : $end;
    // 根据页码终点计算页码起点
    $start = $end - $pageLimit + 1;
    // 判断边界值
    $start = $start < 1 ? 1 : $start;
    // 所有页码
    // $pages = range(1,$pageCount);
    $pages = range($start,$end);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>分页</title>
        <style>
            a{
                float:left;
                width:40px;
                height:32px;
                line-height:32px;
                text-align:center;
                text-decoration:none;
                border:1px solid #aaa;
                margin-left:-1px;
            }
            .active{
                background-color: orchid;
            }
        </style>
    </head>
    <body>
        <?php if($currentPage>1){ ?>
            <a href="./page2.php?page=<?php echo $prevPage; ?>">上一页</a>
        <?php } ?>

        <!-- foreach遍历页码  -->
        <?php foreach($pages as $key => $val){ ?>
            <?php if($val == $currentPage) {?>
                <a class="active" href="./page2.php?page=<?php echo $val; ?>"><?php echo $val; ?></a>
            <?php } else{?>
                <a href="./page2.php?page=<?php echo $val; ?>"><?php echo $val; ?></a>
            <?php }?>  
        <?php } ?>

        <?php if($currentPage<$pageCount){ ?>
        <a href="./page2.php?page=<?php echo $nextPage; ?>">下一页</a>
        <?php } ?>
    </body>
    </html>
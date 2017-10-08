<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>我是一个php文件、但内容却是html</h1>

    <!-- php的解析规则 -->
    <?php $arr = array('首页','新闻','热点','美女'); ?>

    <ul>
        <?php foreach ($arr as $key => $value) {?>
            <li><a href="javascript:;"><?php echo $value; ?></a></li>
        <?php } ?>
    </ul>
</body>
</html>
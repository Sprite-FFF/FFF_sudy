<?php
  // session_start();
  // // 如果查不到session
  // // 则认为未登录
  // // 跳转回登陆页面
  // if(!isset($_SESSION['user_info'])){
  //   header("Location:/admin/login.php");
  //   exit;
  // }

  require '../function.php';
  checkLogin();
  $active = 'index';
  $actives = array();
  // 文章总数
  $sql = 'SELECT COUNT(id) AS count FROM posts';
  $count = query($sql)[0]['count'];
  // 草稿数
  $sql = 'SELECT COUNT(id) AS count FROM posts WHERE status="drafted"';
  $count_drafted = query($sql)[0]['count'];
  // 分类
  $sql = 'SELECT COUNT(id) AS count FROM categories';
  $count_categroy = query($sql)[0]['count'];
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <?php include './inc/head.php'; ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
   <?php include './inc/nav.php'; ?>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>One Belt, One Road</h1>
        <p>Thoughts, stories and ideas.</p>
        <p><a class="btn btn-primary btn-lg" href="/admin/post-add.php" role="button">写文章</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><strong><?php echo $count; ?></strong>篇文章（<strong><?php echo $count_drafted; ?></strong>篇草稿）</li>
              <li class="list-group-item"><strong><?php echo $count_categroy; ?></strong>个分类</li>
              <li class="list-group-item"><strong>5</strong>条评论（<strong>1</strong>条待审核）</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>

  <?php include './inc/aside.php'; ?>

  <?php include './inc/script.php';?>
</body>
</html>

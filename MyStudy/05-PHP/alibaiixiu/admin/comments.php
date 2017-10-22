<?php
  require '../function.php';
  checkLogin();

  $active = 'comments';
  $actives = array();

  $sql = 'SELECT * FROM comments';
  $lists = query($sql);

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Comments &laquo; Admin</title>
  <?php include './inc/head.php'; ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './inc/nav.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有评论</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <div class="btn-batch" style="display: none">
          <button class="btn btn-info btn-sm">批量批准</button>
          <button class="btn btn-warning btn-sm">批量拒绝</button>
          <button class="btn btn-danger btn-sm">批量删除</button>
        </div>
        <ul class="pagination pagination-sm pull-right">
          <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>作者</th>
            <th>评论</th>
            <th>评论在</th>
            <th>提交于</th>
            <th>状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach($lists as $key => $val) { ?>
          <tr <?php if($key == 0){ ?> class="danger" <?php } ?> >
              <td class="text-center"><input type="checkbox"></td>
              <td><?php echo $val['author']; ?></td>
              <td><?php echo $val['content']; ?></td>
              <td><?php echo $val['post_id']; ?></td>
              <td><?php echo $val['created']; ?></td>
              <td><?php echo $val['status']; ?></td>
              <td class="text-center">
                <a href="post-add.html" class="btn btn-info btn-xs">批准</a>
                <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include './inc/aside.php'; ?>

  <?php include './inc/script.php'; ?>
</body>
</html>

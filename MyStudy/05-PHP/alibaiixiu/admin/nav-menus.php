<?php 
  require '../function.php';
  checkLogin();

  $actives = array('menus','slides','settings','set');
  $active = 'menus';

  // key value 为数据库关键字 需要 `` 符号来转义
  $sql = 'SELECT `value` FROM options where `key`="nav_menus"';
  $list = query($sql);
  $json = $list[0]['value'];
  // 将json数据格式转换为数组
  // 第二个参数为true 强制转换为数组
  $lists = json_decode($json,true);

  // 添加
  if(!empty($_POST) && !empty($_POST['text'])){
    $lists[] = $_POST;
    $json = json_encode($lists,JSON_UNESCAPED_UNICODE);
    $result = update('options',array('value'=>$json),9);
    if($result) {
      header('Location:/admin/nav-menus.php');
    }
  }

  // 移除
  if(!empty($_GET) && $_GET['action'] == 'delete'){
    $index = $_GET['key'];
    unset($lists[$index]);
    // 我这里没有出现老师所说的bug
    // 转为json数据格式时所出现的错误
    $json = json_encode($lists,JSON_UNESCAPED_UNICODE);
    $result = update('options',array('value'=>$json),9);
    if(result){
      header('Location:/admin/nav-menus.php');
    }
  }
?>



<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Navigation menus &laquo; Admin</title>
  <?php include './inc/head.php'; ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './inc/nav.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>导航菜单</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-4">
          <form action="/admin/nav-menus.php" method="post">
            <h2>添加新导航链接</h2>
            <div class="form-group">
              <label for="text">文本</label>
              <input id="text" class="form-control" name="text" type="text" placeholder="文本">
            </div>
            <div class="form-group">
              <label for="title">标题</label>
              <input id="title" class="form-control" name="title" type="text" placeholder="标题">
            </div>
            <div class="form-group">
              <label for="href">链接</label>
              <input id="href" class="form-control" name="link" type="text" placeholder="链接">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">添加</button>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>文本</th>
                <th>标题</th>
                <th>链接</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lists as $key => $val){ ?>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td><i class="<?php echo $val['icon']; ?>"></i><?php echo $val['text']; ?></td>
                <td><?php echo $val['title'] ?></td>
                <td><?php echo $val['link'] ?></td>
                <td class="text-center">
                  <a href="/admin/nav-menus.php?action=delete&&key=<?php echo $key ?>" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php include './inc/aside.php'; ?>

  <?php include './inc/script.php'; ?>
</body>
</html>

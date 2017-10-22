<?php 
  require '../function.php';
  // 检查登录状态
  checkLogin();
  $actives = array('post-add','posts','categories','article');
  $active = 'categories';
  // 获取所有分类数据展示在table中
  $sql = 'SELECT * FROM categories';
  $lists = query($sql);

  // 获取action的值
  // 根据不同的action值做不同的操作
  $action = isset($_GET['action']) ? $_GET['action'] : 'add';
  // 获取id 要根据id做编辑和删除操作
  $cat_id = isset($_GET['id']) ? $_GET['id'] : 0;

  $title = '新增分类目录';
  $btnTxt = '添加';

  if($action == 'add' && !empty($_GET['name'])){ //执行添加操作
    unset($_GET['id']);
    unset($_GET['action']);
    $result = insert('categories',$_GET);
    if($result){
      header('Location:/admin/categories.php');
      exit;
    }
    $message = '添加失败';
  }else if($action == 'edit'){  //执行编辑操作
    $title = '编辑分类目录';
    $btnTxt = '修改';
    $action = 'update';
    $sql = 'SELECT * FROM categories WHERE id='.$cat_id;
    $list = query($sql);
    // print_r($list);exit;
  }else if($action=='update'){ //执行修改操作
    $cat_id = $_GET['id'];
    unset($_GET['id']);
    unset($_GET['action']);
    $result = update('categories',$_GET,$cat_id);
    if($result){
      header('Location:/admin/categories.php');
      exit;
    }
    $message = '修改失败';
  }else if($action == 'delete'){  //执行删除操作
    $sql = 'DELETE FROM categories WHERE id='.$cat_id;
    $result = delete($sql);
    if($result){
      header('Location:/admin/categories.php');
      exit;
    }
    $message = '删除失败';
  }


?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <?php include './inc/head.php'; ?>
</head>
<body>
  <!-- <script>NProgress.start()</script> -->

  <div class="main">
    <?php include './inc/nav.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <?php if(isset($message)){ ?>
      <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $message ?>;
      </div>
      <?php } ?>
      <div class="row">
        <div class="col-md-4">
          <form action="/admin/categories.php" method="get">
            <h2><?php echo $title; ?></h2>
            <div class="form-group">
              <input type="hidden" name="action" value="<?php echo $action; ?>">
              <input type="hidden" name="id" value="<?php echo $cat_id; ?>"
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" value="<?php echo isset($list[0]['name']) ? $list[0]['name'] : ''; ?>" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" value="<?php echo isset($list[0]['slug']) ? $list[0]['slug'] : ''; ?>" placeholder="slug">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit"><?php echo $btnTxt; ?></button>
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
                <th>名称</th>
                <th>Slug</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($lists as $key => $val){ ?>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td><?php echo $val['name']; ?></td>
                <td><?php echo $val['slug']; ?></td>
                <td class="text-center">
                  <a href="/admin/categories.php?action=edit&id=<?php echo $val['id']; ?>" class="btn btn-info btn-xs">编辑</a>
                  <a href="/admin/categories.php?action=delete&id=<?php echo $val['id']; ?>" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php include './inc/aside.php' ?>

  <?php include './inc/script.php' ?>
</body>
</html>

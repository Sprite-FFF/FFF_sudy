<?php 
  require '../function.php';
  checkLogin();
  $active = 'users';
  $actives = array();

  if(!empty($_POST)){
    if($_POST['old-pwd']!=$_SESSION['user_info']['password']){
      $message = '密码错误';
    }else if($_POST['new-pwd']!=$_POST['repwd']){
      $message = '两次输入密码不一致';
    }else {
      $result = update('users',array('password'=>$_POST['new-pwd']),$_SESSION['user_info']['id']);
      if($result){
        header('Location:/admin/login.php');
        $_SESSION = null;
        exit;
      }
      $message = '修改失败';
    }
  }
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Password reset &laquo; Admin</title>
  <?php include './inc/head.php' ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './inc/nav.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>修改密码</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <?php if(isset($message)){ ?>
      <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $message; ?>
      </div>
      <?php } ?>
      <form class="form-horizontal" action="/admin/password-reset.php" method="post" >
        <div class="form-group">
          <label for="old" class="col-sm-3 control-label">旧密码</label>
          <div class="col-sm-7">
            <input id="old" class="form-control" name="old-pwd" type="password" placeholder="旧密码">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">新密码</label>
          <div class="col-sm-7">
            <input id="password" class="form-control" name="new-pwd" type="password" placeholder="新密码">
          </div>
        </div>
        <div class="form-group">
          <label for="confirm" class="col-sm-3 control-label">确认新密码</label>
          <div class="col-sm-7">
            <input id="confirm" class="form-control" name="repwd" type="password" placeholder="确认新密码">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-7">
            <button type="submit" class="btn btn-primary">修改密码</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include './inc/aside.php'; ?>

  <?php include './inc/script.php'; ?>
</body>
</html>

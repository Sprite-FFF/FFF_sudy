<?php 
  // session_start();
  // 登录时将用户信息存进了session
  // 可以将用户信息从session中取出
  // 现实中一般不这样用、因为用户在登录状态中
  // 随时可能会发生改变
  // 所以要从新获取信息、可以将用户id从session中取出、利用id获取

  require '../function.php';
  checkLogin();

  $active = 'users';
  $actives = array();
  
  $uid = $_SESSION['user_info']['id'];
  $sql = 'SELECT * FROM users WHERE id='.$uid;
  $list = query($sql);
  $message = '';
  if(!empty($_POST)){
    unset($_POST['email']);
    $result = update('users',$_POST,$uid);
    if($result){
      header('Location:/admin/profile.php');
      exit;
    }else{
      $message='修改失败';
    }
  }


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
      <div class="page-title">
        <h1>我的个人资料</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <?php if(!empty($message)){?>
      <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $message; ?>
      </div>
      <?php } ?>
      <form action="./profile.php" method="post" class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-3 control-label">头像</label>
          <div class="col-sm-6">
            <label class="form-image">
              <input id="avatar" type="file">
              <?php if(empty($list[0]['avatar'])){ ?>
                <img class="preview" src="/assets/img/default.png">
              <?php }else{?>
                <img class="preview" src="<?php echo $list[0]['avatar'];?>">
              <?php } ?>
              <i class="mask fa fa-upload"></i>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">邮箱</label>
          <div class="col-sm-6">
            <input id="email" class="form-control" name="email" type="type" value="<?php echo $list[0]['email']; ?>" placeholder="邮箱" readonly>
            <p class="help-block">登录邮箱不允许修改</p>
          </div>
        </div>
        <div class="form-group">
          <label for="slug" class="col-sm-3 control-label">别名</label>
          <div class="col-sm-6">
            <input id="slug" class="form-control" name="slug" type="type" value="<?php echo $list[0]['slug']; ?>" placeholder="slug">
            <p class="help-block">https://zce.me/author/<strong>zce</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="nickname" class="col-sm-3 control-label">昵称</label>
          <div class="col-sm-6">
            <input id="nickname" class="form-control" name="nickname" type="type" value="<?php echo $list[0]['nickname']; ?>" placeholder="昵称">
            <p class="help-block">限制在 2-16 个字符</p>
          </div>
        </div>
        <div class="form-group">
          <label for="bio" class="col-sm-3 control-label">简介</label>
          <div class="col-sm-6">
            <textarea id="bio" class="form-control" name="bio" placeholder="Bio" cols="30" rows="6"><?php echo $list[0]['bio']; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary">更新</button>
            <a class="btn btn-link" href="/admin/password-reset.php">修改密码</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include './inc/aside.php'; ?>

  <?php include './inc/script.php'; ?>

  <script>
    // 上传头像预览
    $("#avatar").on("change",function(){
      NProgress.start();
      var data = new FormData();
      data.append("avatar",this.files[0]);
      var xhr = new XMLHttpRequest;
      xhr.open("post","/admin/upfile.php");
      xhr.send(data);
      xhr.addEventListener("readystatechange",function(){
        if(xhr.readyState==4&&xhr.status==200){
          // console.log(this.responseText);
          $(".preview").attr('src',this.responseText);
          NProgress.done();
        }
      });
    });
  </script>
</body>
</html>

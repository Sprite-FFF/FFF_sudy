<?php
    require '../function.php';
    $message = '';
    if(!empty($_POST)){
        $email = $_POST['email'];
        $pwd  = $_POST['pwd'];

        // 连接数据库
        // $connect = mysqli_connect('localhost','root','wait991016');
       
        // // 执行查询语句
        // $data = mysqli_query($connect,'select email,password from users where email="'.$email.'"');

        // $row = mysqli_fetch_assoc($data);
        // print_r($row);
        $sql = 'select * from users where email="'.$email.'"';
        $rows = query($sql);
        // print_r($rows);
        if(@$rows[0]){
          if($rows[0]['password'] == $pwd){
            // 通过会话记录下登录状态
            // 存一个session、服务器会自动设置一个响应头set-cookie
            // 给浏览器、然后浏览器在本地存一个cookie 名字叫PHPSESSID
            // 超全局数组 $_SESSION
            // 先开启session
            session_start();
            $_SESSION['user_info'] = $rows[0];


            // 跳转
            // '/'代表当前域名
            header('Location:/admin');
            exit;
        
          }else{
            $message = '密码错误';
          }
        }else{
          $message = '邮箱不存在';
        }

    }

?>


  <!DOCTYPE html>
  <html lang="zh-CN">

  <head>
    <meta charset="utf-8">
    <title>Sign in &laquo; Admin</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <script src="../assets/vendors/nprogress/nprogress.css"></script>
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
  </head>

  <body>
    <script>NProgress.start();</script>
    <div class="login">
      <form class="login-wrap" method="post" action="login.php">
        <img class="avatar" src="../assets/img/default.png">
        <!-- 有错误信息时展示 -->
        <!-- 如果message不为空 -->
        <!-- 打印message -->
        <?php if(!empty($message)){ ?>
        <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $message?>
        </div>
        <?php } ?>
        <div class="form-group">
          <label for="email" class="sr-only">邮箱</label>
          <input id="email" type="email" name="email" class="form-control" placeholder="邮箱" autofocus>
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">密码</label>
          <input id="password" type="password" name="pwd" class="form-control" placeholder="密码">
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="登录">

      </form>
    </div>
    <script>NProgress.done();</script>
  </body>

  </html>
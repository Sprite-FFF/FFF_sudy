<?php 
  require '../function.php';
  checkLogin();

  $active = 'settings';
  $actives = array('menus','slides','settings','set');

  // $sql = 'SELECT `value` FROM options WHERE  ';
  $sql = 'SELECT * FROM options WHERE id < 9';
  $lists = query($sql);

  // logo上传处理
  if(!empty($_FILES)){
    if(!file_exists('../assets/img')){
      mkdir('../assets/img');
    }

    $path = "/assets/img/logo.png";
    move_uploaded_file($_FILES['logo']['tmp_name'],'..'.$path);
    echo $path;exit;
  }

  // 修改网站信息
  if(!empty($_POST)){
    // 连接数据库
    $connection = connect();
    // 循环执行sql语句
    // 一条一条修改
    foreach($_POST as $key => $val){
      $sql = 'UPDATE options SET `value`="'. $val .'" WHERE `key`="' . $key .'"';
      mysqli_query($connection,$sql);
    }
  }

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Settings &laquo; Admin</title>
  <?php include './inc/head.php' ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './inc/nav.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>网站设置</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <form class="form-horizontal" action="/admin/settings.php" method="post" >
        <div class="form-group">
          <label for="site_logo" class="col-sm-2 control-label">网站图标</label>
          <div class="col-sm-6">
            <input id="site_logo" value="<?php echo $lists[1]['value']; ?>" name="site_logo" type="hidden">
            <label class="form-image">
              <input id="logo" type="file">
              <img id="show-logo" src="<?php echo $lists[1]['value']; ?>">
              <i class="mask fa fa-upload"></i>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="site_name" class="col-sm-2 control-label">站点名称</label>
          <div class="col-sm-6">
            <input id="site_name" name="site_name" class="form-control" type="type" value="<?php echo $lists[2]['value']; ?>" placeholder="站点名称">
          </div>
        </div>
        <div class="form-group">
          <label for="site_description" class="col-sm-2 control-label">站点描述</label>
          <div class="col-sm-6">
            <textarea id="site_description" name="site_description" class="form-control" placeholder="站点描述" cols="30" rows="6"><?php echo $lists[3]['value']; ?>
            </textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="site_keywords" class="col-sm-2 control-label">站点关键词</label>
          <div class="col-sm-6">
            <input id="site_keywords" name="site_keywords" class="form-control" value="<?php echo $lists[4]['value']; ?>" type="type" placeholder="站点关键词">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">评论</label>
          <div class="col-sm-6">
            <div class="checkbox">
<label><input id="comment_status" name="comment_status" type="checkbox" <?php if($lists[6]['value'] == 1){ ?> checked<?php } ?>>开启评论功能</label>
            </div>
            <div class="checkbox">
<label><input id="comment_reviewed" name="comment_reviewed" type="checkbox" <?php if($lists[7]['value'] == 1){ ?> checked <?php } ?>>评论必须经人工批准</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-primary">保存设置</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include './inc/aside.php' ?>

  <?php include './inc/script.php' ?>

  <!-- 上传logo -->
  <script>
    $("#logo").on('change',function(){
      var data = new FormData();
      data.append('logo',this.files[0]);

      var xhr = new XMLHttpRequest();
      xhr.open("post","/admin/settings.php");
      xhr.send(data);
      xhr.addEventListener("readystatechange",function(){
        if(this.readyState == 4 && this.status == 200){
          $("#site_logo").val(this.responseText);
          $("#show-logo").attr("src",this.responseText);
        }
      });
    });
  </script>
</body>
</html>

<?php 
  require '../function.php';
  checkLogin();

  $active = 'slides';
  $actives = array('menus','slides','settings','set');

  // 展示数据
  $sql = 'SELECT `value` FROM options WHERE `key`= "home_slides"';
  $list = query($sql)[0];
  $json = $list['value'];
  $lists = json_decode($json,true);

  // 删除
  if(!empty($_GET) && $_GET['action'] == 'delete'){
    $index = $_GET['key'];
    unset($lists[$index]);
    $json = json_encode($lists,JSON_UNESCAPED_UNICODE);
    $result = update('options',array('value'=>$json),10);
    if($result){
      header('Location:/admin/slides.php');
    }
  }

  // 添加
  if(!empty($_POST) && !empty($_POST['text'])){
    $lists[] = $_POST;
    $json = json_encode($lists,JSON_UNESCAPED_UNICODE);
    $result = update('options',array('value'=>$json),10);
    if($result){
      header('Location:/admin/slides.php');
    }
  }

  // 处理上传的图片
  if(!empty($_FILES)){
    if(!file_exists('../uploads/slides')){
      mkdir('../uploads/slides');
    }

    $filename = time().$_FILES['image']['name'];
    $path = '/uploads/slides/' . $filename;
    move_uploaded_file($_FILES['image']['tmp_name'],'..'.$path);
    echo $path;
    exit; 
  }
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Slides &laquo; Admin</title>
  <?php include './inc/head.php' ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './inc/nav.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>图片轮播</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
        <div class="col-md-4">
          <form action="/admin/slides.php" method="post" >
            <h2>添加新轮播内容</h2>
            <div class="form-group">
              <label for="image">图片</label>
              <!-- show when image chose -->
              <img class="help-block thumbnail showImg" style="display: none">
              <input id="image" class="form-control" type="file">
              <input type="hidden" name="image">
            </div>
            <div class="form-group">
              <label for="text">文本</label>
              <input id="text" class="form-control" name="text" type="text" placeholder="文本">
            </div>
            <div class="form-group">
              <label for="link">链接</label>
              <input id="link" class="form-control" name="link" type="text" placeholder="链接">
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
                <th class="text-center">图片</th>
                <th>文本</th>
                <th>链接</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($lists as $key => $val) { ?>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><img class="slide" src="<?php echo $val['image']; ?>"></td>
                <td><?php echo $val['text']; ?></td>
                <td><?php echo $val['link']; ?></td>
                <td class="text-center">
                  <a href="/admin/slides.php?action=delete&&key=<?php echo $key; ?>" class="btn btn-danger btn-xs">删除</a>
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

  <!-- 上传轮播图 -->
  <script>
    $("#image").on("change",function(){
      var data = new FormData();
      data.append("image",this.files[0]);
      var xhr = new XMLHttpRequest;
      xhr.open('post','/admin/slides.php');
      xhr.send(data);
      xhr.addEventListener("readystatechange",function(){
        if(this.readyState == 4 && this.status == 200){
          $(".showImg").attr("src",this.responseText).show();
          $("input[name='image']").val(this.responseText);;
        }
      });
    });
  </script>
</body>
</html>

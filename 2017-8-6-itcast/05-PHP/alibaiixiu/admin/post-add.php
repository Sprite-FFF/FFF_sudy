<?php 
  require '../function.php';

  checkLogin();
  $actives = array('post-add','posts','categories','article');
  $active = 'post-add';
  // 查询category分类列表
  $sql = 'SELECT * FROM categories';
  $list = query($sql);
  
  $action = isset($_GET['action']) ? $_GET['action'] : 'add';
  if($action == 'add' && !empty($_POST)){
    $result = insert('posts',$_POST);
    if($result){
      header('Location:/admin/posts.php');
      exit;
    }
    $message = '保存失败、请重新提交';
  }

   // 上传图片
   if(!empty($_FILES)){
    if(!file_exists('../uploads/cover')){
      mkdir('../uploads/cover');
    }
    $filename = time().$_FILES['feature']['name'];
    $path = '/uploads/cover/'.$filename;
    move_uploaded_file($_FILES['feature']['tmp_name'],'..'.$path);
    echo $path;
    exit;
  }

  if($action == 'edit'){
    $action = 'update';
    $sql = 'SELECT * FROM posts WHERE id='.$_GET['pid'];
    $lists = query($sql);
  }
  if($action == 'update' && !empty($_POST)){
    $pid = $_POST['id'];
    unset($_POST['id']);
    $result = update('posts',$_POST,$pid);
    if($result){
      header('Location:/admin/posts.php');
      exit;
    }
    $message = '修改失败';
  }

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Add new post &laquo; Admin</title>
  <?php include './inc/head.php'; ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
   <?php include './inc/nav.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>写文章</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <form class="row" action='/admin/post-add.php?action=<?php echo $action; ?>' method='post'>
        <div class="col-md-9">
          <input type="hidden" name='user_id' value="<?php echo $_SESSION['user_info']['id']; ?>">
          <?php if(isset($lists)) { ?>
            <input type="hidden" name="id" value="<?php echo $lists[0]['id']; ?>">
          <?php } ?>
          <div class="form-group">
            <label for="title">标题</label>
            <input id="title" class="form-control input-lg" name="title" value="<?php echo isset($lists) ? $lists[0]['title'] : ''; ?>"; type="text" placeholder="文章标题">
          </div>
          <div class="form-group">
            <label for="content">内容</label>
            <textarea style="height:200px" id="content"  name="content" cols="30" rows="10" placeholder="内容">
              <?php echo isset($lists) ? $lists[0]['content'] : ''; ?>
            </textarea>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="slug">别名</label>
            <input id="slug" class="form-control" name="slug" value="<?php echo isset($lists) ? $lists[0]['slug'] : ''; ?>" type="text" placeholder="slug">
            <p class="help-block">https://zce.me/post/<strong>slug</strong></p>
          </div>
          <div class="form-group">
            <label for="feature">特色图像</label>
            <!-- show when image chose -->
            <?php if(empty($lists[0]['feature'])){ ?>
              <img class="help-block thumbnail preview" style="display: none">
            <?php }else{?>
              <img class="help-block thumbnail preview" src="<?echo $lists[0][feature];?>" >
            <?php } ?>
            <input id="feature" class="form-control" type="file">
            <input type="hidden" value="<?php echo isset($lists) ? $lists[0]['feature'] : ''; ?>" name="feature"  id="hd-feature">
          </div>
          <div class="form-group">
            <label for="category">所属分类</label>
            <select id="category" class="form-control" name="category_id">
              <?php foreach($list as $key => $val){ ?>
                <option <?php if(isset($lists)) { echo $val['id']==$lists[0]['category_id'] ? 'selected' : ''; } ?> value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="created">发布时间</label>
            <input id="created" class="form-control" name="created" value="<?php echo isset($lists) ? $lists[0]['created'] : ''; ?>" type="datetime">
          </div>
          <div class="form-group">
            <label for="status">状态</label>
            <select id="status" class="form-control" name="status">
              <option value="drafted" <?php if(isset($lists)){
                echo $lists[0]['status'] == 'drafted' ? 'selected' :'';
                }?> 
              >草稿</option>
              <option value="published" <?php if(isset($lists)){
                 echo $lists[0]['status'] == 'published' ? 'selected' :'';
                }?> 
              >已发布</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit">保存</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include './inc/aside.php'; ?>
  <?php include './inc/script.php'; ?>
  <script src="/assets/vendors/ueditor/ueditor.config.js"></script>
  <script src="/assets/vendors/ueditor/ueditor.all.min.js"></script>
  <script>
    UE.getEditor('content', {
      autoHeightEnabled: true
    });
    $("#feature").on("change",function(){
      NProgress.start();
      var data = new FormData();
      data.append('feature',this.files[0]);
      var xhr = new XMLHttpRequest;
      xhr.open('post','/admin/post-add.php');
      xhr.send(data);
      xhr.addEventListener('readystatechange',function(){
        if(this.readyState==4&&this.status==200){
          $(".preview").show().attr('src',xhr.responseText);
          $("#hd-feature").val(xhr.responseText);
          NProgress.done();
        }
      });
    });;
  </script>
</body>
</html>

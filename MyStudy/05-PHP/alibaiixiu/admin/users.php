<?php
  require '../function.php';
  checkLogin();

  $active = 'users';
  $actives = array();
  $message = '';
  $title = '添加用户';
  $btnText = '添加';
  $action = isset($_GET['action']) ? $_GET['action'] : 'add';
  if(!empty($_POST)){
    // add 添加操作
    if($action == 'add'){
      // 添加用户信息
      // 以post 提交数据
      // $status = NULL;  //赋值为null能够添加到数据库的原因是 在PHP中""会把null解析为一个空字符串
      $_POST['status'] = 'unactivated';
      $state = insert('users',$_POST);
      if($state){
        header('Location:/admin/users.php');
        exit;
      }else{
        $message = '添加用户失败';
      }
    } 
    // update修改操作
    if($action == 'update'){
      $id = $_POST['id'];
      // 从数组中删除id字段
      unset($_POST['id']);
      $result = update('users',$_POST,$id);
      if($result){
        header('Location:/admin/users.php');
        exit;
      }
    }
    // 批量删除
    if($action == 'deleteAll'){
      $sql = 'DELETE FROM users WHERE id IN('.implode(', ',$_POST['ids']).')';
      $result = delete($sql);
      // 设置响应头  jQuery能自动解析json格式数据
      header('Content-Type:application/json');
      if($result){
        $info = array('code'=>'1000','message'=>'批量删除成功');
        echo json_encode($info);
      }else{
        $info = array('code'=>'1001','message'=>'批量删除失败');
        echo json_encode($info);
      }
      exit;
    }
  }

  // 查询所有数据 并展示在table中
  $sql = 'SELECT * FROM users';
  $rows = query($sql);
  // print_r($rows);exit;

  // 编辑和删除操作
    if($action == 'edit'){
      $uid = $_GET['uid'];    
      // 执行编辑操作
      // 取出对应的一条数据
      $action = 'update';
      $title = '编辑用户';
      $btnText = '编辑';
      $sql = 'SELECT * FROM users WHERE id='.$uid;
      $list = query($sql);
    } else if($action == 'delete'){
      $uid = $_GET['uid'];    
      // 执行删除操作
      $sql = 'DELETE FROM users where id='.$uid;
      $result = delete($sql);
      if($result){
        header('Location:/admin/users.php');
        exit;
      }
    }

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
  <?php include './inc/head.php'; ?>
</head>
<body>
  <script>NProgress.start()</script>
  <div class="main">
    <?php include './inc/nav.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <?php if(!empty($message)) {?>
      <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $message; ?>
      </div>
      <?php } ?>
      <div class="row">
        <div class="col-md-4">
          <form action="/admin/users.php?action=<?php echo $action; ?>" method="post">
            <h2><?php echo $title ?></h2>
            <?php if($action!='add'){ ?>
              <input type="hidden"name="id" value="<?php echo $list[0]['id']; ?>">
            <?php } ?>
            <div class="form-group">
              <label for="email">邮箱</label>
              <input id="email" class="form-control" name="email" type="email" value="<?php echo isset($list[0]['email']) ? $list[0]['email'] :'';?>" placeholder="邮箱">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" value="<?php echo isset($list[0]['slug']) ? $list[0]['slug'] :'';?>" placeholder="slug">
              <p class="help-block">https://zce.me/author/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <label for="nickname">昵称</label>
              <input id="nickname" class="form-control" name="nickname" type="text" value="<?php echo isset($list[0]['nickname']) ? $list[0]['nickname'] :'';?>" placeholder="昵称">
            </div>
            <div class="form-group">
              <label for="password">密码</label>
              <input id="password" class="form-control" name="password" type="text" value="<?php echo isset($list[0]['password']) ? $list[0]['password'] :'';?>" placeholder="密码">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit"><?php echo $btnText; ?></button>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm delete" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                <th class="text-center" width="40"><input type="checkbox" class="checkeAll"></th>
                <th class="text-center" width="80">头像</th>
                <th>邮箱</th>
                <th>别名</th>
                <th>昵称</th>
                <th>状态</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($rows as $key => $val){ ?>
              <tr>
                <td class="text-center"><input type="checkbox" class="ckb" value="<?php echo $val['id']; ?>"></td>
                <td class="text-center"><img class="avatar" src="../assets/img/default.png"></td>
                <td><?php echo $val['email'] ?></td>
                <td><?php echo $val['slug']; ?></td>
                <td><?php echo $val['nickname']; ?></td>
                <?php if($val['status']=='activated'){?>
                <td>已激活</td>
                <?php } else if($val['status']=='unactivated'){ ?>
                <td>未激活</td>
                <?php } else if($val['status']=='forbidden') { ?>
                <td>已禁止</td>
                <?php } else { ?>
                <td>已删除</td>
                <?php } ?>
                <td class="text-center">
                  <a href="/admin/users.php?action=edit&uid=<?php echo $val['id']; ?>" class="btn btn-default btn-xs">编辑</a>
                  <a href="/admin/users.php?action=delete&uid=<?php echo $val['id']; ?>" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <?php } ?>
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php include './inc/aside.php'?>

  <?php include './inc/script.php' ?>

  <script>
    // 全选
    $(".checkeAll").on("click",function(){
      $(".ckb").prop("checked",this.checked);
      if(this.checked){
        $(".delete").show();
        return;
      }
      $(".delete").hide();
    });

    $(".ckb").on("click",function(){ 
      if($(".ckb:checked").size()>0){
        $(".delete").show();
        return;
      }
      $(".delete").hide();
    });

    // 使用ajax进行批量删除操作
    $(".delete").on("click",function(){
      // 获取所有被选中记录的id
      var ids = [];
      $(".ckb:checked").each(function(){
        ids.push($(this).val());
      });
       $.ajax({
        url:"/admin/users.php?action=deleteAll",
        type:'post',
        data:{ids:ids},
        success:function(info){
          alert(info['message']);
          if(info['code']=='1000'){
            location.reload();
          }
        }
      });
    });
   
  </script>
</body>
</html>

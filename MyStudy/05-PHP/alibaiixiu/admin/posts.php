<?php 
  require '../function.php';

  checkLogin();

  $actives = array('post-add','posts','categories','article');
  $active = 'posts';

  // 查询所有分类
  $sql = 'SELECT * FROM categories';
  $list = query($sql);

  // 分页
  $sql = 'SELECT COUNT(*) AS total FROM posts';
  $total = query($sql)[0]['total']; //文章条数
  $pageSize = 8;
  // 总页码数
  $pageCount = ceil($total/$pageSize);
  // 当前页
  $currentPage = isset($_GET['page'])?$_GET['page']:1;
  // 上一页
  $prevPage = $currentPage-1;
  // 下一页
  $nextPage = $currentPage+1;
  // 显示的页数
  $pageLimit = 6;
  // 计算页码的终点
  $end = $currentPage + floor($pageLimit/2);
  // 判断边界值
  $end = $end >= $pageCount ? $pageCount : $end;
  // 根据页码终点判断页码起始位置
  $start = $end - $pageLimit + 1;
  // 判断边界值
  $start = $start < 1 ? 1 : $start;
  // 生成页码
  $pages = range($start,$end);

  $offset = ($currentPage-1)*$pageSize;
  
  // 查询所有文章
  $sql = 'SELECT posts.id,posts.slug,posts.title,posts.created,posts.status,users.nickname,categories.name FROM posts LEFT JOIN users ON posts.user_id=users.id LEFT JOIN categories ON posts.category_id = categories.id LIMIT '.$offset.','.$pageSize;
  $lists = query($sql);

  // 删除
  $action = isset($_GET['action']) ? $_GET('action') : '';
  if($action == 'delete'){
    $sql = 'DELETE FROM posts WHERE id='.$_GET['pid'];   
    $result = delete($sql);
    if($result){
      header('Location:/admin/posts.php');
      exit;
    }
    $message = '删除失败';
  }

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <?php include './inc/head.php'; ?>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include './inc/nav.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="/admin/post-add.php" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <?php if(isset($message)){ ?>
      <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $message ?>
      </div>
      <?php } ?>
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
          <select name="" class="form-control input-sm">
            <option value="">所有分类</option>
            <?php foreach ($list as $key => $val) { ?>
            <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
          </select>
          <select name="" class="form-control input-sm">
            <option value="">所有状态</option>
            <option value="">草稿</option>
            <option value="">已发布</option>
          </select>
          <button class="btn btn-default btn-sm">筛选</button>
        </form>
        <ul class="pagination pagination-sm pull-right">
          <?php if($prevPage > 1){ ?>   
            <li><a href="/admin/posts.php?page=<?php echo $prevPage; ?>">上一页</a></li>
          <?php } ?>

          <?php foreach($pages as $key => $val){ ?>
            <?php if($val == $currentPage){ ?>
              <li class="active"><a href="/admin/posts.php?page=<?php echo $val; ?>"><?php echo $val ?></a></li>
            <?php }else{ ?>
              <li><a href="/admin/posts.php?page=<?php echo $val; ?>"><?php echo $val ?></a></li>
            <?php } ?>
          <?php } ?>

          <?php if($nextPage < $pageCount){ ?>
            <li><a href="/admin/posts.php?page=<?php echo $nextPage; ?>">下一页</a></li>
          <?php } ?>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($lists as $key => $val){ ?>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td><?php echo $val['title']; ?></td>
            <td><?php echo $val['nickname'];?></td>
            <td><?php echo $val['name']; ?></td>
            <td class="text-center"><?php echo $val['created']; ?></td>

            <?php if($val['status'] == 'published'){ ?>
              <td class="text-center">已发布</td>
            <?php }else{?>
              <td class="text-center">草稿</td>              
            <?php } ?>
            <td class="text-center">
              <a href="/admin/post-add.php?action=edit&pid=<?php echo $val['id']; ?>" class="btn btn-default btn-xs">编辑</a>
              <a href="/admin/posts.php?action=delete&pid=<?php echo $val['id']; ?>" class="btn btn-danger btn-xs">删除</a>
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

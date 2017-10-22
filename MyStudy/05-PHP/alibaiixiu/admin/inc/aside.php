

<div class="aside">
    <div class="profile">
      <?php if(isset($_SESSION['user_info']['avatar'])){ ?>
      <img class="avatar" src="<?php echo $_SESSION['user_info']['avatar']; ?>">
      <?php } else{ ?>
        <img class="avatar" src="/assets/img/default.png">
      <?php } ?>
      <h3 class="name"><?php echo $_SESSION['user_info']['nickname']; ?></h3>
    </div>
    <ul class="nav">
      <li <?php if($active == 'index'){ ?> class="active" <?php } ?> >
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li<?php if(in_array($active,$actives)&&in_array('article',$actives)){ ?> class="active" <?php } ?> >
        <a href="#menu-posts" class="collapsed" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
      <ul id="menu-posts" class="collapse <?php if(in_array($active,$actives)&&in_array('article',$actives)){?> in <?php } ?> ">
          <li <?php if($active == 'posts'){ ?>class="active"<?php } ?> ><a href="/admin/posts.php">所有文章</a></li>
          <li <?php if($active == 'post-add'){ ?>class="active"<?php } ?> ><a href="/admin/post-add.php">写文章</a></li>
          <li <?php if($active == 'categories'){ ?>class="active"<?php } ?> ><a href="/admin/categories.php">分类目录</a></li>
        </ul>
      </li>
      <li <?php if($active == 'comments'){ ?> class="active" <?php } ?> >
        <a href="/admin/comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li <?php if($active == 'users'){ ?> class="active" <?php } ?>  >
        <a href="/admin/users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li <?php if(in_array($active,$actives)&&in_array('set',$actives)){?> class="active"<?php } ?> >
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse <?php if(in_array($active,$actives)&&in_array('set',$actives)){ ?>in<?php }?>">
          <li <?php if($active == 'menus') {?> class = 'active'<?php } ?> ><a href="/admin/nav-menus.php">导航菜单</a></li>
          <li <?php if($active == 'slides'){ ?>class="active"<?php } ?> ><a href="/admin/slides.php">图片轮播</a></li>
          <li <?php if($active == 'settings'){ ?>class="active" <?php } ?> ><a href="/admin/settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>
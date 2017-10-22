<?php 

    $sql = 'SELECT `value` FROM options WHERE `key`="nav_menus"';
    $json = query($sql)[0]['value'];
    $list = json_decode($json,true);
    
?>

<div class="header">
      <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
        <?php foreach($list as $key => $val){ ?>
        <li><a href="javascript:;"><i class="<?php if(isset($val['icon'])){ echo $val['icon']; } ?>"></i><?php echo $val['text'] ?></a></li>
        <?php } ?>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>
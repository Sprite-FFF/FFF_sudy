<?php
    // 导入配置文件
    require __DIR__.'/config.php';
    /* 
     *封装验证登录状态
    */
    function checkLogin(){
        session_start();
        // 如果查不到session
        // 则认为未登录
        // 跳转回登陆页面
        if(!isset($_SESSION['user_info'])){
          header("Location:/admin/login.php");
          exit;
        }
    }
    /* 
     *封装连接数据库操作
    */
    function connect(){
        // @符号可以屏蔽错误！不让错误提示在页面输出
        $connection =  @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
        if(!$connection){
            die('数据库连接失败！');
        }
        // 选择数据库
        mysqli_select_db($connection,DB_NAME);
        // 设置字符集
        mysqli_set_charset($connection,'utf8');
        // 错误原因 ：在查找之前return了
        // 所以没有查到数据
        return $connection;
    }
    /* 
     *封装查询数据库
    */
    function query($sql){
        // 连接数据库
       $connection = connect();
       //获取查询结果集    
       $result = mysqli_query($connection,$sql);
       $rows = fetch($result);
       return $rows;
    }
    /* 
     *封装插入操作
    */
    function insert($table,$arr){
        $connection = connect();
        // 封装格式化sql语句
        $keys = array_keys($arr);
        $vals = array_values($arr);
        // 错误：字符串拼接有问题 
        $sql = "INSERT INTO ". $table ."(".implode(", ",$keys).") VALUES('".implode("', '",$vals)."')";
        return mysqli_query($connection,$sql);
    }

    /* 
     *封装删除操作
    */
    function delete($sql){
        $connection = connect();
        return mysqli_query($connection,$sql);
    }

    /* 
     *封装修改操作
    */
    function update($table,$arr,$id){
        $connection = connect();
        $str = "UPDATE ".$table." SET ";
        foreach($arr as $key => $val){
          $str.=$key . "=" . "'".$val."', ";
        }
        $str = substr($str,0,-2);
        $sql = $str." WHERE id=".$id;
        // 错误原因：在此处调用了query()函数
        return mysqli_query($connection,$sql);
    }

    /* 
     *封装fetch将结果集转换为数组
    */
    function fetch($result){
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

?>
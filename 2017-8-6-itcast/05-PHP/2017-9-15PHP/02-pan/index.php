<?php
    //  包含外部文件（磁盘信息）
    $diskInfo = include './disk.php';
    
    // isset判断这个变量是否存在
    // 如果存在则使用get过来的数据
    // 如果不存在返回D:盘
    $dir = isset($_GET['name'])?$_GET['name']:DISK;

    // 定义一个函数遍历父级文件夹
    function finddir($dir){
        // 定义一个静态数组去保存遍历的父级dir
        static $parents = array();
        $pars = dirname($dir);
        $parents[] = $pars;
        // 递归去查找父级文件夹
        // 查找到顶级文件夹就返回
        if($pars != DISK){
            finddir($pars);
        }
        return $parents;
    }

    // 面包导航

    // 将数组顺序反转
    $breadcrumb = array_reverse(finddir($dir));
    // print_r($breadcrumb);

    // 定义函数遍历目录 
     function scan_dir($dir){
        //判断逻辑时将utf-8专成gbk
        $dir = iconv('utf-8','gbk',$dir);
        // 检测传过来的是否为目录
        if(!is_dir($dir)){
            return;
        }

        // 想要在局部使用去全局变量
        // 需要global关键字声明
        // global $breadcrumb;
        // 获取请求的目录下的所有目录和文件
        $rows = scandir($dir);
        // 定义一个数组存储所有文件和目录信息
        $lists = array();
        // 遍历获取的目录和文件
        foreach($rows as $key => $val){
            // .和..不是有意义的目录
            if($val=='.' || $val=='..'){
                continue;
            }
            // 给获取的文件加上真实的路径
            $path = $dir . '/' . $val;
            // 定义一个数组临时存储每个文件或目录的信息
            $temp = array();
            // 存储目录或文件名
            $temp['name'] = iconv('gbk','utf-8',$val);
            // 存储修改时间
            $temp['mtime'] = date('Y-m-d',filemtime($path));
            // 存储绝对路径   ？$path其实就已经是绝对路径
            $temp['realpath'] = iconv('gbk','utf-8',$path);
            // 标识符  标识是否是目录 默认为true
            $temp['flag'] = true;
            //文件或目录类型
            $temp['type'] = 'folder';
            //直接父级文件夹
            // $temp['parent'] = dirname($path);
            // 如果是文件，则存储文件大小
            if(is_file($path)){
                $temp['size'] = filesize($path);
                // 如果不是目录标识为false
                $temp['flag'] = false;
                $temp['type'] = isset(pathinfo($path)['extension'])?pathinfo($path)['extension']:'';
            }
            // 如果是目录、不获取大小
            if(is_dir($path)){
                $temp['size'] = '-';
            }

            // 将临时数组的内容存入list
            $lists[] = $temp;
        }
        return $lists;
     }

     $items = scan_dir($dir);
    //  print_r($items['parent']);
    include_once './views/index.html';
?>
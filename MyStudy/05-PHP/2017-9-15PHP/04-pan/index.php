<?php
    // 
    $diskInfo = include './disk.php';
    // print_r($diskInfo);

    // 声明一个函数遍历文件夹

    function scan_dir ($dir){
        // 判断逻辑时将utf-8转成GBK
        $dir = iconv('utf8','gbk',$dir);

        if(!is_dir($dir)){
            return;
        }

        $rows = scandir($dir);
        $list = array();
        foreach ($rows as $key => $val) {
            if($val == '.'||$val == '..'){
                continue;
            }
            // 拼接一个完整的文件路径
            $path = $dir .'/'.$val;
            // 定义一个临时数组储存文件和文件夹信息
            $temp = array();
            // 文件和文件夹名  
            // iconv()解决乱码问题
            $temp['name'] = iconv('gbk','utf-8',$val);
            // 文件大小
            $temp['size'] = '-';
            // 文件修改时间
            $temp['mtime'] = date('Y-m-d',filemtime($path));
            // 文件绝对路径
            $temp['realpath'] = $path;
            if(is_file($path)){
                // 如果是文件则获取大小
                $temp['size'] = filesize($path);
            }
            // 将文件信息存在list数组中
            $list[] = $temp;
        }
        return $list;
    }

    $dir_data = scan_dir(DISK);
    // print_r($dirdata);
    // 文件包含
    include './views/index.html';
?>
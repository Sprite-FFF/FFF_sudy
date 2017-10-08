<?php
    // 需求根据目录查找子目录及文件
    // 判断目录和文件、获得修改时间
    // 如果是文件、获取文件大小

    $dir_arr = array();
    function myscandir($dir){
        // 检测传入的是否为正确目录
        if(!is_dir($dir)){
            return;
        }
        // 获取目录下的所有目录及子文件
        $rows = scandir($dir);
        // print_r($rows);

        
        foreach($rows as $key => $val){
            // .和.. 文件夹无意义
            if($val == '.'||$val == '..'){
                continue;
            }
            // 拼接一个真实路径
            $path = $dir .'/'. $val;
            // 将数组内的每一个文件夹或文件获取详细信息然后以数组形式
            // 存入另一个数组

            // 创建一个临时数组遍历数据存入临时数组
            $temp = array();
            $temp['name'] = $val;
            $temp['mtime'] = date('Y-m-d',filemtime($path));
            if(is_file($path)){
                $temp['size'] = filesize($path);
            }
            if(is_dir($path)){
                $temp['size'] = '-';
            }

            $dir_arr[]=$temp;
        }
        return $dir_arr;
    }

    print_r(myscandir(__DIR__));
?>
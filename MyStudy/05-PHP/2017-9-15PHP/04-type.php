<?php
    $path = './04-pan';
    // 查找pan下所有分类（图片，css、js）

    // 记录下文档类型
    
    function findtype($dir,$type){
        $types = array(
            'pic'=>array('jpg','png','gif','ico'),
            'doc'=>array('doc','docx','xls','xlsx','ppt','pptx'),
        );
        // global $types;
        // 先遍历文件夹
        $dir = iconv('utf-8','gbk',$dir);
        if(!is_dir($dir)){
            return;
        }
        static $list = array();
        $rows = scandir($dir);
        foreach ($rows as $key => $val) {
            if($val == '.'||$val == '..'){
                continue;
            }
            $val = iconv('utf-8','gbk',$val);
            $path = $dir .'/'.$val;
            $temp = array();
            if(is_file($path)){
                $ext = pathinfo($path)['extension'];
                // in_array() 
                // 检测数组中是否包含某个值
                if(in_array($ext,$types[$type])){
                    $temp['name'] = basename($path);
                    $temp['size'] = filesize($path);
                    $temp['mtime'] = date('Y-m-d',filemtime($path));
                    $temp['type'] = $ext;
                    $list[] = $temp;
                }
            }
            if(is_dir($path)){
                findtype($path,$type);
            }
        }
        return $list;
    }

    print_r(findtype($path,'pic'));
?>
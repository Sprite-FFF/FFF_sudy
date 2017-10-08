<?php
    $diskInfo = include './disk.php';

    $type = $_GET['type'];
    function findtype($dir,$type){
        // 将文件类型以及后缀存放在一个数组里
        $types = array(
            'pic'=>array('jpg','png','gif','ico'),
            'doc'=>array('doc','docx','xls','xlsx','ppt','pptx'),
            'video'=>array('mp4','rmvb','avi','itcast'),
            'audio'=>array('mp3','wav'),
            'bt'=>array('torrent'),
            'extra'=>array('php','js','css','html')
        );
        // global $types;
        // 先遍历文件夹
        // $dir = iconv('utf-8','gbk',$dir);
        if(!is_dir($dir)){
            return;
        }
        static $list = array();
        $rows = scandir($dir);
        foreach ($rows as $key => $val) {
            if($val == '.'||$val == '..'){
                continue;
            }
            // $val = iconv('utf-8','gbk',$val);
            $path = $dir .'/'.$val;
            $temp = array();
            if(is_file($path)){
                // 如果文件有后缀名则保存
                // 没有后缀名为空
                $ext = isset(pathinfo($path)['extension'])?pathinfo($path)['extension']:'';
                // in_array() 
                // 检测数组中是否包含某个值
                // 搜索缀在不在之前数组中存在
                if(in_array($ext,$types[$type])){
                    $temp['name'] = iconv('gbk','utf-8',basename($path));
                    $temp['size'] = filesize($path);
                    $temp['mtime'] = date('Y-m-d',filemtime($path));
                    $temp['type'] = $ext;
                    $temp['realpath'] = iconv('gbk','utf-8',$path);
                    $list[] = $temp;
                }
            }
            // 如果是一个文件夹
            // 递归继续查找
            if(is_dir($path)){
                findtype($path,$type);
            }
        }
        return $list;
    }

    $data = findtype('D:/www/',$type);
    // print_r($data);
    if($type=='pic'){
        include_once './views/type.html';
    }else {
        include_once'./views/type2.html';
    }
    
?>
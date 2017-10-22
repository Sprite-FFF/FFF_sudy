<?php
    // 设置响应头
    header('Content-type:application/json'); 
    $list = array(
        array('name'=>'姑获鸟','attr'=>'SR','gender'=>'女','skill'=>'天翔鹤斩'),
        array('name'=>'花鸟卷','attr'=>'SSR','gender'=>'女','skill'=>'花鸟相闻'),
        array('name'=>'茨木童子','attr'=>'SSR','gender'=>'男','skill'=>'地狱之手'),
        array('name'=>'椒图','attr'=>'R','gender'=>'女','skill'=>'涓流'),
        array('name'=>'莹草','attr'=>'R','gender'=>'爹','skill'=>'叮~'),
        array('name'=>'河童','attr'=>'R','gender'=>'男','skill'=>'大河之歌'),
        array('name'=>'蝴蝶精','attr'=>'R','gender'=>'女','skill'=>'翩翩起舞'),
        array('name'=>'山兔','attr'=>'R','gender'=>'女','skill'=>'兔子舞')
    );
    
    echo json_encode($list);
?>
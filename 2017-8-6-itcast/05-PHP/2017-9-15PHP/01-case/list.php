<?php

    $res = fopen('./users.txt','r');

    $rows = array();
    while ($row = fgets($res)) {
        // php中有与array_push类似的简单操作
        $rows[] = $row;
    }

    fclose($res);
    // print_r($rows);
    $data = array();
    foreach ($rows as $key => $val){
        $list = explode(' ',$val);
        array_pop($list); 
        array_push($data,$list);
    }
    print_r($data);

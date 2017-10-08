<?php
    // 要操作文件    需要几个步骤

    // 1.打开文件
    // 使用fopen打开文件后，其返回值为资源ID
    //  
    // 打开文件时 可以指定以某种模式打开
    // 大致有以下几种模式
    // 1、只读模式   r
    // 2、读写模式   r+  (写的时候会覆盖原来的部分，从头开始)
    // 3、只写模式   w
    // 4、读写模式   w+  (当以w或者w+模式打开时，会清空原文件内容、并将指针指向文件开始)
    // rewind() 重置指针 
    // 5、追加模式   a
    // 6、追加模式   a+   
    // 后四种 如果文件不存在 则自动创建
   $res =  fopen('../pan/demo.txt','r');
   $res1 =  fopen('../pan/demo.css','r');


    // 2.根据资源id对文件进行操作
    // 读取 

    echo fread($res,4);
    echo fread($res1,4);
    // 写入

    fwrite($res,'☆☆☆☆☆');
    fwrite($res1,'body{}');

    // 3.释放资源(关闭文件)
    
    fclose($res);
    fclose($res1);

        

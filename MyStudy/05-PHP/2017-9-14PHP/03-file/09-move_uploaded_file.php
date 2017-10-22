<?php

    print_r($_FILES);
 

    // 数组中 tmp_name单元时文件被上传后的临时目录
    // 默认在C盘下、可以通过php配置文件更改

    // php下先将文件放到某个临时目录(php配置文件设定)
    // 然后有开发者将上传上来的文件转移到具体的目录中
    // 通过move_uploaded_file来实现

    // 进行文件转移时，保存的目录必须存在
    // 保存必须是完整的文件名
    move_uploaded_file($_FILES['file']['tmp_name'],'./pan/111.jpg');




    // sleep(5);
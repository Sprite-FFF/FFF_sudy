<?php
    //服务端代理解决跨域 
    //通过服务器去访问跨域资源
    echo file_get_contents('http://test.com/cors.php');
?>
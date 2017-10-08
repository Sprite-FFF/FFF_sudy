<?php 
    echo json_encode($_FILES);
    move_uploaded_file($_FILES['file']['tmp_name'],'./dog.jpg');
?>
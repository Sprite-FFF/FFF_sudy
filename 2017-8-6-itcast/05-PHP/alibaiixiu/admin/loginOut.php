<?php
    session_start();
    // $_SESSION['user_info'] = null;
    unset($_SESSION['user_info']);
    header('Location:/admin/login.php');
?>
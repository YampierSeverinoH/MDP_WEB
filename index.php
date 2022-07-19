<?php
session_start();
session_destroy();

if($_SERVER['HTTP_REFERER']==''){
    header('Location: /public/php/Login.php');
}else{
    header("Location: /public/php/Login.php?e=3");
}
?>

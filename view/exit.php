<?php
session_start();
$_SESSION['lxwuserid']='';
session_destroy();
header("Location:index.php");

?>
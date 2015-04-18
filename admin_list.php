<?php
session_start();
if(@isset($_SESSION['lxwuserid'])){
    $adminid = $_SESSION['lxwuserid'];

	require_once 'SqlTools.php';
    
    $sqlTools = new SqlTools();
    $sql = "select `id`,`username`,`truename`,`gender`,`remark` from lxw_admin where `is_supper`<>1";
    $res = $sqlTools->execute_dql($sql);
    $admins = array();
    while($row = mysql_fetch_array($res)){
    	$admins[] = $row;
    }
    require_once 'smarty4hiyi.php';
    $smarty->assign("admins",$admins);
    $smarty->display("admin_list.tpl");
}else{
	header("Location:index.php");
}

?>
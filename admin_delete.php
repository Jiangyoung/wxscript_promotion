<?php
session_start();
if(@isset($_SESSION['lxwuserid'])){
    $userid = $_SESSION['lxwuserid'];

	require_once 'SqlTools.php';
    
    $sqlTools = new SqlTools();
    
    $sql = "select is_supper from lxw_admin where id=$userid";

    $res = $sqlTools->execute_dql($sql);

    $row = mysql_fetch_row($res);

    $user_is_supper = $row[0];
    if($user_is_supper == 1){

    	$adminid = $_GET['adminid'];	
	    if($adminid = intval($adminid)){
	        $sql = "delete from lxw_admin where id=$adminid";
	        $res = $sqlTools->execute_dml($sql);        
	    }
    }
	
}
    header("Location:admin_list.php");
?>
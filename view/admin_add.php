<?php
session_start();
if(@isset($_SESSION['lxwuserid'])){
if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
    $userid = $_SESSION['lxwuserid'];

	require_once 'SqlTools.php';
    
    $sqlTools = new SqlTools();
    
    $sql = "select is_supper from lxw_admin where id=$userid";

    $res = $sqlTools->execute_dql($sql);

    $row = mysql_fetch_row($res);

    $user_is_supper = $row[0];

    if($user_is_supper == 1){
    	$username = addslashes($_POST['username']);
    	$truename = addslashes($_POST['truename']);
    	$gender = addslashes($_POST['gender']);
    	$password = addslashes($_POST['password']);
    	$password2 = addslashes($_POST['password2']);
    	if($password != $password2 || empty($username)){
    		echo "error!";
    		exit(0);
    	}
    	$remark = addslashes($_POST['remark']);
    	$sql = "INSERT INTO lxw_admin(`username`,`truename`,`gender`,`password`,`remark`) VALUES('%s','%s','%s',SHA1('%s'),'%s')";
    	$sql = sprintf($sql,$username,$truename,$gender,$password,$remark);
    	$res = $sqlTools->execute_dml($sql);
	    if($res != 1){
	    	echo "error!";
	    	exit(0);
	    }
	    header("Location:admin_list.php");
    }
}else{
	require_once 'tplConf.php';
	$view->display("admin_add.php");
}
}else{
	header("Location:index.php");
}

?>
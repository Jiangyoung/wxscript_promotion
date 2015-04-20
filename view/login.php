<?php
if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);

	require_once 'SqlTools.php';
	$sqlTools = new SqlTools();
	$sql = "select `id`,`password` from lxw_admin where `username`='".$username."' limit 0,1";
	$res = $sqlTools->execute_dql($sql);
	if($row = mysql_fetch_row($res)){
		if($row[1] == sha1($password)){
			session_start();
			$_SESSION['lxwuserid'] = $row[0];
			echo "login...";
		}else{
			echo "ERROR Incorrect username or password!";
		}
	}else{
		echo "The account doesn't exist!";
	}
	echo '<meta http-equiv="refresh" content="1;url=index.php" />';
	//header("Refresh:1;url=index.php");
}else{
	require_once "tplConf.php";
	$view->display("login.php");
}
?>
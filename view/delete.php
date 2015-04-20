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

    	$id = $_GET['id'];
    	
        if($id = intval($id)){
            
            $sql1 = "delete from lxw_grantrecord where id=$id";
            $sql2 = "delete from lxw_followers where grantid=$id";
            if($user_is_supper != 1){
                $sql1 .= " and adminid=$userid";
                $sql2 .= " and adminid=$userid";
            }
            $res = $sqlTools->execute_dml($sql1);
            $res = $sqlTools->execute_dml($sql2);

            
        }
    }
    header("Location:index.php");
?>
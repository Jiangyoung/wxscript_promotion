<?php

require_once 'SqlTools.php';

require_once 'tplConf.php';

$sqlTools = new SqlTools();

session_start();
$user = array('userid'=>'','username'=>'','truename'=>'','remark'=>'','is_supper'=>'');
if(@isset($_SESSION['lxwuserid'])){
    $userid = $_SESSION['lxwuserid'];
    $sql = "select `id`,`username`,`truename`,`remark`,`is_supper` from lxw_admin where `id`=$userid limit 0,1";
    $res = $sqlTools->execute_dql($sql);
    if($row = mysql_fetch_row($res)){
        $user['userid'] = $row[0];
        $user['username'] = $row[1];
        $user['truename'] = $row[2];
        $user['remark'] = $row[3];
        $user['is_supper'] = $row[4];
    }
}

$sql = "select * from lxw_grantrecord";
$sql2 = "SELECT SUM(achievement) as sumachievement,SUM(pureachieve) as sumpureachieve FROM lxw_grantrecord";
$ggroup='';
if(@addslashes($_GET['ggroup'])){
    $ggroup = htmlspecialchars($_GET['ggroup'],ENT_QUOTES);
    $sql .= " where ggroup ='".$ggroup."'";
    $sql2 .= " where ggroup ='".$ggroup."'";
}
if(!empty($user['userid'])){
    if($user['is_supper']!=1){
        if(@addslashes($_GET['ggroup'])){
            $sql .= " and adminid=$userid";
            $sql2 .= " and adminid=$userid";
        }else{
            $sql .= " where adminid=$userid";
            $sql2 .= " where adminid=$userid";
        }
        
    }    
}
$sql .= " order by id DESC";

$res = $sqlTools->execute_dql($sql);
$rows = array();
while($row = mysql_fetch_row($res)){
    $rows[] = $row;    
}
$res = $sqlTools->execute_dql($sql2);
$achievementcount['achievement'] = 0;
$achievementcount['pureachieve'] = 0;
$row = mysql_fetch_row($res);
$achievementcount['achievement'] = $row[0];
$achievementcount['pureachieve'] = $row[1];



$sql = "SELECT DISTINCT ggroup FROM lxw_grantrecord";
$res = $sqlTools->execute_dql($sql);
$options = array();
while($option = mysql_fetch_row($res)){
    $options[] = $option[0];    
}
mysql_free_result($res);
mysql_close();
$view->assign("lxwuser",$user);
$view->assign("groupname",$ggroup);
$view->assign("achievementcount",$achievementcount);
$view->assign("options",$options);
$view->assign("list",$rows);
$view->display("index.php");
                
?>

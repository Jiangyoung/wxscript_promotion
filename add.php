<?php
session_start();
if(@isset($_SESSION['lxwuserid'])){
if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
    
    require_once 'configs.php';
    
    function https_post($url,$data=''){
    	$curl = curl_init();
    	curl_setopt($curl,CURLOPT_URL,$url);
    	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
    	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
    	if(!empty($data)){
    		curl_setopt($curl,CURLOPT_POST,1);
    		curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
    	}
    	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    	$output = curl_exec($curl);
    	curl_close($curl);
    	return $output;
	}
    
    $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
    $gender = htmlspecialchars($_POST['gender'],ENT_QUOTES);
    $remark = htmlspecialchars($_POST['remark'],ENT_QUOTES);
    $ggroup = htmlspecialchars($_POST['ggroup'],ENT_QUOTES);
    if(!($adminid = intval($_SESSION['lxwuserid']))){exit(0);echo "error!";}
    
    require_once 'SqlTools.php';
    
    $sqlTools = new SqlTools();
    /**
     *序号
    $sql = "SELECT MAX(sequence) FROM lxw_grantrecord";

    $res = $sqlTools->execute_dql($sql);

    if($row=mysql_fetch_row($res)){
        $sequence = 1;
    }else{
        $sequence = $row[0]+1;
    }
    $sql = "insert into lxw_grantrecord(`name`,`gender`,`achievement`,`pureachieve`,`ggroup`,`remark`,sequence) values('%s','%s','0','0','%s','%s','%d')";
    $sql = sprintf($sql,$name,$gender,$ggroup,$remark,$sequence);
    */

    $sql = "insert into lxw_grantrecord(`name`,`gender`,`achievement`,`pureachieve`,`ggroup`,`remark`,`adminid`) values('%s','%s','0','0','%s','%s','%d')";
    $sql = sprintf($sql,$name,$gender,$ggroup,$remark,$adminid);
    $res = $sqlTools->execute_dml($sql);
    
    if($res != 1){
    exit(0);
    }
    
    $getaccesstokenurl = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
    
    $access_tokenJSON = https_post($getaccesstokenurl);
    
    $access_tokenOBJ = json_decode($access_tokenJSON);
    
    $access_token = $access_tokenOBJ->access_token;
    
    $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$access_token;
    
    $sql = "select id from lxw_grantrecord  order by id DESC limit 0,1";
    
    $res = $sqlTools->execute_dql($sql);
    
    $row = mysql_fetch_row($res);
    $id = $row[0];
    mysql_free_result($res);
    $scene_id = $id;
    $data = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": '.$scene_id.'}}}';
    $result = https_post($url,$data);
    $jsoninfo = json_decode($result,true);
    $ticket = $jsoninfo["ticket"];
        
    $resulturl = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
    
    $sql = "update lxw_grantrecord set `qrpath`='".$resulturl."' where `id`=$id";
    
    $res = $sqlTools->execute_dml($sql);
    
    if($res != 1){
    exit(0);
    }
    
    header("Location:index.php");
}else{
    require_once "smarty4hiyi.php";
    $smarty->display("add.tpl");
}
}else{
    header("Location:index.php");
}
?>

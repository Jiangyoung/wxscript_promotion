<?php

require_once 'configs.php';
require_once 'ResponseMsg.php';
$text = (isset($defaultResponseText))?$defaultResponseText:'666';
//http://ishop.wellgoshop.com/reswechat/index/3883.html
$wechatObj = new wechatCallbackapiTest();
$wechatObj->setResponseText($text);
//接入验证
if(isset($isValid) && $isValid)$wechatObj->valid();
$wechatObj->receiveEvent();
//$wechatObj->responseMsg();

class wechatCallbackapiTest
{
    private $responseText = '';

    public function setResponseText($text){
        $this->responseText = $text;
    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($echoStr && $this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

    public function receiveEvent()
    {
	//get post data, May be due to the different environments
	$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
	if (!empty($postStr)){
        /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
           the best way is to check the validity of xml by yourself */
        libxml_disable_entity_loader(true);
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        $contentStr="";
        
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
		$msgType = "text";
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        </xml>";
        $responsemsg = new ResponseMsg();

        require_once 'SqlTools.php';

        $sqlTools = new SqlTools();
        
        switch(strtolower($postObj->Event)){
            //关注事件
            case "subscribe":
                      
                if (isset($postObj->EventKey)){
                    $id = substr($postObj->EventKey,strripos($postObj->EventKey,"_")+1);
                    //查找是否之前关注过                  
                    $sql = "select grantid from lxw_followers where `openid`='".$postObj->FromUserName."' limit 0,1";
                    
                    $res = $sqlTools->execute_dql($sql);  
                    
                    if($row=mysql_fetch_row($res)){
                        //关注过的人再次关注只增加净关注量
                        $id = $row[0];
                        $sql1 = "update lxw_grantrecord set pureachieve=`pureachieve`+1 where id=$id";                            
                     
                        $res = $sqlTools->execute_dml($sql1);
                    }else{
                        //新人关注
                        $sql1 = "update lxw_grantrecord set `achievement`=`achievement`+1,`pureachieve`=`pureachieve`+1 where id=$id";
                        //把新人填到已关注过的人里
                        $sql2 = "insert ignore into lxw_followers(`openid`,`grantid`,`createdate`,`createtime`) values('%s','%d',NOW(),NOW())";
                        $sql2 = sprintf($sql2,$postObj->FromUserName,intval($id));
                        $res = $sqlTools->execute_dml($sql1);    
                        $res = $sqlTools->execute_dml($sql2);     

                    }
                    $responsemsg->sendTextMsg($fromUsername,$this->responseText);
                    mysql_free_result($res);
                }
                
            break;
            case "SCAN":
                //$contentStr = "亲！您好！感谢您专注佬香翁，佬香翁红薯研发和生产健康的红薯美味，为您的生活送去更多健康和快乐。";
                //要实现统计分析，则需要扫描事件写入数据库，这里可以记录 EventKey及用户OpenID，扫描时间
            break;
            //取消关注事件
            case "unsubscribe":
            	$openid = $postObj->FromUserName;
            	$sql = "select grantid from lxw_followers where openid='".$postObj->FromUserName."' limit 0,1";
                    
                $res = $sqlTools->execute_dql($sql);
                if($row=mysql_fetch_row($res)){
                    //$sql1 = "delete from lxw_followers where openid='".$postObj->FromUserName."'";
                    //取消关注其对应的推广人员的净关注量-1
                    $sql2 = "update lxw_grantrecord set `pureachieve`=`pureachieve`-1 where id=".$row[0];
                    
                	$res = $sqlTools->execute_dql($sql2);
                }
            break;
            //菜单的点击事件
            case "click":
                //这里写对应菜单点击操作
            break;
    	    default:
            break;   
        
        }
              
        if(!empty( $keyword ))
        {
            $responsemsg->sendTextMsg($fromUsername,$this->responseText);
        }else{
            echo "Input something...";
        }

    }else {
    	echo "";
    	exit;
    }
}
		
}


?>

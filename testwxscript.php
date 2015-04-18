<?php

define("TOKEN","wxdevesinaappwxscript");
define("APPID","wx5e643cb403cf75ab");
define("APPSECRET","00f94bfe72c04918cc03911656162238");

//http://ishop.wellgoshop.com/reswechat/index/3883.html
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
//$wechatObj->receiveEvent();
$wechatObj->responseMsg();

class wechatCallbackapiTest
{
    private $fromUsername;
    private $toUsername;
    private $keyword;
    private $time;
    public function responseTextMsg($contentStr)
    {
    //文本消息
    $textTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[%s]]></Content>
                </xml>";
    $resultStr = sprintf($textTpl,$this->fromUsername,$this->toUsername,$this->time,$contentStr);
    echo $resultStr;
    }
    public function responseImageMsg($imagepath)
    {
    //图片消息
    $imageTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[image]]></MsgType>
                <Image>
                <MediaId><![CDATA[%s]]></MediaId>
                </Image>
                </xml>";
    $resultStr = sprintf($imageTpl,$this->fromUsername,$this->toUsername,$this->time,$imagepath);
    echo $resultStr;
    }
    public function responseNewsMsg($articles)
    {
        //图文消息
        $newsTpl = "<xml>
                   <ToUserName><![CDATA[%s]]></ToUserName>
                   <FromUserName><![CDATA[%s]]></FromUserName>
                   <CreateTime>%s</CreateTime>
                   <MsgType><![CDATA[news]]></MsgType>
                   <ArticleCount>%s</ArticleCount>
                   <Articles>%s</Articles>
                   </xml> ";
        $articleTpl = "<item>
                   <Title><![CDATA[%s]]></Title> 
                   <Description><![CDATA[%s]]></Description>
                   <PicUrl><![CDATA[%s]]></PicUrl>
                   <Url><![CDATA[%s]]></Url>
                   </item>";
        $i = 0;
        $resultArticles = "";
        while($i<count($articles)){
            $resultArticles .=  sprintf($articleTpl,$articles[i]['title'],$articles[i]['description'],$articles[i]['picurl'],$articles[i]['url']);
            $i++;
        }
        $resultStr = sprintf($newsTpl,$this->fromUsername,$this->toUsername,$this->time,$i,$resultArticles);
        
        echo $resultStr;
    }

	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */

                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $this->fromUsername = $postObj->FromUserName;
                $this->toUsername = $postObj->ToUserName;
                $this->keyword = trim($postObj->Content);
                $this->time = time();

				if(!empty( $this->keyword ))
                {
                    
              		//$msgType = "text";
                	//$contentStr = "亲！您好！感谢您专注佬香翁，佬香翁红薯研发和生产健康的红薯美味，为您的生活送去更多健康和快乐。";
                	$articles = array();
                    $article = array();
                    $article['title'] = "title";//"金秋十月 · 全城一起挖红薯";
                    $article['description'] = 'description';//'金秋十月 · 全城一起挖红薯秋天，听说红薯熟了挖红薯 · 挖多少人就没迈出过城市的门，一直就在“城市”里面';
                    $article['picurl'] = "https://mmbiz.qlogo.cn/mmbiz/hm3bPSYt8EKNxL8LVnN0kibsrPjpSNmUsTg4f1sPUIz2xl9njSmU5EGiczMNJPXHGNnO4yJpic68rSvkdI8x5IeDA/0";
                    $article['url'] = "http://mp.weixin.qq.com/s?__biz=MjM5MDU5NTAzNQ==&mid=200591055&idx=1&sn=12b1320be587f6c09a4c47e22e682b94#rd";
                    $articles[] = $article;
                    $this->responseNewsMsg($articles);
                    
                    //$this->responseTextMsg("ssssss");
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
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
            
            require_once 'SqlTools.php';
    
            $sqlTools = new SqlTools();
            
            switch($postObj->Event){
                //关注事件
                case "subscribe":
                    $contentStr = "亲！您好！感谢您专注佬香翁，佬香翁红薯研发和生产健康的红薯美味，为您的生活送去更多健康和快乐。";
                    if (isset($postObj->EventKey)){
                        $id = substr($postObj->EventKey,strripos($postObj->EventKey,"_")+1);
                        //查找是否之前关注过                  
                        $sql = "select grantid from lxw_followers where `openid`='".$postObj->FromUserName."' limit 0,1";
                        
                        $res = $sqlTools->execute_dql($sql);  
                        
                        if($row=mysql_fetch_row($res)){
                            //$contentStr = "欢迎再次关注！";
                            //关注过的人再次关注只增加净关注量
                            $sql1 = "update lxw_grantrecord set pureachieve=`pureachieve`+1 where id=$row[0]";                            
                         
                            $res = $sqlTools->execute_dml($sql1);
                            
                        }else{
                            //新人关注
                            $sql1 = "update lxw_grantrecord set `achievement`=`achievement`+1,`pureachieve`=`pureachieve`+1 where id=$id";
                            //把新人填到已关注过的人里
                            $sql2 = "insert into lxw_followers values('".$postObj->FromUserName."','".$id."')";
                            
                            $res = $sqlTools->execute_dml($sql1);    
                            $res = $sqlTools->execute_dml($sql2); 
                            
                            //$contentStr = "感谢关注";
                        }
                        mysql_free_result($res);
                    }
                break;
                case "SCAN":
                    $contentStr = "亲！您好！感谢您专注佬香翁，佬香翁红薯研发和生产健康的红薯美味，为您的生活送去更多健康和快乐。";
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
                case "click":
                    switch($postObj->EventKey){



                //线下活动
                case "privilege_offline_activity":

                break;


                //健康之旅
                case "privilege_health_tour":
                break;

                //佬香翁烤红薯
                case "potatos_roast_sweetpotato":
                break;              

                //休闲薯美味
                case "potatos_relaxation_delicious":
                break;             

                //健康薯饮
                case "potatos_health_drink":
                break;          
            
                //精品礼盒
                case "potatos_the_packing":
                break;            
            
                //佬香翁
                case "diary_lxw":
                break;       
            
                //红薯之家
                case "diary_family":
                break;
                default:
                break;
                }
                break;
                default:
                break;   
            
            }

            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";             
            if(!empty( $contentStr ))
            {
            $msgType = "text";
            //$contentStr = "亲！您好！感谢您专注佬香翁，佬香翁红薯研发和生产健康的红薯美味，为您的生活送去更多健康和快乐。";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
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
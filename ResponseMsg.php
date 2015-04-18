<?php
/**
 *
 */
class ResponseMsg{
	private $access_token;
	private $sendMsgUrl;
	function __construct(){
		require_once 'configs.php';

	    $getaccesstokenurl = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
	    
	    $access_tokenJSON = $this->https_post($getaccesstokenurl);
	    
	    $access_tokenOBJ = json_decode($access_tokenJSON);
	    
	    $this->access_token = $access_tokenOBJ->access_token;

	    $this->sendMsgUrl  = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$this->access_token;
	}
	private function https_post($url,$data=''){
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
	function sendTextMsg($openid,$data)
	{
		$textDataTpl = '{
		    "touser":"%s",
		    "msgtype":"text",
		    "text":
		    {
		         "content":"%s"
		    }
		}';
		$data = sprintf($textDataTpl,$openid,addslashes($data));
		$this->https_post($this->sendMsgUrl,$data);
	}
	function sendShopAddrMsg($openid)
	{
		$data = '{
		    "touser":"%s",
		    "msgtype":"news",
		    "news":{
		        "articles": [
		         {
		             "title":"【佬香翁】西安市各门店分布",
		             "description":"Is Really A Happy Day",
		             "url":"http://mp.weixin.qq.com/s?__biz=MjM5MDU5NTAzNQ==&mid=10013172&idx=1&sn=cc4a9f6fb4c7335f33fed79d71a12bfa#rd",
		             "picurl":"http://mmbiz.qpic.cn/mmbiz/hm3bPSYt8EL2mL7Uib1x5QsYEY1f9HoWLW28fJknIw5x0K5zX2CiajHDeQCj78fH3jWCvsF0YJqI1DibnJUoDiavXA/0"
		         },
		         {
		             "title":"【佬香翁红薯坊】百盛店",
		             "description":"Is Really A Happy Day",
		             "url":"http://mp.weixin.qq.com/s?__biz=MjM5MDU5NTAzNQ==&mid=10013172&idx=2&sn=2bc7f47b6362231815bde6a09a8ee77b#rd",
		             "picurl":"http://mmbiz.qpic.cn/mmbiz/hm3bPSYt8EL2mL7Uib1x5QsYEY1f9HoWLBlZBOSUk3KafXdkEku0mdsV3ZiclW553ULkJHR7qZqvJbPmDg3qoXaw/0"
		         },
		         {
		             "title":"【佬香翁红薯坊】新世界店",
		             "description":"Is Really A Happy Day",
		             "url":"http://mp.weixin.qq.com/s?__biz=MjM5MDU5NTAzNQ==&mid=10013172&idx=3&sn=4efa638ab404a69ac2552a300062f31d#rd",
		             "picurl":"http://mmbiz.qpic.cn/mmbiz/hm3bPSYt8EL2mL7Uib1x5QsYEY1f9HoWLE24BibGQOh5wJ3GH3PjMRUKBwLrJ4vyhiacFEMIaLf0EfzFfANicBBz4A/0"
		         },
		         {
		             "title":"【佬香翁红薯坊】新天地店",
		             "description":"Is Really A Happy Day",
		             "url":"http://mp.weixin.qq.com/s?__biz=MjM5MDU5NTAzNQ==&mid=10013172&idx=4&sn=d4bab5fffdbdcdb5ecbd9afefb2360a9#rd",
		             "picurl":"http://mmbiz.qpic.cn/mmbiz/hm3bPSYt8EL2mL7Uib1x5QsYEY1f9HoWLqbwvXNiaJ5ydyl45ssibV9oSrx8FB07qI6yI1R8bktE25uh1o9Lq5Ibw/0"
		         },
		         {
		             "title":"【佬香翁红薯坊】怡丰城店",
		             "description":"Is Really A Happy Day",
		             "url":"http://mp.weixin.qq.com/s?__biz=MjM5MDU5NTAzNQ==&mid=10013172&idx=5&sn=26e485f3d1e4142f08d37316dc592aeb#rd",
		             "picurl":"http://mmbiz.qpic.cn/mmbiz/hm3bPSYt8EL2mL7Uib1x5QsYEY1f9HoWLF3lSFpX8LZWxykiaQD7HNCkSMR6LSicewUvkajySlvsPB9WmIZhtjPfA/0"
		         }
		         ]
		    }
		}';
		$data = sprintf($data,$openid);
		$this->https_post($this->sendMsgUrl,$data);
	}
}
?>
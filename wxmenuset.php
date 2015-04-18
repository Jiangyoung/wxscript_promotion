<?php
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

    $getaccesstokenurl = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
    
    $access_tokenJSON = https_post($getaccesstokenurl);
    
    $access_tokenOBJ = json_decode($access_tokenJSON);
    
    $access_token = $access_tokenOBJ->access_token;
    
    var_dump($access_tokenJSON);

    $setwxmenuurl = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;

    $xjson = '{
    	"button":[
    	{
    		"name":"专薯优惠",
    		"sub_button":[
    		{
    			"type":"view",
    			"name":"线上活动",
    			"url":"http://m.weibo.cn/u/3580116631"
    		},
    		{
    			"type":"click",
    			"name":"线下活动",
    			"key":"privilege_offline_activity"
    		},
    		{
    			"type":"click",
    			"name":"健康之旅",
    			"key":"privilege_health_tour"
    		},
    		{
    			"type":"view",
    			"name":"最新动态",
    			"url":"http://weibo.com/p/10080841183d3452d60e6372a0268e222be001?k=%E5%85%A8%E5%9F%8E%E4%B8%80%E8%B5%B7%E6%8C%96%E7%BA%A2%E8%96%AF&from=501&_from_=huati_topic"
    		}]
    	},
		{
			"name":"红薯多多",
			"sub_button":[
			{
				"type":"click",
				"name":"佬香翁烤红薯",
				"key":"potatos_roast_sweetpotato"				
			},
			{
				"type":"click",
				"name":"休闲薯美味",
				"key":"potatos_relaxation_delicious"				
			},
			{
				"type":"click",
				"name":"健康薯饮",
				"key":"potatos_health_drink"				
			},
			{
				"type":"click",
				"name":"精品礼盒",
				"key":"potatos_the_packing"				
			}]
		},
		{
			"name":"红薯日记",
			"sub_button":[
			{
				"type":"click",
				"name":"佬香翁",
				"key":"diary_lxw"				
			},
			{
				"type":"click",
				"name":"红薯之家",
				"key":"diary_family"				
			},
			{
				"type":"view",
				"name":"微世界",
				"url":"http://mp.weixin.qq.com/mp/getmasssendmsg?__biz=MjM5MDU5NTAzNQ==&from=singlemessage&isappinstalled=0#wechat_webview_type=1&wechat_redirect"				
			},
			{
				"type":"view",
				"name":"微网站",
				"url":"http://m.weibo.cn/u/3580116631"				
			}]
		}]
    	
    }';

    $setmenuResault = https_post($setwxmenuurl,$xjson);

    var_dump($setmenuResault);


?>
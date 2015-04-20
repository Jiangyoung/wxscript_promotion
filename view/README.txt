1、配置微信接口相关参数
（1）改参数
    目录下的config.php为配置文件,修改对应参数即可

2、数据库配置
（1）改参数
    目录下SqlTools.php前几行为数据库配置信息，修改对应参数即可

（2）建表
    table.sql 为建表sql语句,里面最后一行的insert语句为添加一个超级管理员 用户名：admin 密码：administrator!

3.接入微信后台
（1）填写接口配置信息
    <1>填写URL
	    目录下wxscript.php 为 微信接口配置信息 中的 URL 对应的php文件
	<2>填写TOKEN （这里的TOKEN和第一步配置接口相关参数的TOKEN是相对应的  是自己随便写的）

	<3>参数设置
		【1】接入时把config.php中的isValid值为1
		【2】验证完成后改为把config.php中的isValid值为0


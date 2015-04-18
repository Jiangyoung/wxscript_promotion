<?php /* Smarty version Smarty-3.1.19, created on 2014-10-12 22:03:53
         compiled from "view/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1455571599543a8a49ced0f9-29404371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb2c26c587793615c2703f1aa7784fe52c87c30d' => 
    array (
      0 => 'view/login.tpl',
      1 => 1413105384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1455571599543a8a49ced0f9-29404371',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543a8a49cf7a09_27325030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543a8a49cf7a09_27325030')) {function content_543a8a49cf7a09_27325030($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title>Login</title>
	
</head>
<body>
	<div>
		<form action="" method="post">
			<table>
				<tbody>
					<tr>
						<td>用户名：</td><td><input type="text" value="" name="username"/></td>
					</tr>
					
                    <tr>
                        <td>密码：</td><td><input type="password" value="" name="password"/></td>
                    </tr>

                    <tr>
						<td colspan="2" align="center"><input type="submit" value="登录" name="submit"/></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html><?php }} ?>

<?php /* Smarty version Smarty-3.1.19, created on 2014-10-12 12:22:25
         compiled from "view\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23339543a56610e6220-22331683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ba81c01c1bcf82c322f102723ab9444d14969f6' => 
    array (
      0 => 'view\\login.tpl',
      1 => 1413105384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23339543a56610e6220-22331683',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543a56611288b7_64796586',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543a56611288b7_64796586')) {function content_543a56611288b7_64796586($_smarty_tpl) {?><!DOCTYPE html>
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

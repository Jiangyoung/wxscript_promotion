<?php /* Smarty version Smarty-3.1.19, created on 2014-10-12 16:00:11
         compiled from "view\admin_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8829543a7232a5d4f2-95230549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed870b8f6e79d2672c5c21c7bf80765b83375a97' => 
    array (
      0 => 'view\\admin_add.tpl',
      1 => 1413122407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8829543a7232a5d4f2-95230549',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543a7232a8c309_39037357',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543a7232a8c309_39037357')) {function content_543a7232a8c309_39037357($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title>Add</title>
	
</head>
<body>
	<div>
		<form action="" method="post" name="admin_form">
			<table>
				<tbody>
					<tr>
						<td>用户名：</td><td><input type="text" value="" required="true" id="username" name="username"/>&nbsp;&nbsp;(字母+数字)</td>
					</tr>
					<tr>
						<td>姓名：</td><td><input type="text" value=""  name="truename"/></td>
					</tr>
					<tr>
						<td>性别：</td>
                        <td>
                            <strong>
                                <select id="gender" name="gender" selected="男">
                                    <option value="男">男</option>
                                    <option value="女">女</option>
                                </select>
                            </strong>
					</tr>

                    <tr>
                        <td>密码：</td><td><input type="password" value="" required="true" name="password" id="password"/></td>
                    </tr>
                    <tr>
                        <td>确认密码：</td><td><input type="password" required="true" value="" name="password2" id="password2"/></td>
                    </tr>
					<tr>
						<td>备注：</td><td><textarea rows="5" cols="20" name="remark"></textarea></td>
					</tr>
                    <tr>
					<script langauge="javascript" type="text/javascript">
						function verifyform () {
							var passwd = document.getElementById('password').value; 
							var passwd2 = document.getElementById('password2').value;
							var username = document.getElementById('username').value;
							if(username.length<3){
								alert("用户名太短");
								if(passwd!='' && passwd==passwd2 && passwd.length>4){
								alert("密码太短");
							}
							}else{
								admin_form.submit();
							}
						}
					</script>
						<td colspan=2><input type="button" value="添加" onclick="verifyform();"/></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html><?php }} ?>

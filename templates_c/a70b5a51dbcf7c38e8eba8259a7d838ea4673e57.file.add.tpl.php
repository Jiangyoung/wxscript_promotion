<?php /* Smarty version Smarty-3.1.19, created on 2014-10-12 00:23:23
         compiled from "view/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9138339215439597b387be8-56804533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a70b5a51dbcf7c38e8eba8259a7d838ea4673e57' => 
    array (
      0 => 'view/add.tpl',
      1 => 1413034538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9138339215439597b387be8-56804533',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5439597b390578_01733439',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5439597b390578_01733439')) {function content_5439597b390578_01733439($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title>Add</title>
	
</head>
<body>
	<div>
		<form action="" method="post">
			<table>
				<tbody>
					<tr>
						<td>姓名：</td><td><input type="text" value="" name="name"/></td>
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
                        <td>分组：</td><td><input type="text" value="" name="ggroup"/></td>
                    </tr>
					<tr>
						<td>备注：</td><td><textarea rows="5" cols="20" name="remark"></textarea></td>
					</tr>
                    <tr>
						
						<td colspan=2><input type="submit" value="添加" name="submit"/></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html><?php }} ?>

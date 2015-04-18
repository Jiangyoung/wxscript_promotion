<?php /* Smarty version Smarty-3.1.19, created on 2014-10-11 16:58:05
         compiled from "view\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25408543931b08908c4-61584980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de80fea58261005015a197d2e273a95510310af5' => 
    array (
      0 => 'view\\add.tpl',
      1 => 1413034537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25408543931b08908c4-61584980',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543931b0982bf4_73306419',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543931b0982bf4_73306419')) {function content_543931b0982bf4_73306419($_smarty_tpl) {?><!DOCTYPE html>
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

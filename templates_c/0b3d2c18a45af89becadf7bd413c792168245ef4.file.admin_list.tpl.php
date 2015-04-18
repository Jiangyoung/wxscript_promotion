<?php /* Smarty version Smarty-3.1.19, created on 2014-10-12 22:06:43
         compiled from "view/admin_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2000009404543a8af3ad7fb4-08157037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b3d2c18a45af89becadf7bd413c792168245ef4' => 
    array (
      0 => 'view/admin_list.tpl',
      1 => 1413116459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2000009404543a8af3ad7fb4-08157037',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admins' => 0,
    'admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543a8af3b02eb8_99159283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543a8af3b02eb8_99159283')) {function content_543a8af3b02eb8_99159283($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content ="text/html;charset=utf-8">
        <style>
            .mtable{   
                    border-top: thin dotted #00FF00;      
            }
        </style>
    </head>
    <body>
        <table class="mtable" id="mtable" border="1" width="800px" align="center" cellpadding="1" cellspacing="0">

            <tr>
                <td colspan="5" align="center" valign="middle" bgcolor="#DFFACF"><strong><font style="color:#ff0000"></font>普通管理员
                        <a title="帐号添加" href="admin_add.php">添加</a>
                    </strong>
                </td>



                <td align="center">
                    <a href="index.php">返回主页</a>
                </td>
            </tr>

            <tr>
                <td  align="center" valign="middle"><strong>序号</strong></td>
                <td  align="center" valign="middle"><strong>帐号</strong></td>

                <td  align="center" valign="middle"><strong>姓名</strong></td>
                <td  align="center" valign="middle"><strong>性别</strong></td>

                <td  align="center" valign="middle"><strong>备注</strong></td>

                <td  align="center" valign="middle"><strong>管理选项</strong></td>

            </tr>
            <?php  $_smarty_tpl->tpl_vars['admin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['admin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['admin']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->key => $_smarty_tpl->tpl_vars['admin']->value) {
$_smarty_tpl->tpl_vars['admin']->_loop = true;
 $_smarty_tpl->tpl_vars['admin']->index++;
?>
            <tr>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['admin']->index+1;?>
</td>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['admin']->value['username'];?>
</td>
             
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['admin']->value['truename'];?>
</td>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['admin']->value['gender'];?>
</td>

                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['admin']->value['remark'];?>
</td>

                <td  align="center">
                    <p>  
                        <!--<a href="update.php?id='.$row[0].'"  title="修改">修改</a>-->
                        <a href="admin_delete.php?adminid=<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
" onclick="return confirm('你确定要删除吗?');" title="删除">删除</a>
                    </p>
                </td>
            </tr>         
            <?php } ?>
            

        </table>
    </body>
</html><?php }} ?>

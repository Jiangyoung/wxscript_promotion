<?php /* Smarty version Smarty-3.1.19, created on 2014-10-12 15:35:22
         compiled from "view\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293055439388872ddf2-02023275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16f8b19f4b499fdf82c6632d817fb7de50e33924' => 
    array (
      0 => 'view\\index.tpl',
      1 => 1413120913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293055439388872ddf2-02023275',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54393888764908_03387801',
  'variables' => 
  array (
    'lxwuser' => 0,
    'options' => 0,
    'option' => 0,
    'groupname' => 0,
    'list' => 0,
    'row' => 0,
    'achievementcount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54393888764908_03387801')) {function content_54393888764908_03387801($_smarty_tpl) {?><!DOCTYPE html>
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
        <table class="mtable" id="mtable" width="800px" border="1" align="center" cellpadding="1" cellspacing="0">

            <tr>
                <td colspan="6" align="center" valign="middle" bgcolor="#DFFACF"><strong><font style="color:#ff0000"></font>授予记录
                        <?php if ($_smarty_tpl->tpl_vars['lxwuser']->value['userid']) {?><a title="帐号添加" href="add.php">添加</a><?php }?>
                    </strong>
                </td>

                <td>
                    <select name="ggroup" id="ggroup" onchange="getgrouplist();">
                        <option value="">全部</option>
                        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['groupname']->value) {?><?php if ($_smarty_tpl->tpl_vars['groupname']->value==$_smarty_tpl->tpl_vars['option']->value) {?>selected<?php }?><?php }?>><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</option>
                        <?php } ?>
                    </select>                   

                    <script langauge="javascript" type="text/javascript">
                        function getgrouplist () {
                            var options = document.getElementById("ggroup").options;
                            var selectedOptionValue;
                            for (var i = options.length - 1; i >= 0; i--) {
                                if(options[i].selected==true)selectedOptionValue = options[i].value;
                            };
                            window.location.href="index.php?ggroup="+selectedOptionValue;

                        }
                    </script>
                </td>

                <td align="center">
                    <?php if (!$_smarty_tpl->tpl_vars['lxwuser']->value['userid']) {?><a href="login.php">登录</a><?php } else { ?><strong><?php echo $_smarty_tpl->tpl_vars['lxwuser']->value['username'];?>
</strong>&nbsp;<a href="exit.php">退出</a><?php }?>
                </td>
                <?php if ($_smarty_tpl->tpl_vars['lxwuser']->value['is_supper']==1) {?>
                <td align="center">
                    <a href="admin_list.php">管理管理员</a>
                </td>
                <?php }?>

            </tr>

            <tr>
                <td  align="center" valign="middle"><strong>序号</strong></td>
                <td  align="center" valign="middle"><strong>姓名</strong></td>

                <td  align="center" valign="middle"><strong>性别</strong></td>

                <td  align="center" valign="middle"><strong>二维码</strong></td>
                <td  align="center" valign="middle"><strong>推广人数</strong></td>
                <td  align="center" valign="middle"><strong>净推广人数</strong><br/>(即去掉已经取消的人)</td>
                <td  align="center" valign="middle"><strong>分组</strong></td>
                <td  align="center" valign="middle"><strong>备注</strong></td>
                <?php if ($_smarty_tpl->tpl_vars['lxwuser']->value['userid']) {?>
                <td  align="center" valign="middle"><strong>管理选项</strong></td>
                <?php }?>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['row']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['row']->index++;
?>
            <tr>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['row']->index+1;?>
</td>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['row']->value[1];?>
</td>
             
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['row']->value[2];?>
</td>

                <td  align="center" valign="middle">
                   <a href="<?php echo $_smarty_tpl->tpl_vars['row']->value[3];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value[3];?>
" width="120" height="120" /></a>
                </td>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['row']->value[4];?>
</td>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['row']->value[5];?>
</td>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['row']->value[6];?>
</td>
                <td  align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['row']->value[7];?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['lxwuser']->value['userid']) {?>
                <td  align="center">
                    <p>  
                        <!--<a href="update.php?id='.$row[0].'"  title="修改">修改</a>-->
                        <a href="delete.php?id=<?php echo $_smarty_tpl->tpl_vars['row']->value[0];?>
" onclick="return confirm('你确定要删除吗?');" title="删除">删除</a>
                    </p>
                </td>
                <?php }?>
            </tr>         
            <?php } ?>
            
            <tr>
                <td  align="right" valign="middle" colspan="4"><strong>总计：</strong></td>

                <td  align="center" valign="middle" bgcolor="#98FB98"><strong><?php echo $_smarty_tpl->tpl_vars['achievementcount']->value['achievement'];?>
</strong></td>
                <td  align="center" valign="middle" bgcolor="#98FB98"><strong><?php echo $_smarty_tpl->tpl_vars['achievementcount']->value['pureachieve'];?>
</strong></td>
            </tr>

        </table>
    </body>
</html><?php }} ?>

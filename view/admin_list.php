<!DOCTYPE html>
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
            <?php foreach($admins as $k => $admin){ ?>
            <tr>
                <td  align="center" valign="middle"><?php echo $key+1; ?></td>
                <td  align="center" valign="middle"><?php echo $admin['username']; ?></td>
             
                <td  align="center" valign="middle"><?php echo $admin['truename'] ?></td>
                <td  align="center" valign="middle"><?php echo $admin['gender'] ?></td>

                <td  align="center" valign="middle"><?php echo $admin['remark'] ?></td>

                <td  align="center">
                    <p>
                        <a href="admin_delete.php?adminid=<?php echo $admin['id'] ?>" onclick="return confirm('你确定要删除吗?');" title="删除">删除</a>
                    </p>
                </td>
            </tr>
            <?php } ?>
            

        </table>
    </body>
</html>
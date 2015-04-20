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
        <table class="mtable" id="mtable" width="800px" border="1" align="center" cellpadding="1" cellspacing="0">

            <tr>
                <td colspan="6" align="center" valign="middle" bgcolor="#DFFACF"><strong><font style="color:#ff0000"></font>授予记录
                        <?php if(intval($lxwuser['userid'])){ ?>  <a title="帐号添加" href="add.php">添加</a> <?php } ?>
                    </strong>
                </td>

                <td>
                    <select name="ggroup" id="ggroup" onchange="getgrouplist();">
                        <option value="">全部</option>
                        <?php foreach($options as $option){ ?>
                        <option value="<?php echo $option ?>" <?php if(isset($groupname) &&  $groupname==$option){ ?>selected <?php }?>><?php echo $option ?></option>

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
                    <?php if(!intval($lxwuser['userid'])) { ?>
                    <a href="login.php">登录</a>
                    <?php }else {?>
                    <strong><?php echo $lxwuser['username'] ?></strong>&nbsp;<a href="exit.php">退出</a>
                    <?php } ?>
                </td>
                <?php if(1 == $lxwuser['is_supper']) { ?>
                <td align="center">
                    <a href="admin_list.php">管理管理员</a>
                </td>
                <?php } ?>

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
                <?php if(intval($lxwuser['userid'])){ ?>
                <td  align="center" valign="middle"><strong>管理选项</strong></td>
                <?php } ?>
            </tr>
            <?php foreach($list as $k=>$row){ ?>
            <tr>
                <td  align="center" valign="middle"><?php echo $key+1; ?></td>
                <td  align="center" valign="middle"><?php echo $row[1]; ?></td>
             
                <td  align="center" valign="middle"><?php echo $row[2]; ?></td>

                <td  align="center" valign="middle">
                   <a href="<?php echo $row[3]; ?>" target="_blank"><img src="<?php echo $row[3]; ?>" width="120" height="120" /></a>
                </td>
                <td  align="center" valign="middle"><?php echo $row[4]; ?></td>
                <td  align="center" valign="middle"><?php echo $row[5]; ?></td>
                <td  align="center" valign="middle"><?php echo $row[6]; ?></td>
                <td  align="center" valign="middle"><?php echo $row[7]; ?></td>
                <?php if(intval($lxwuser['userid'])) { ?>
                <td  align="center">
                    <p>  
                        <!--<a href="update.php?id='.$row[0].'"  title="修改">修改</a>-->
                        <a href="delete.php?id=<?php echo $row[0]; ?>" onclick="return confirm('你确定要删除吗?');" title="删除">删除</a>
                    </p>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
            
            <tr>
                <td  align="right" valign="middle" colspan="4"><strong>总计：</strong></td>

                <td  align="center" valign="middle" bgcolor="#98FB98"><strong><?php echo $achievementcount['achievement']; ?></strong></td>
                <td  align="center" valign="middle" bgcolor="#98FB98"><strong><?php echo $achievementcount['pureachieve']; ?></strong></td>
            </tr>

        </table>
    </body>
</html>
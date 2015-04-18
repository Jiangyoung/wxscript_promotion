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
                        {{if $lxwuser.userid}}<a title="帐号添加" href="add.php">添加</a>{{/if}}
                    </strong>
                </td>

                <td>
                    <select name="ggroup" id="ggroup" onchange="getgrouplist();">
                        <option value="">全部</option>
                        {{foreach $options as $option}}
                        <option value="{{$option}}" {{if $groupname}}{{if $groupname==$option}}selected{{/if}}{{/if}}>{{$option}}</option>
                        {{/foreach}}
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
                    {{if !$lxwuser.userid}}<a href="login.php">登录</a>{{else}}<strong>{{$lxwuser.username}}</strong>&nbsp;<a href="exit.php">退出</a>{{/if}}
                </td>
                {{if $lxwuser.is_supper==1}}
                <td align="center">
                    <a href="admin_list.php">管理管理员</a>
                </td>
                {{/if}}

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
                {{if $lxwuser.userid}}
                <td  align="center" valign="middle"><strong>管理选项</strong></td>
                {{/if}}
            </tr>
            {{foreach $list as $row}}
            <tr>
                <td  align="center" valign="middle">{{$row@index+1}}</td>
                <td  align="center" valign="middle">{{$row[1]}}</td>
             
                <td  align="center" valign="middle">{{$row[2]}}</td>

                <td  align="center" valign="middle">
                   <a href="{{$row[3]}}" target="_blank"><img src="{{$row[3]}}" width="120" height="120" /></a>
                </td>
                <td  align="center" valign="middle">{{$row[4]}}</td>
                <td  align="center" valign="middle">{{$row[5]}}</td>
                <td  align="center" valign="middle">{{$row[6]}}</td>
                <td  align="center" valign="middle">{{$row[7]}}</td>
                {{if $lxwuser.userid}}
                <td  align="center">
                    <p>  
                        <!--<a href="update.php?id='.$row[0].'"  title="修改">修改</a>-->
                        <a href="delete.php?id={{$row[0]}}" onclick="return confirm('你确定要删除吗?');" title="删除">删除</a>
                    </p>
                </td>
                {{/if}}
            </tr>         
            {{/foreach}}
            
            <tr>
                <td  align="right" valign="middle" colspan="4"><strong>总计：</strong></td>

                <td  align="center" valign="middle" bgcolor="#98FB98"><strong>{{$achievementcount.achievement}}</strong></td>
                <td  align="center" valign="middle" bgcolor="#98FB98"><strong>{{$achievementcount.pureachieve}}</strong></td>
            </tr>

        </table>
    </body>
</html>
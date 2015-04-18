<!DOCTYPE html>
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
</html>
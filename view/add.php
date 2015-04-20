<!DOCTYPE html>
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
</html>
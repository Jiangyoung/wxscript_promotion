<?php
if($_GET['id'])
{
require_once 'SqlTools.php';
    
$sqlTools = new SqlTools();

$id = $_GET['id'];
    
$sql = "select name,gender,remark from lxw_grantrecord where id=$id";
    
$res = $sqlTools->execute_dql($sql);
$row = mysql_fetch_row($res);
$name = $row[0];
$gender = $row[1];
$remark = $row[2];

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
 
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $remark = $_POST['remark'];
    
    $sql = "update lxw_grantrecord set name='%s',gender='%s',remark='%s'where id=$id";
    $sql = sprintf($sql,$name,$gender,$remark);
    
    $res = $sqlTools->execute_dml($sql);
    
    header("Location:index.php");
}else{
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>

	<title>add</title>
	
</head>
<body>
	<div>
		<form action="" method="post">
			<table>
				<tbody>
					<tr>
						<td>姓名：</td><td><input type="text" value="<?php echo $name?>" name="name"/></td>
					</tr>
					<tr>
						<td>性别：</td>
                        <td>
                            <strong>
                                <select id="gender" name="gender" selected="<?php echo $gender?>">
                                    <option value="男">男</option>
                                    <option value="女">女</option>
                                </select>
                            </strong>
					</tr>
					<tr>
						<td>备注：</td><td><input type="text" value="<?php echo $remark?>" name="remark"/></td>
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

<?php
}
}
?>
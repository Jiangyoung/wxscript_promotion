<?php

class SqlTools{
	private $conn;
	// private $db_name="wxdeve";
	// private $db_user="root";
	// private $db_pwd="root";
	private $db_name=SAE_MYSQL_DB;
	private $db_user=SAE_MYSQL_USER;
	private $db_pwd=SAE_MYSQL_PASS;

	function __construct(){
		$this->conn=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
		if(!$this->conn){
			die("连接失败".mysql_error());
		}
		mysql_select_db($this->db_name,$this->conn);

		mysql_query("set names utf8");
	}

	function execute_dql($sql){
		$res=mysql_query($sql) or die(mysql_error());
		return $res;
	}
	function execute_dml($sql){
		$res=mysql_query($sql) or die(mysql_error());
		if(!$res){
			return 0;//执行失败
		}else{
			if(mysql_affected_rows($this->conn)>0){
				return 1;//执行成功
			}else{
				return 2;//没有影响到行数
			}
		}
	}
}

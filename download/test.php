<?php
$mysql_server="rm-wz9i0pv80jyiv5r9vo.mysql.rds.aliyuncs.com";
$mysql_username="asuser";
$mysql_password="QWzx!@90";
$mysql_database="agedness-watch";
//建立数据库链接
$conn = mysql_connect($mysql_server,$mysql_username,$mysql_password) or die("cuowu");
//选择某个数据库
mysql_select_db($mysql_database,$conn);
mysql_query('SET NAMES UTF8');
//执行MySQL语句
$result=mysql_query("SELECT * FROM `account` WHERE id = '1'");
//提取数据
$row=mysql_fetch_row($result);
  print_r($row);
 ?>
<?php
/*****************************
*数据库连接
*****************************/
$conn = @mysql_connect("localhost","root","root");
if (!$conn){
    die("Sorry! Failed to connect to database: " . mysql_error());
}
mysql_select_db("test", $conn);
//字符转换，读库
mysql_query("set character set 'utf-8'");
//写库
mysql_query("set names 'utf-8'");
?>
<?php
header("Content-type: text/html; charset=utf-8");
session_start();
if(!isset($_POST['submit'])){
    exit('Permission denied!');
}
$realname = $_POST['realname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$city = $_POST['city'];

//包含数据库连接文件
include('conn.php');
$uid = $_SESSION['userid'];
//写入数据
//$age = MD5($age);
//$regdate = time();
if ($realname != "") {
	$sqlrealname = "UPDATE  `user` SET  `real_name` =  '$realname' WHERE  `user`.`uid` = '$uid'";
	if(mysql_query($sqlrealname,$conn)){
    	echo 'Realname edit success!','<br />';
	} else {
    	echo 'Sorry! Failed to connect to database: ',mysql_error(),'<br />';
	}
}
if ($age != "") {
	$sqlage = "UPDATE  `user` SET  `age` =  '$age' WHERE  `user`.`uid` = '$uid'";
	if(mysql_query($sqlage,$conn)){
	    echo 'Age edit success!','<br />';
	} else {
	    echo 'Sorry! Failed to connect to database: ',mysql_error(),'<br />';
	}
}
if ($gender != "") {
	$sqlgender = "UPDATE  `user` SET  `gender` =  '$gender' WHERE  `user`.`uid` = '$uid'";
	if(mysql_query($sqlgender,$conn)){
	    echo 'Gender edit success!','<br />';
	} else {
	    echo 'Sorry! Failed to connect to database: ',mysql_error(),'<br />';
	}
}
if ($city != "") {
	$sqlcity = "UPDATE  `user` SET  `city` =  '$city' WHERE  `user`.`uid` = '$uid'";
	if(mysql_query($sqlcity,$conn)){
	    echo 'City edit success!','<br />';
	} else {
	    echo 'Sorry! Failed to connect to database: ',mysql_error(),'<br />';
	}
}
echo 'Click here <a href="javascript:history.back(-1);">Back</a>';
?>
<?php
header("Content-type: text/html; charset=utf-8");
if(!isset($_POST['submit'])){
    exit('Permission denied!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
//注册信息判断
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
    exit('Error:Username length should between 3 and 15.<a href="javascript:history.back(-1);">Back</a>');
}
if(strlen($password) < 6){
    exit('Error:Password should be longer than 6.<a href="javascript:history.back(-1);">Back</a>');
}
if(!preg_match('/^([a-zA-Z0-9][_|-|.]?)*[a-zA-Z0-9]@([a-zA-Z0-9][_|-|.]?)*[a-zA-Z0-9].[a-zA-Z]{2,3}$/', $email)){
    exit('Error:Please input correct email.<a href="javascript:history.back(-1);">Back</a>');
}
//包含数据库连接文件
include('conn.php');
//检测用户名是否已经存在
$check_query = mysql_query("select uid from user where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
    echo 'Error:Username',$username,' already exists.<a href="javascript:history.back(-1);">Back</a>';
    exit;
}
//写入数据
//$password = MD5($password);
//$regdate = time();
$sql = "INSERT INTO user(username,password, email)VALUES('$username','$password', '$email')";
if(mysql_query($sql,$conn)){
    exit('Sign up success! <a href="login.html">login</a>');
} else {
    echo 'Sorry! Can not connect to database:',mysql_error(),'<br />';
    echo 'Click <a href="javascript:history.back(-1);">Back</a> Try again';
}
?>
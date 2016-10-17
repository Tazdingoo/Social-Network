<?php
header("Content-type: text/html; charset=utf-8");
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件 location_name, location_id, postid3
include('conn.php');
$name = $_GET["location_name"];
$id = $_GET["location_id"];
$postid = $_GET['postid3'];
//将选取的location_id填进post
$addlocation = mysql_query("UPDATE `post` SET `location_id`= $id WHERE `post_id` = $postid ");
//返回主页
{
echo "Add location success！<br />";
//echo '<a href="javascript:history.back(-1);">'.'Back'.'</a>';
echo '<a href="my.php">'.'Back'.'</a>';
}
?>
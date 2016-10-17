<?php
header("Content-type: text/html; charset=utf-8");
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件 receiver_id, sender_id
include('conn.php');
$receiver = $_GET["receiver_id"];
$sender = $_GET["sender_id"];
//同意请求
$accept = mysql_query("UPDATE `friends` SET `status`= 'accepted' WHERE sender_id = $sender AND receiver_id = $receiver");

{
echo "Add friend success！<br />";
echo 'Click here <a href="javascript:history.back(-1);">Back</a>';
//echo '<a href="login.php?receiver_id='.$userid.'&sender_id='.$row[0].'">'.'返回'.'</a>';
//echo '<a href="myindex.php?username='.$row[1].'">'.$row[1].'</a>';
//echo "<br />";
}

?>
</body>
</html>

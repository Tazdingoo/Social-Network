<?php
header("Content-type: text/html; charset=utf-8");
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件 latitude, longitude, location_name
include('conn.php');
$lat = $_POST["lat"];
$lng = $_POST["lng"];
$name = $_POST["name"];
$postid = $_SESSION['postid'];

//创建地点
$newlocation = mysql_query("INSERT INTO `location` (`latitude`, `longitude`, `location_name`)
VALUES ($lat, $lng, '$name')");
// get new location id
$newlocation_id = mysql_query("SELECT MAX(`location_id`) FROM  `location`");
while($row = mysql_fetch_array($newlocation_id))
{
echo "new location id:";
echo $row[0];
echo "<br />";
echo "post id:";
echo $postid;
echo "<br />";
//$addlocation = mysql_query("UPDATE 'post' SET 'location_id' = $row[0] WHERE post_id = $postid ");
$addlocation = mysql_query("UPDATE `post` SET `location_id`= $row[0] WHERE `post_id` = $postid ");}

// insert id into post
//$addlocation = mysql_query("UPDATE 'post' SET 'location_id' = '$row[0]' WHERE post_id = '$postid' ");
//$accept = mysql_query("UPDATE `post` SET `location_id`= 'row[0]' WHERE post_id = $postid ");
//while($row1 = mysql_fetch_array($addlocation))
//{
//echo "new location id:"; 
//echo $row1[0];
//echo "<br />";
//}
//echo $addlocation;
//echo "<br />";
{
echo "Create location success！<br />";
//echo '<a href="javascript:history.back(-1);">'.'返回'.'</a>';
echo '<a href="my.php">'.'Back'.'</a>';
}

?>
</body>
</html>

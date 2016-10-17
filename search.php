<?php
header("Content-type: text/html; charset=utf-8");
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid']))
{
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
include('conn.php');
$myid = $_SESSION['userid'];
$username = $_SESSION['username'];
$keyword = $_POST['keyword'];


//搜索用户－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－
$search_friends = mysql_query("select * from `user` where (`username` like'%$keyword%')");
echo "Users about ";
echo $keyword;//搜索nyc会出现问题？  why？？？？
echo ":";
echo "<br />";  
while($row1 = mysql_fetch_array($search_friends)) 
//Show the tables, then save the selected table name as "tablename"
{ 
echo '<a href="myindex.php?userid='.$row1['uid'].'&myid='.$myid.'">'.$row1['username'].'</a>'; 
//跳转至myindex.php  uid  myid
echo "<br />";            
} 


//搜索tag－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－
$search_tags = mysql_query("select * from `tag` where (`tag` like'%$keyword%')");
echo "Tags about ";
echo $keyword;
echo ":";
echo "<br />";  
while($row2 = mysql_fetch_array($search_tags)) 
//Show the tables, then save the selected table name as "tablename"
{ 
echo '<a href="tag.php?post_id='.$row2['post_id'].'">'.$row2['tag'].'</a>'; 
//跳转至tag.php    传递post_id   一个post只能有一个tag！！！！！！！！!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
echo "<br />";            
} 


//搜索地址－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－
$search_location = mysql_query("select * from `location` where (`location_name` like'%$keyword%')");
echo "Locations about ";
echo $keyword;
echo ":";
echo "<br />";  
while($row3 = mysql_fetch_array($search_location)) 
//Show the tables, then save the selected table name as "tablename"
{ 
echo '<a href="location.php?location_id='.$row3['location_id'].'">'.$row3['location_name'].'</a>';
//跳转至location.php   location_id！！！！！！！！！！！！！！！！！！！！！！！！！！！！！
echo "<br />";            
} 


//搜索文章－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－
$search_post = mysql_query("select * from `post` where (`text` like'%$keyword%')");
echo "Posts about ";
echo $keyword;
echo ":";
echo "<br />";
//选择我的好友
$friend_query = mysql_query("SELECT * FROM `friends` WHERE (receiver_id = $myid AND status = 'accepted') OR (sender_id = $myid AND status = 'accepted')");
if($row = mysql_fetch_array($friend_query))
{
  while($row = mysql_fetch_array($search_post))
    {//All + Friends
    if ($row['privileges'] == 'All' || $row['privileges'] == 'Friends') 
    {
    	echo '<a href="post.php?post_id='.$row['post_id'].'&uid='.$row['uid'].'">'.$row['title'].'</a>';
        //echo $row['title'];
        echo "<br />"; 
        echo $row['text'];
        echo "<br />"; 
    }

  }
} 
else 
{
    while($row = mysql_fetch_array($search_post))
    {//All
    if ($row['privileges'] == 'All') 
        {
        echo '<a href="post.php?post_id='.$row['post_id'].'&uid='.$row['uid'].'">'.$row['title'].'</a>';
        //echo $row['title'];
        echo "<br />"; 
        echo $row['text'];
        echo "<br />"; 
        }
    }
}

echo '<a href="my.php">'.'Back to my homepage'.'</a>';

?>
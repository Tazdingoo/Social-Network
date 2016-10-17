<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="jquery">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("p a").click(function(){
		var love = $(this);
		var id = love.attr("rel");
		love.fadeOut(300);
		$.ajax({
			type:"POST",
			url:"love.php",
			data:"id="+id,
			cache:false,
			success:function(data){
				love.html(data);
				love.fadeIn(300);
			}
		});
		return false;
	});
});
</script>
<script language=JavaScript>
<!--


//-->
</script>
<style type="text/css">
@charset "utf-8";
@font-face {
        font-family: 'proxima-nova';
        src: url(' //instagramstatic-a.akamaihd.net/h1/webfonts/proximanova-reg-webfont.eot/12af77715cee.eot');
        src: url(' //instagramstatic-a.akamaihd.net/h1/webfonts/proximanova-reg-webfont.eot/12af77715cee.eot?#iefix') format("embedded-opentype"),
          url(' //instagramstatic-a.akamaihd.net/h1/webfonts/proximanova-reg-webfont.woff/a9a9773b8e29.woff') format("woff"),
          url(' //instagramstatic-a.akamaihd.net/h1/webfonts/proximanova-reg-webfont.ttf/99e19808976a.ttf') format("truetype"),
          url(' //instagramstatic-a.akamaihd.net/h1/webfonts/proximanova-reg-webfont.svg/c33d2fd56309.svg#ProximaNovaRegular') format("svg");
        font-weight: normal;
        font-style: normal; 
      }
body,button,input,textarea{font-family:'proxima-nova',Arial,Helvetica,sans-serif}a,a:link{color:#125688;}a:visited{color:#125688;}a:hover{color:blue;}
/* CSS Document */
p{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}
a{color:#007bc4/*#424242*/; text-decoration:none;}
a:hover{text-decoration:underline}
ol,ul{list-style:none}
table{border-collapse:collapse;border-spacing:0}
img{border:none}

      ._q1f8o {
        margin: 0 0 20px 0px;
        left: 980px;
        top: .45em;
        width: 400px;
        border:2px solid #D4D2D6
      }





.clear{clear:both}
.list{width:760px; margin:20px auto}
.list li{float:left; width:360px; height:360px; margin:10px; position:relative}
.list li p{position:absolute; top:0; left:0; width:360px; height:24px; line-height:24px; background:#000; opacity:.8;filter:alpha(opacity=80);}
.list li p a{padding-left:30px; height:24px; background:url(images/heart.png) no-repeat 4px -1px;color:#fff; font-weight:bold; font-size:14px}
.list li p a:hover{background-position:4px -25px;text-decoration:none}
h2{margin:0;padding:0;border:0;outline:0;}
h3{margin:0;padding:0;border:0;outline:0;color:#007bc4/*#424242*/;}
</style>
</head>

<body>

<div id="main">
     <ul class="list">
     <?php
@header("Content-Type: text/html;charset=utf-8");
@session_start();



//检测是否登录，若没登录则转向登录界面
$userid = $_GET["userid"];
$myid = $_GET["myid"];

if($myid == $userid){
    header("Location:my.php");
    exit();
}
//包含数据库连接文件
include('conn.php');

$user_query = mysql_query("select * from user where uid=$userid limit 1");
$row = mysql_fetch_array($user_query);?>
<div class = "_q1f8o"><h2><?php
echo 'User information：<br />';
echo 'ID：',$userid,'<br />';
echo 'Email：',$row['email'],'<br />';
echo 'Register time：',$row['register_time'],'<br />';
echo 'Realname：',$row['real_name'],'<br />';
echo 'Gender：',$row['gender'],'<br />';
echo 'City：',$row['city'],'<br />';
echo 'Age：',$row['age'],'<br />';
echo 'Last log in：',$row['last_login'],'<br />';
echo 'Last log out：',$row['last_logout'],'<br />';
echo "<br />";
echo '<a href="addfriend.php?userid='.$userid.'&myid='.$myid.'">Add Friend</a>';
echo "<br />";
?></h2></div>
<?php
$post_query = mysql_query("SELECT * FROM `post` WHERE uid = $userid ORDER BY `upload_time` DESC");
$friend_query = mysql_query("SELECT * FROM `friends` WHERE (sender_id = $userid AND receiver_id = $myid AND status = 'accepted') OR (sender_id = $myid AND receiver_id = $userid AND status = 'accepted')");
if($row = mysql_fetch_array($friend_query)){
  while($row = mysql_fetch_array($post_query))
    {
    if ($row['privileges'] == 'All' || $row['privileges'] == 'Friends') {
      $postuid = $row['uid'];
      $userinfo_query = mysql_query("SELECT username FROM user WHERE uid = $postuid");
      $userrow = mysql_fetch_array($userinfo_query);
      $postusername = $userrow[0];
      ?><h3><?php echo $postusername,'<br />';?></h3><?php
      if ($row['type'] == 'Activity') {
        $postid = $row['post_id'];
        ?>
        <h2><?php echo 'Title: ', $row['title'],'<br />';?></h2>
        <?php
        $title = $row['title'];
        echo $row['text'],'<br />';
        $likes = $row['likes'];
        echo "<br />";
        $locationid = $row['location_id'];
        if ($check_location = mysql_query("SELECT * FROM location WHERE location_id = $locationid")) {
              $row = mysql_fetch_array($check_location);
              echo 'location: ',$row['location_name'],' lat: ',$row['latitude'],' lng: ',$row['longitude'], '<br />';
            }
            if($check_tag = mysql_query("SELECT * FROM tag WHERE post_id = $postid")){
              if ($row = mysql_fetch_array($check_tag)) {
              echo 'This post is about: ',$row['tag'];
              }
              while ($row = mysql_fetch_array($check_tag)) {
              echo ' ',$row['tag'];
              }
            }
        echo "<br />";?>   
        <li><p><a href="#"    
        title="like"class="img_on" rel="<?php echo $postid;?>"><?php echo $likes;?></a></p></li>
        <?php
      } else {
        $postid = $row['post_id'];
        $likes = $row['likes'];
        $title = $row['title'];
        ?>
        <h2><?php echo 'Title: ', $row['title'],'<br />';?></h2>
        <?php
        echo $row['text'],'<br />';
        echo $row['upload_time'],'<br />';
        $url = $row['url'];
        echo "<br />";
        $locationid = $row['location_id'];
        if ($check_location = mysql_query("SELECT * FROM location WHERE location_id = $locationid")) {
              $row = mysql_fetch_array($check_location);
              echo 'location: ',$row['location_name'],' lat: ',$row['latitude'],' lng: ',$row['longitude'], '<br />';
            }
            if($check_tag = mysql_query("SELECT * FROM tag WHERE post_id = $postid")){
              if ($row = mysql_fetch_array($check_tag)) {
              echo 'This post is about: ',$row['tag'];
              }
              while ($row = mysql_fetch_array($check_tag)) {
              echo ' ',$row['tag'];
              }
            }
        echo "<br />";?>
        <li><img src="<?php echo $url;?>" alt="<?php echo $title;?>"><p><a href="#"    
        title="like"class="img_on" rel="<?php echo $postid;?>"><?php echo $likes;?></a></p></li>
        <?php
      }
    }

  }
} else {
    while($row = mysql_fetch_array($post_query))
    {
    if ($row['privileges'] == 'All') {
      $postuid = $row['uid'];
      $userinfo_query = mysql_query("SELECT username FROM user WHERE uid = $postuid");
      $userrow = mysql_fetch_array($userinfo_query);
      $postusername = $userrow[0];
      ?><h3><?php echo $postusername,'<br />';?></h3><?php
      if ($row['type'] == 'Activity') {
        $postid = $row['post_id'];
        ?>
        <h2><?php echo 'Title: ', $row['title'],'<br />';?></h2>
        <?php
        $title = $row['title'];
        echo $row['text'],'<br />';
        $likes = $row['likes'];
        echo "<br />";
        $locationid = $row['location_id'];
        if ($check_location = mysql_query("SELECT * FROM location WHERE location_id = $locationid")) {
              $row = mysql_fetch_array($check_location);
              echo 'location: ',$row['location_name'],' lat: ',$row['latitude'],' lng: ',$row['longitude'], '<br />';
            }
            if($check_tag = mysql_query("SELECT * FROM tag WHERE post_id = $postid")){
              if ($row = mysql_fetch_array($check_tag)) {
              echo 'This post is about: ',$row['tag'];
              }
              while ($row = mysql_fetch_array($check_tag)) {
              echo ' ',$row['tag'];
              }
            }
        echo "<br />";?>   
    <li><p><a href="#"    
    title="like"class="img_on" rel="<?php echo $postid;?>"><?php echo $likes;?></a></p></li>
    <?php
      } else {
        $postid = $row['post_id'];
        $likes = $row['likes'];
        $title = $row['title'];
        ?>
        <h2><?php echo 'Title: ', $row['title'],'<br />';?></h2>
        <?php
        echo $row['text'],'<br />';
        echo $row['upload_time'],'<br />';
        $url = $row['url'];
        echo "<br />";
        $locationid = $row['location_id'];
        if ($check_location = mysql_query("SELECT * FROM location WHERE location_id = $locationid")) {
              $row = mysql_fetch_array($check_location);
              echo 'location: ',$row['location_name'],' lat: ',$row['latitude'],' lng: ',$row['longitude'], '<br />';
            }
            if($check_tag = mysql_query("SELECT * FROM tag WHERE post_id = $postid")){
              if ($row = mysql_fetch_array($check_tag)) {
              echo 'This post is about: ',$row['tag'];
              }
              while ($row = mysql_fetch_array($check_tag)) {
              echo ' ',$row['tag'];
              }
            }
        echo "<br />";?>
    <li><img src="<?php echo $url;?>" alt="<?php echo $title;?>"><p><a href="#"    
    title="like"class="img_on" rel="<?php echo $postid;?>"><?php echo $likes;?></a></p></li>

    <?php
      }
    }

    }
}

?>
</ul>
<div class="clear"></div>
   
</div>
</body>
</html>
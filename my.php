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

function ProfileInputCheck(EditForm)
{
  if (EditForm.gender.value != "male" && EditForm.gender.value != "female" && EditForm.gender.value != "")
  {
    alert("Gender can only be male or female!");
    EditForm.gender.focus();
    return (false);
  }
  if (!(EditForm.age.value >= 0 && EditForm.age.value < 200) && EditForm.age.value != "")
  {
    alert("Please input the right age!");
    EditForm.age.focus();
    return (false);
  }
}

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
h2{margin:0;padding:0;border:0;outline:0;}
h3{margin:0;padding:0;border:0;outline:0;color:#007bc4/*#424242*/;}
a:hover{text-decoration:underline}
ol,ul{list-style:none;border:2px;}
table{border-collapse:collapse;border-spacing:0}
img{border:none}

._fqv9h {
        background-color: #EFECEC;
        border: 1px solid #D4D2D6;
        border-radius: 1px;
        margin: 0 0 0px 0px;
        position: relative;
        left:550px;
        padding: 10px 0;
        width: 400px;
      }
      ._q1f8o {
        position: absolute;
        left: 1000px;
        top: .45em;
        border:2px solid #D4D2D6
      }




.clear{clear:both}
.list{width:760px; margin:20px auto}
.list li{float:left; width:360px; height:360px; margin:10px; position:relative}
.list li p{position:absolute; top:0; left:0; width:360px; height:24px; line-height:24px; background:#000; opacity:.8;filter:alpha(opacity=80);}
.list li p a{padding-left:30px; height:24px; background:url(images/heart.png) no-repeat 4px -1px;color:#fff; font-weight:bold; font-size:14px}
.list li p a:hover{background-position:4px -25px;text-decoration:none}
</style>
</head>

<body>
<div style="text-align:center">
<div class="_fqv9h">
<div>
<fieldset>
<legend>Edit Profile</legend>
<form name="EditForm" method="post" action="edit.php" onSubmit="return ProfileInputCheck(this)">
<p>
<label for="realname" class="label">Realname:</label>
<input id="realname" name="realname" type="text" class="input" />
<p/>
<p>
<label for="age" class="label">Age:</label>
<input id="age" name="age" type="text" class="input" />
<p/>
<p>
<label for="gender" class="label">Gender:</label>
<input id="gender" name="gender" type="text" class="input" />
<p/>
<p>
<label for="city" class="label">City:</label>
<input id="city" name="city" type="text" class="input" />
<p/>
<p>
<input type="submit" name="submit" value="  Edit  " class="left" />
</p>
</form>
</fieldset>
</div>
</div>
</div>

<div style="text-align:center">
<div class="_fqv9h">
<div>
<fieldset>
<legend>New Post</legend>
<form name="PostForm" method="post" action="newpost.php" onSubmit="return PostInputCheck(this)">
<p>
<label for="PostType" class="label">Post Type:</label>
<select name="PostType" class="input"/>
<option value="Activity">Activity</option>
<option value="Diary">Diary</option>
</select>
<p/>
<p>
<label for="Title" class="label">Title:</label>
<input id="Title" name="Title" type="text" class="input" />
<p/>
<p>
<label for="Text" class="label">Text:</label>
<textarea id="Text" name="Text" rows="10" cols="30" class="input"/></textarea>
<p/>
<p>
<label for="Privileges" class="label">Privilege:</label>
<select name="Privileges" class="input"/>
<option value="All">All</option>
<option value="Friends">Friends</option>
<option value="Friends and FOFs">Friends and FOFs</option>
<option value="Private">Private</option>
</select>
<p/>
<p>
<label for="Multimedia" class="label">Multimedia:</label>
<input type='text' name='textfield' id='textfield' class='txt' />
<!--<input type='button' class='btn' value='浏览...' />-->
<input type="file" name="fileField" class="file" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value" />
<p/>
<p>
<input type="submit" name="submit" value="  Post  " class="left" />
</p>
</form>
</fieldset>
</div>
</div>
</div>
<div style="text-align:center">
<div class="_fqv9h">
<form action="search.php" method="post" name="keyword" id="keyword">
    <input name="keyword" type="text" id="keyword"   />
    <input name="Submit" type="submit" value="Search in Dark Forest!" />
</form>
</div>
</div>
<div id="main">
     <ul class="list">
     <?php
@header("Content-Type: text/html;charset=utf-8");
@session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
include('conn.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

$user_query = mysql_query("select * from user where uid=$userid limit 1");
$row = mysql_fetch_array($user_query);?> 
<div class = "_q1f8o"><h2><?php
echo '<a href="myfriends.php">My friend list</a>','<br />','<br />';
echo 'User information：<br />';
echo 'ID：',$userid,'<br />';
echo 'Username：',$username,'<br />';
echo 'Email：',$row['email'],'<br />';
echo 'Register time：',$row['register_time'],'<br />';
echo 'Realname：',$row['real_name'],'<br />';
echo 'Gender：',$row['gender'],'<br />';
echo 'City：',$row['city'],'<br />';
echo 'Age：',$row['age'],'<br />';
echo 'Last log in：',$row['last_login'],'<br />';
echo 'Last log out：',$row['last_logout'],'<br />';
echo '<a href="logout.php?action=logout">logout</a><br /><br />';?></h2></div>
<?php
$my_post_query = mysql_query("
(SELECT * FROM `post` WHERE uid = $userid ORDER BY `upload_time` DESC LIMIT 3)");
while($row = mysql_fetch_array($my_post_query))
{
  if ($row['type'] == 'Activity') {
    $postid = $row['post_id'];?>
    <h3><?php echo 'Mypost','<br />';?></h3>
    <h2><?php echo 'Title: ', $row['title'],'<br />';?></h2>
    <?php $title = $row['title'];
    echo $row['text'],'<br />';
    $likes = $row['likes'];
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
    echo "<br />";
    echo '<a href="addtag.php?postid='.$postid.'">Add Tag</a>';
    echo "<br />";?>   


<li><p><a href="#"    
title="like"class="img_on" rel="<?php echo $postid;?>"><?php echo $likes;?></a></p></li>
<?php
  } else {?>
    <h3><?php echo 'Mypost','<br />';?></h3><?php
    $postid = $row['post_id'];
    $likes = $row['likes'];
    $title = $row['title'];?>
    <h2><?php echo 'Title: ', $row['title'],'<br />';?></h2>
    <?php
    echo $row['text'],'<br />';
    echo 'Upload time: ',$row['upload_time'],'<br />';
    $url = $row['url'];
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
    echo "<br />";
    echo '<a href="addtag.php?postid='.$postid.'">Add Tag</a>';
    echo "<br />";?>
<li><img src="<?php echo $url;?>" alt="<?php echo $title;?>"><p><a href="#"    
title="like"class="img_on" rel="<?php echo $postid;?>"><?php echo $likes;?></a></p></li>

<?php
  }
}

$post_query = mysql_query("(SELECT * FROM `post` WHERE uid IN
(SELECT sender_id FROM `friends` WHERE receiver_id = $userid AND status = 'accepted') ORDER BY `upload_time` DESC)
UNION
(SELECT * FROM `post` WHERE uid IN
(SELECT receiver_id FROM `friends` WHERE sender_id = $userid AND status = 'accepted') ORDER BY `upload_time` DESC)");
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
    $likes = $row['likes'];
    $title = $row['title'];
    ?>
    <h2><?php echo 'Title: ', $row['title'],'<br />';?></h2>
    <?php
    echo $row['text'],'<br />';
    echo 'Upload time: ',$row['upload_time'],'<br />';
    $url = $row['url'];
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
    echo 'Upload time: ',$row['upload_time'],'<br />';
    $url = $row['url'];
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

?>
</ul>
<div class="clear"></div>
   
</div>
</body>
</html>
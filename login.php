
<style type="text/css" data-isostyle-id="is18193d75">
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
._fqv9h {
        background-color: #EFECEC;
        border: 1px solid #D4D2D6;
        border-radius: 1px;
        margin: 0 0 10px;
        padding: 10px 0;
      }
</style>
<div style="text-align:center">
<div class="_fqv9h">
<?php
date_default_timezone_set('US/Eastern');
header("Content-type: text/html; charset=utf-8");
session_start();


//注销登录

//登录
if(!isset($_POST['submit'])){
    exit('Permission denied!');
}
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

//包含数据库连接文件
include('conn.php');
//检测用户名及密码是否正确
$check_query = mysql_query("select uid from user where username='$username' and password='$password' 
limit 1");
if($result = mysql_fetch_array($check_query)){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['uid'];
    echo $username,' Welcome! Enter<a href="my.php"> My homepage</a><br />';
    echo 'Click here <a href="logout.php?action=logout">logout</a><br />';
    $uid = $_SESSION['userid'];
    $lastlogin = date("Y-m-d H:i:s");
    $sqllastlogin = mysql_query("UPDATE  `user` SET  `last_login` =  '$lastlogin' WHERE  `user`.`uid` = '$uid'");
    echo 'Your new friend request:<br />';
} else {
    exit('That is not a match! <a href="javascript:history.back(-1);">Back</a> Try again');
}
//检索好友申请
$userid = $result['uid'];
$my_friends = mysql_query("SELECT uid, username FROM `friends` JOIN `user` WHERE sender_id = uid AND
receiver_id = $userid AND status = 'pending'"); 
//显示好友申请名字
while($row = mysql_fetch_array($my_friends))
{
echo '<a href="myindex.php?userid='.$row[0].'&myid='.$userid.'">'.$row[1].'</a>';
echo " sent you a friend request.<br />";
//同意／拒绝 好友申请
echo '<a href="fr_accept.php?receiver_id='.$userid.'&sender_id='.$row[0].'">'.'Accept'.'</a>';
echo '/';
echo '<a href="fr_decline.php?receiver_id='.$userid.'&sender_id='.$row[0].'">'.'Decline'.'</a>';
echo '<br />';
}

?>
</div>
</div>

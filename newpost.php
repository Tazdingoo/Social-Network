
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
</style>

<?php
date_default_timezone_set('US/Eastern');
header("Content-type: text/html; charset=utf-8");
session_start();


//注销登录

//登录
if(!isset($_POST['submit'])){
    exit('Permission denied!');
}
$uid = $_SESSION['userid'];
$posttype = $_POST['PostType'];
$title = $_POST['Title'];
$text = $_POST['Text'];
$privileges = $_POST['Privileges'];
$multimedia = $_POST['textfield'];

//包含数据库连接文件
include('conn.php');
//检测用户名及密码是否正确
if($check_query = mysql_query("INSERT INTO `post`(`uid`, `title`, `text`, `privileges`, `type`, `url`) VALUES 
('$uid','$title','$text','$privileges','$posttype','$multimedia')")){
	echo 'Make post success!<br />';
} else {
	echo 'Sorry! Failed to connect to database: ',mysql_error(),'<br />';
}
$new_query = mysql_query("SELECT MAX(`post_id`) FROM  `post`");
$row = mysql_fetch_array($new_query);
$_SESSION['postid'] = $row[0];

echo '<a href="searchlocation.html?postid='.$row[0].'">Add Location</a>';
echo "<br />";
echo 'Click here <a href="javascript:history.back(-1);">Back</a>';

?>
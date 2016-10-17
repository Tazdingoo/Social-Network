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
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('US/Eastern');
session_start();
if(!isset($_SESSION['userid']))
{
    header("Location:login.html");
    exit();
}

//注销登录
include('conn.php');
$uid = $_SESSION['userid'];
if($_GET["action"] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    $lastlogout = date("Y-m-d H:i:s");
	$sqllastlogout = mysql_query("UPDATE  `user` SET  `last_logout` =  '$lastlogout' WHERE  `user`.`uid` = '$uid'");
    echo 'Log out success! Click here <a href="login.html">login</a>';
    exit;
}

?>
</div>
</div>
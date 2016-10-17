<style type="text/css" data-isostyle-id="is18193d75">
._fqv9h {
        background-color: #EFECEC;
        border: 1px solid #D4D2D6;
        border-radius: 1px;
        margin: 0 0 10px;
        padding: 10px 0;
      }
._6ltyr {
        background-color: #FDFDFD;
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        -webkit-box-ordinal-group: 4;
        -webkit-order: 3;
        -ms-flex-order: 3;
        order: 3;
      }
._60k3m {
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin: 30px auto 0;
        max-width: 935px;
        width: 100%;
      }
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
header("Content-type: text/html; charset=utf-8");
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
include('conn.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
//选取我的好友
$my_friends = mysql_query("(SELECT uid, username FROM `friends` JOIN `user` WHERE receiver_id = uid AND
sender_id = $userid AND status = 'accepted')
UNION
(SELECT uid, username FROM `friends` JOIN `user` WHERE sender_id = uid AND
receiver_id = $userid AND status = 'accepted')"); 
$my_FOF = mysql_query("SELECT uid, username FROM `friends` JOIN `user` WHERE receiver_id = uid AND STATUS = 'accepted' AND receiver_id <>
$userid AND sender_id IN (
SELECT sender_id FROM `friends` WHERE receiver_id =$userid AND STATUS = 'accepted')
UNION
SELECT uid, username FROM `friends` JOIN `user` WHERE receiver_id = uid AND STATUS = 'accepted' AND receiver_id <>
$userid AND sender_id IN
(SELECT receiver_id FROM `friends` WHERE sender_id =$userid AND STATUS = 'accepted')
UNION
SELECT uid, username FROM `friends`  JOIN `user` WHERE sender_id = uid AND STATUS = 'accepted' AND sender_id <> $userid
AND receiver_id IN (
SELECT sender_id FROM `friends` WHERE receiver_id =$userid AND STATUS = 'accepted')
UNION
SELECT uid, username FROM `friends`  JOIN `user` WHERE sender_id = uid AND STATUS = 'accepted' AND sender_id <> $userid
AND receiver_id IN
(SELECT receiver_id FROM `friends` WHERE sender_id =$userid AND STATUS = 'accepted')");

?>
<div style="text-align:center">
<div class="_fqv9h">
<?php
echo "My Friend List","<br />";
while($row = mysql_fetch_array($my_friends))
{
echo '<a href="myindex.php?userid='.$row[0].'&myid='.$userid.'">'.$row[1].'</a>';
echo "<br />";
}
?>
</div>
<div class="_fqv9h">
<?php
echo "Other people you may want to know","<br />";
while($row = mysql_fetch_array($my_FOF))
{
echo '<a href="myindex.php?userid='.$row[0].'&myid='.$userid.'">'.$row[1].'</a>';
echo "<br />";
}
echo '<a href="my.php">'.'Back to my homepage'.'</a>';
?>
</div>
</div>
</body>
</html>
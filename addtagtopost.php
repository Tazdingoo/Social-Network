<meta charset="utf-8">
<?php
    include('conn.php');
    $tag=$_POST['tag'];
    $postid = $_POST['postid'];
//将选取的location_id填进post
$addtag = mysql_query("INSERT INTO tag(tag,post_id)VALUES('$tag','$postid')");
//返回主页
{
echo "Add tag success！<br />";
//echo '<a href="javascript:history.back(-1);">'.'返回'.'</a>';
echo '<a href="my.php">'.'Back'.'</a>';
}

?>
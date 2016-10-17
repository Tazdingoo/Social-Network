<meta charset="utf-8">
<?php
session_start();
$postid = $_SESSION['postid'];
    include('conn.php');
    $location=$_POST['location'];
    $sql1=mysql_query("select * from `location` where (`location_name` like'%$location%')");
    $info1=mysql_fetch_array($sql1);
do {
	echo '<a href="addlocation.php?location_name='.$info1['location_name'].'&postid3='.$postid.'&location_id='.$info1['location_id'].'">'.$info1['location_name'].'</a>';
    echo "<br />";
//echo $info1['location_id'];
//echo $postid;
} while ($info1 = mysql_fetch_assoc($sql1)); 
echo "Can not find the location? ";
echo '<a href="newlocation_1.php?postid1='.$postid.'">'.'Create new location'.'</a>'


?>

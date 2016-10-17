<meta charset="utf-8">
<?php
$userid = $_GET["userid"];
$myid = $_GET["myid"];

include('conn.php');
$check_query = mysql_query("select * from friends where (sender_id = $userid AND receiver_id = $myid AND status = 'accepted') OR (sender_id = $myid AND receiver_id = $userid AND status = 'accepted') limit 1");
if(mysql_fetch_array($check_query)){
    echo 'Already friends! <a href="javascript:history.back(-1);">Back</a>';
    exit;
}
$sql = "INSERT INTO friends(sender_id,receiver_id)VALUES('$myid','$userid')";
if(mysql_query($sql,$conn)){
    exit('Request sent！Click here <a href="javascript:history.back(-1);">Back</a>');
} else {
    echo 'Sorry! Failed to connect to database:',mysql_error(),'<br />';
    echo 'Click here <a href="javascript:history.back(-1);">Back</a> Try again';
}
?>
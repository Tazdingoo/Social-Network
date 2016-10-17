<?php
include_once("conn.php");

$ip = get_client_ip();
$pid = $_POST['id'];
if(!isset($pid) || empty($pid)) exit;

$ip_sql=mysql_query("select ip from post_ip where pid='$pid' and ip='$ip'");
$count=mysql_num_rows($ip_sql);
if($count==0){
	$sql = "update post set likes=likes+1 where post_id='$pid'";
	mysql_query( $sql);
	$sql_in = "insert into post_ip (pid,ip) values ('$pid','$ip')";
	mysql_query( $sql_in);
	$result = mysql_query("select likes from post where post_id='$pid'");
	$row = mysql_fetch_array($result);
	$love = $row['likes'];
	echo $love;
}else{
	echo "Liked";
}

//获取用户真实IP
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}
?>
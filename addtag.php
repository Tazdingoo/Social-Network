
	<?php
$postid = $_GET['postid'];
?>

<form action="addtagtopost.php" method="post" name="tag" id="tag">
<input type="text" name="postid" value="<?=$postid?>">
    <input name="tag" type="text" id="tag"   />
    <input name="Submit" type="submit" value="Add" />
</form>
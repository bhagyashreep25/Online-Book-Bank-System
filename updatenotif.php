<?php
require_once("./config.php");
// echo $_GET['uid'];
$query = "UPDATE notifications set status=".$_GET['status']." where uid=".$_GET['uid']." and requserid=".$_GET['requserid']." and bid=".$_GET['bid'].";";
$result = pg_query($db_connection, $query);
if($result>0){
	header("Location:./notifications.php?uid=".$_GET['uid']);
}
?>
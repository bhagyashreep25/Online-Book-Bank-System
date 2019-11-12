<?php
require_once("./config.php");
// echo $_GET['uid'];
$query = "UPDATE notifications set status=".$_GET['status']." where userid=".$_GET['uid']." and requserid=".$_GET['requserid']." and bid=".$_GET['bid'].";";
$result = pg_query($db_connection, $query);
if($_GET['status']==1){
	$query1 = "SELECT rentcount from booklist where userid=".$_GET['uid']." and bid=".$_GET['bid'].";";
	$result1 = pg_query($db_connection, $query1);
	$row = pg_fetch_row($result1);
	$rentcount = $row+1;
	$query2 = "UPDATE booklist set rentcount=".$rentcount." where uid=".$_GET['uid']." and bid=".$_GET['bid'].";";
	$result1 = pg_query($db_connection, $query2);
}
if($result>0){
	header("Location:./notifications.php?uid=".$_GET['uid']);
}
?>
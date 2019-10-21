<?php
ob_start();
require_once("./config.php");
print_r($_POST);
$queryname = "SELECT name from users where uid=".$_POST['uid'].";";
$resultname = pg_query($db_connection, $queryname);
$row = pg_fetch_row($resultname);
$query = "INSERT into ratingreview(uid, bid, review, countstars, dated, username) values (".$_POST['uid'].", ".$_POST['bid'].", '".$_POST['review']."', ".$_POST['rating'].", ".date("Ymd").", '".$row[0]."');";
$result = pg_query($db_connection, $query);
print_r(pg_num_rows($result));
if(pg_num_rows($result)==0){
	// header("Location:./bookpage.php?bid=".$_POST['bid']);
	exit();
}
?>
<!-- uid: echo $_SESSION['id'], username: echo $_SESSION['name'],
bid: echo $_GET['bid'] -->
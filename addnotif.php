<?php
require_once("./config.php");
// echo $_GET['requserid'];
$query = "SELECT uid from notifications where uid=".$_GET['uid']." and requserid=".$_GET['requserid']." and bid=".$_GET['bid'].";";
$result = pg_query($db_connection, $query);
if(pg_num_rows($result)>0){
	$_SESSION['addnotif']="success";
	$message = "The Seller will contact you for furthur news";
    echo '<script type="text/javascript">alert('.$message.');</script>';
	header("Location:./bookpage.php?bid=".$_GET['bid']);
}
else{
$uid = $_GET['uid'];
$requserid = $_GET['requserid'];
$bid = $_GET['bid'];
$username = $_GET['username'];
$bookname = $_GET['bookname'];
if($_GET['forsale']==1){
	$forsale = 1;
	$forrent = 0;
}
else{
	$forsale = 0;
	$forrent = 1;
}
$query1 = "INSERT into notifications values (".$uid.", ".$requserid.", ".$bid.", -1, '".$username."', '".$bookname."', ".$forsale.", ".$forrent.");";
$result1 = pg_query($db_connection, $query1);
if($result1>0){
	$_SESSION['addnotif']="success";
	header("Location:./bookpage.php?bid=".$_GET['bid']);
}	
}
?>
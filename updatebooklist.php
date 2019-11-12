<?php
require_once("./config.php");
// echo $_GET['uid'];
print_r($_POST);
if($_POST['submit']=='delete'){
	$query = "DELETE from booklist where uid=".$_GET['uid']." and bookname='".$_POST['book']."';";
	$result = pg_query($db_connection, $query);
	if($result){
		header("Location:./profile.php?uid=".$_GET['uid']);
	}
}
else 
if($_POST['submit']=='add'){
	// echo $_GET['uid'];
	// print_r($_POST);
	$query1 = "SELECT name from users where uid=".$_GET['uid'].";";
	$result1 = pg_query($db_connection, $query1);
	$row1 = pg_fetch_row($result1);
	$query2 = "SELECT bid from book where name='".$_POST['name']."';";
	$result2 = pg_query($db_connection, $query2);
	$row2 = pg_fetch_row($result2);
	if($_POST['category']==1){
		$forrent=0;
	}
	else{
		$forrent=1;
	}
	$query3 = "INSERT into booklist values (".$_GET['uid'].", ".$row2[0].", ".$_POST['category'].", ".$forrent.", '".$row1[0]."', 
	'".$_POST['name']."', ".$_POST['price'].");";
	$result3 = pg_query($db_connection, $query3);
	if($result3){
		header("Location:./profile.php?uid=".$_GET['uid']);
	}
}
else{
	// echo $_GET['uid'];
	// print_r($_POST);
	$query4 = "SELECT bid, imageurl, author, avgrating from book where name='".$_POST['name']."';";
	$result4 = pg_query($db_connection, $query4);
	$row4 = pg_fetch_row($result4);

	$query5 = "INSERT into readbook values (".$_GET['uid'].", ".$row4[0].", '".$_POST['name']."', '".$row4[2]."', ".$row4[3].", '".$row4[1]."');";
	$result5 = pg_query($db_connection, $query5);
	if($result5){
		header("Location:./profile.php?uid=".$_GET['uid']);
	}
}
?>
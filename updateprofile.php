<?php
require_once("./config.php");
// echo $_GET['uid'];
print_r($_POST);
echo date('Y-m-d', strtotime($_POST['date']));
$query = "UPDATE users set name='".$_POST['name']."', phone=".$_POST['phone'].", address='".$_POST['address']."',
gender='".$_POST['group1']."', currentlyreading='".$_POST['curread']."', favauthor='".$_POST['author']."',
favgenre='".$_POST['genre']."', dob='".date('Y-m-d', strtotime($_POST['date']))."' where uid=".$_GET['uid'].";";

$result=pg_query($db_connection, $query);
if($result){
	header("Location:./profile.php?uid=".$_GET['uid']);
}
?>
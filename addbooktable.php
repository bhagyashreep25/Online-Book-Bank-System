<?php
session_start();
require_once("./config.php");
if(isset($_POST['submit'])){
	// print_r($_POST);
	$name = $_POST['name'];
	$author = $_POST['author'];
	$genre = $_POST['genre'];
	if($_POST['des']!=""){
		$des = $_POST['des'];
	}
	else{
		$des="NULL";
	}
	if($_POST['iurl']!=""){
		$iurl = $_POST['iurl'];
	}
	else{
		$iurl="NULL";
	}
	if($_POST['price']!=""){
		$price = $_POST['price'];
	}
	else{
		$price="NULL";
	}
	$query = "SELECT max(bid) from book";
	$result = pg_query($db_connection, $query);
	$row = pg_fetch_row($result);
	$uid = $row[0]+1;
	$query1 = "INSERT into book(bid, name, author, genre, description, imageurl, price) values($uid, '".$name."', '".$author."', '".$genre."', '".$des."', '".$iurl."', ".$price.")";
	$result1 = pg_query($db_connection, $query1);
	if($result1>0){
		header("Location:./index.php");
	}
}
?>
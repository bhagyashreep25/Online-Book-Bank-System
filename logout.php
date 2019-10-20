<?php
require_once('./config.php');
session_start();
if(isset($_SESSION['name'])){
	unset($_SESSION['name']);
	unset($_SESSION['email']);
	session_unset();
	session_write_close();
}
// if(isset($_SESSION['callingPage'])){
// 	header("Location:./".$_SESSION['callingPage']);	
// }
// else{
	header("Location:./index.php");
// }
ob_flush();
?>
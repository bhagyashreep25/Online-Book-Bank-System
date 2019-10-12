<?php
	try{
		$db_name = "bookbankfinal";
		$db_connection = pg_connect("host=localhost dbname=".$db_name." user=postgres password=bhagyashree");
		//if($db_connection)
			//echo 'successful';
	}
	catch(Exception $e){
		echo $e;
		exit;
	}
?>
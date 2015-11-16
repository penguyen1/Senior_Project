<?php
	$host = "localhost";
	$user = "root";
	$pass = "root"; 
	$db = "bcml_qa";

	//creates link to database
	mysql_connect($host, $user, $pass) or die("$sql_error".mysql_error());
	mysql_select_db($db) or die ("OOPS! Something went wrong at mysql_select_db");
?>
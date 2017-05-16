<?php
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "archives";
		//Create connection 
		$dbconnect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		//Check connection
		if(!$dbconnect)
			{
				die("Connection failed: " .mysqli_connect_error());
			}
		//Use special characters
		mysqli_set_charset($dbconnect, 'utf8');
?>
<?php
//server connection function
	function serverconn(){
		$servername = "localhost";
		$serverusername = "root";
		$serverpass = "";
		$databasename = "solidnetservices";
		global $conn;
		$conn = mysqli_connect($servername, $serverusername, $serverpass, $databasename);
	}



?>
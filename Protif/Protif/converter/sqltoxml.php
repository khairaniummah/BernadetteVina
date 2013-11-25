<?php

class sqltoxml{
	function index(){

$result = new stdClass();

$con=mysqli_connect("localhost","root","","library");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$hasil= mysqli_query($con,"SELECT * FROM daftarbuku");
return $hasil;

mysql_close();
		}
	}
?>
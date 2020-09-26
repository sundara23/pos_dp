<?php 
$config = mysqli_connect("localhost","root","","pos_dp");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
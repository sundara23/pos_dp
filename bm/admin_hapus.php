<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from admin where id='$id'");

header("location:admin.php");
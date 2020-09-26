<?php 

include '../config.php';
$id = $_POST['id'];
$password = sha1($_POST['password']);

mysqli_query($config,"update admin set password='$password' where id='$id'");
header("location:admin.php");
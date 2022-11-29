<?php 
session_start();
require 'db.php';


$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$insert="INSERT INTO message(name,email,message) VALUES('$name','$email','$message')";
mysqli_query($db_connection,$insert);
$_SESSION['send']='Message Send Successfually';
header('location:index.php?#contact');

?>
<?php 
session_start();
require '../db.php';

$pera=$_POST['pera'];
$after_real=mysqli_real_escape_string($db_connection,$pera);
$adress=$_POST['adress'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$insert="INSERT INTO contact (pera,adress,email,phone) VALUES('$after_real','$adress','$email','$phone')";
mysqli_query($db_connection,$insert);
$_SESSION['success']='Insert Successfully';
header('location:contact.php');






?>
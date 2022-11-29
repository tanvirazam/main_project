<?php 
require '../db.php';

$id=$_GET['id'];

$select="UPDATE edu_image SET status=0";
mysqli_query($db_connection,$select);




$select1="UPDATE edu_image SET status=1 WHERE id=$id";
mysqli_query($db_connection,$select1);
header('location:education_image.php');


?>
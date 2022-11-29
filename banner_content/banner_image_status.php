<?php 

require '../db.php';

$id=$_GET['id'];

$select="UPDATE banner_image SET status=0";
mysqli_query($db_connection,$select);



$select2="UPDATE banner_image SET status=1 WHERE id=$id";

mysqli_query($db_connection,$select2);
header('location:banner_image.php');

?>
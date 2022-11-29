<?php 
require '../db.php';

$about=$_POST['about'];
$pera=$_POST['pera'];

$insert="INSERT INTO edu_about (about,pera) VALUES('$about','$pera')";
mysqli_query($db_connection,$insert);
header('location:education_banner.php');



?>
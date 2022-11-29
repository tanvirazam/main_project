<?php 

require '../db.php';


$id=$_GET['id'];

$update="UPDATE  testimonial SET status=0";
mysqli_query($db_connection,$update);

$update1="UPDATE  testimonial SET status=1 WHERE id=$id";
mysqli_query($db_connection,$update1);
header('location:testimonial_img.php');



?>
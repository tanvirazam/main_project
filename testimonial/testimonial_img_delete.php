<?php 
require '../db.php';


$id=$_GET['id'];

$select="SELECT * FROM testimonial WHERE id=$id";
$select_result=mysqli_query($db_connection,$select);


$delete_from="DELETE FROM testimonial WHERE id=$id";
mysqli_query($db_connection,$delete_from);

header('location:testimonial_img.php');



?>
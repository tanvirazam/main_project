<?php 
session_start();
require '../db.php';

$id=$_GET['id'];

$select="SELECT * FROM edu_image WHERE id=$id";
$select_res=mysqli_query($db_connection,$select);
$after_accos=mysqli_fetch_assoc($select_res);



$delete_from='../uploads/image_about/'.$after_accos['image'];
unlink($delete_from);



$update="DELETE FROM edu_image WHERE id=$id";
mysqli_query($db_connection,$update);

$_SESSION['deletggge']='deleted success';
header('location:education_image.php');

?>
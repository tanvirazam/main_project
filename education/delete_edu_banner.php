<?php 
require '../db.php';

$id=$_GET['id'];

$select="SELECT * FROM edu_about WHERE id=$id";
mysqli_query($db_connection,$select);

$delete="DELETE FROM edu_about WHERE id=$id";
mysqli_query($db_connection,$delete);
header('location:education_banner.php');

?>
<?php 

require '../db.php';


$id=$_GET['id'];

$select="SELECT * FROM logos WHERE id=$id";
$select_result=mysqli_query($db_connection,$select);
$after_accos=mysqli_fetch_assoc($select_result);
$delect_from='../uploads/logo'.$after_accos['logo'];
unlink($delect_from);

$delect="DELETE FROM logos WHERE id=$id";
mysqli_query($db_connection,$delect);
header('location:logo.php');

?>
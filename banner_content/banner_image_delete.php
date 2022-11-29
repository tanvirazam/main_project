<?php 

require '../db.php';

$id=$_GET['id'];

$select="SELECT * FROM banner_image WHERE id=$id";
$select_result=mysqli_query($db_connection,$select);
$after_assoc=mysqli_fetch_assoc($select_result);

$delete_from='../uploads/banner_image/'.$after_assoc['banner_image'];
unlink($delete_from);


$delete="DELETE FROM banner_image WHERE id=$id";
mysqli_query($db_connection,$delete);
header('location:banner_image.php');






?>
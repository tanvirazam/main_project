<?php 
session_start();
require '../db.php';


$id=$_GET['id'];

$delete_image="SELECT * FROM user WHERE id=$id";
$after_result=mysqli_query($db_connection,$delete_image);
$after_assoc=mysqli_fetch_assoc($after_result);
$delete_from='uploads/user/'.$after_assoc['image'];
unlink($delete_from);



$delete_user="DELETE FROM user WHERE id=$id";
mysqli_query($db_connection,$delete_user);
$_SESSION['delete']='deleted successfully';
header('location:user.php');


?>
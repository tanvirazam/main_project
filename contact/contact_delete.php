<?php 
session_start();
require '../db.php';

$id=$_GET['id'];

$delete="DELETE FROM contact WHERE id=$id";
mysqli_query($db_connection,$delete);
$_SESSION['errrrr']='delete successfully';
header('location:contact.php');



?>
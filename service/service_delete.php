<?php 
session_start();

require '../db.php';


$id=$_GET['id'];
$select="SELECT * FROM service WHERE id=$id";
mysqli_query($db_connection,$select);

$delete="DELETE FROM service WHERE id=$id";
mysqli_query($db_connection,$delete);

header('location:service.php');
?>
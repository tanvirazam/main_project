<?php 
session_start();

require '../db.php';


$id=$_GET['id'];
$select="SELECT * FROM portfolio WHERE id=$id";
mysqli_query($db_connection,$select);

$delete="DELETE FROM portfolio WHERE id=$id";
mysqli_query($db_connection,$delete);

header('location:portfolio.php');
?>
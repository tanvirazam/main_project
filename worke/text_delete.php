<?php 
require '../db.php';


$id=$_GET['id'];

$select="SELECT * FROM works WHERE id=$id";
$select_result=mysqli_query($db_connection,$select);


$delete_from="DELETE FROM works WHERE id=$id";
mysqli_query($db_connection,$delete_from);

header('location:worke.php');



?>
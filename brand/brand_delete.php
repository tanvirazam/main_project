<?php 
require '../db.php';


$id=$_GET['id'];

$select="SELECT * FROM brand WHERE id=$id";
$select_result=mysqli_query($db_connection,$select);


$delete_from="DELETE FROM brand WHERE id=$id";
mysqli_query($db_connection,$delete_from);

header('location:brand.php');



?>
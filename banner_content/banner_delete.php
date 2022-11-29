<?php 
require '../db.php';


$id=$_GET['id'];

$select="SELECT * FROM banners_content WHERE id=$id";
$select_result=mysqli_query($db_connection,$select);


$delete_from="DELETE FROM banners_content WHERE id=$id";
mysqli_query($db_connection,$delete_from);

header('location:banner.php');



?>
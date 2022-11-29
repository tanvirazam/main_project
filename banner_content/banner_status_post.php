<?php 
require '../db.php';

$id=$_GET['id'];


$update="UPDATE banners_content SET status=0";
mysqli_query($db_connection,$update);

$update2="UPDATE banners_content SET status=1 WHERE id=$id";
mysqli_query($db_connection,$update2);
header('location:banner.php');





?>
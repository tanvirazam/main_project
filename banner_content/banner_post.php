<?php 
require '../db.php';


$sub_title=$_POST['sub_title'];
$title=$_POST['title'];
$des=$_POST['des'];


$insert="INSERT INTO banners_content(sub_title,title,des) VALUES('$sub_title','$title','$des')";
mysqli_query($db_connection,$insert);
header('location:banner.php');


?>
<?php
session_start();
require '../db.php';



$icon=$_POST['icon'];
$link=$_POST['link'];
$title=$_POST['title'];
$pera=$_POST['pera'];


$inart="INSERT INTO service (icon,link,title,pera) VALUES('$icon','$link','$title','$pera')";
mysqli_query($db_connection,$inart);
header('location:service.php');





?>
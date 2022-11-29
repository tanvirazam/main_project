<?php
session_start();
require '../db.php';



$icon=$_POST['icon'];
$link=$_POST['link'];
$title=$_POST['title'];
$number=$_POST['number'];


$inart="INSERT INTO portfolio (icon,link,title,number) VALUES('$icon','$link','$title','$number')";
mysqli_query($db_connection,$inart);
header('location:portfolio.php');





?>
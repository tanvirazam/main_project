<?php 

require '../db.php';

$sub_title=$_POST['pera'];
$title=$_POST['title'];
$des=$_POST['head'];


$insert="INSERT INTO testi_text(sub_title,title,des) VALUES('$sub_title','$title','$des')";
mysqli_query($db_connection,$insert);
header('location:text.php');





?>
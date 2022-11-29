<?php 
session_start();
require '../db.php';

$catagori=$_POST['catagori'];
$sub_title=$_POST['sub_title'];
$title=$_POST['title'];
$after_excame=mysqli_real_escape_string($db_connection,$title);
$id=$_SESSION['id'];

$uploads=$_FILES['image'];
$explode=explode('.',$uploads['name']);
$extension=end($explode);


$insert="INSERT INTO works (catagori,sub_title,title,use_id) VALUES('$catagori','$sub_title','$after_excame','$id')";
mysqli_query($db_connection,$insert);

$last_id=mysqli_insert_id($db_connection);
$file_name=$last_id.'.'.$extension;
$new_location='../uploads/work/'.$file_name;
move_uploaded_file($uploads['tmp_name'],$new_location);

$update="UPDATE works SET image='$file_name' WHERE id=$last_id";
mysqli_query($db_connection,$update);

header('location:worke.php');


?>
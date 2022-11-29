<?php 
session_start();
require '../db.php';


$id=$_GET['id'];

$select_edu="SELECT * FROM education WHERE id=$id";
$select_edu_result=mysqli_query($db_connection,$select_edu);


$delete_from="DELETE FROM education WHERE id=$id";
mysqli_query($db_connection,$delete_from);

$_SESSION['delete']='deleted success';

header('location:education.php');



?>
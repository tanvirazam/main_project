<?php 
session_start();
require '../db.php';

$uploads=$_FILES['logo'];

$explode=explode('.',$uploads['name']);
$extension=end($explode);
$name=$uploads['name'];
$allow_extension=array('jpg','png');



if(in_array($extension,$allow_extension)){
    if($uploads['size'] <= 10000000){
        $insert="INSERT INTO logos (logo)VALUES('$name')";
       $insert_res= mysqli_query($db_connection,$insert);
        $id=mysqli_insert_id($db_connection);
        $file_name=$id.'.'.$extension;

        
        $new_location='../uploads/logo'.$file_name;
        move_uploaded_file($uploads['tmp_name'],$new_location);

        $update="UPDATE logos SET logo='$file_name' WHERE id=$id ";
        mysqli_query($db_connection,$update);
        header('location:logo.php');



    }else{
        $_SESSION['error']='size not match';
        header('location:logo.php');
    }
  
  
}




?>